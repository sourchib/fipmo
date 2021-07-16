#include <Arduino.h>
#include <PubSubClient.h>
//#include <WiFi.h>
// Select your modem:
#define TINY_GSM_MODEM_SIM800 // Modem is SIM800L

// Set serial for debug console (to the Serial Monitor, default speed 115200)
#define SerialMon Serial
// Set serial for AT commands
#define SerialAT Serial1

// Define the serial console for debug prints, if needed
#define TINY_GSM_DEBUG SerialMon

// set GSM PIN, if any
#define GSM_PIN ""

// Your GPRS credentials, if any
const char apn[] = "internet"; // APN (example: internet.vodafone.pt) use https://wiki.apnchanger.org
const char gprsUser[] = "";
const char gprsPass[] = "";

// SIM card PIN (leave empty, if not defined)
const char simPIN[]   = ""; 

#include <Wire.h>
#include <TinyGsmClient.h>

#ifdef DUMP_AT_COMMANDS
  #include <StreamDebugger.h>
  StreamDebugger debugger(SerialAT, SerialMon);
  TinyGsm modem(debugger);
#else
  TinyGsm modem(SerialAT);
#endif

#include <PubSubClient.h>
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>

TinyGsmClient client(modem);
PubSubClient mqtt(client);

// TTGO T-Call pins
#define MODEM_RST            5
#define MODEM_PWKEY          4
#define MODEM_POWER_ON       23
#define MODEM_TX             27
#define MODEM_RX             26
#define I2C_SDA              21
#define I2C_SCL              22

uint32_t lastReconnectAttempt = 0;

// I2C for SIM800 (to keep it running when powered from battery)
TwoWire I2CPower = TwoWire(0);

TwoWire I2CBME = TwoWire(1);
Adafruit_BME280 bme;

#define IP5306_ADDR          0x75
#define IP5306_REG_SYS_CTL0  0x00

// SAKLAR
#define LED 0 //--> Defines an LED Pin. D8 = GPIO15

const char* ssid="pong";
const char* pass="saya2133";
const char* brokerUser = "muchib";
const char* brokerPass = "muchib";
const char* broker = "47.254.248.173";
const char* outTopic1 ="Displays/espnext01ph/out";
const char* outTopic2 ="Displays/espnext01hc/out";
const char* outTopic3 ="Displays/espnext01ra/out";
const char* outTopic4 ="codersid/nodemcu/v1";

// ph,raindrop,hcsr-04
char messages1[10];
char messages2[50];
char messages3[100];

//RELAY
const int relay = 32;
char msg[50];
int value = 0;

//Ph
#define sensorPin 13
float Po = 0;  

// SENSOR RAINDROP
#define R 33

// SENSOR ULTRASONIK
#define TRIGGER_PIN 25
#define ECHO_PIN 26
#define USONIC_DIV 0.034
long lastMsg = 100;
long duration;
long distance;
int percentage;

bool setPowerBoostKeepOn(int en){
  I2CPower.beginTransmission(IP5306_ADDR);
  I2CPower.write(IP5306_REG_SYS_CTL0);
  if (en) {
    I2CPower.write(0x37); // Set bit1: 1 enable 0 disable boost keep on
  } else {
    I2CPower.write(0x35); // 0x37 is default reg value
  }
  return I2CPower.endTransmission() == 0;
}

void connectGSM() {
  // Set console baud rate
  SerialMon.begin(9600);
  delay(10);
  
  // Start I2C communication
//  I2CPower.begin(I2C_SDA, I2C_SCL, 400000);
//  I2CBME.begin(I2C_SDA_2, I2C_SCL_2, 400000);
  
  // Keep power when running from battery
  bool isOk = setPowerBoostKeepOn(1);
  SerialMon.println(String("IP5306 KeepOn ") + (isOk ? "OK" : "FAIL"));

  // Set modem reset, enable, power pins
  pinMode(MODEM_PWKEY, OUTPUT);
  pinMode(MODEM_RST, OUTPUT);
  pinMode(MODEM_POWER_ON, OUTPUT);
  digitalWrite(MODEM_PWKEY, LOW);
  digitalWrite(MODEM_RST, HIGH);
  digitalWrite(MODEM_POWER_ON, HIGH);
  
  SerialMon.println("Wait...");

  // Set GSM module baud rate and UART pins
  SerialAT.begin(9600, SERIAL_8N1, MODEM_RX, MODEM_TX);
  delay(2000);

  // Restart takes quite some time
  // To skip it, call init() instead of restart()
  SerialMon.println("Initializing modem...");
  modem.restart();
  // modem.init();

  String modemInfo = modem.getModemInfo();
  SerialMon.print("Modem Info: ");
  SerialMon.println(modemInfo);

  // Unlock your SIM card with a PIN if needed
  if ( GSM_PIN && modem.getSimStatus() != 3 ) {
    modem.simUnlock(GSM_PIN);
  }

//  // You might need to change the BME280 I2C address, in our case it's 0x76
//  if (!bme.begin(0x76, &I2CBME)) {
//    Serial.println("Could not find a valid BME280 sensor, check wiring!");
//    while (1);
//  }

  SerialMon.print("Connecting to APN: ");
  SerialMon.print(apn);
  if (!modem.gprsConnect(apn, gprsUser, gprsPass)) {
    SerialMon.println(" fail");
    ESP.restart();
  }
  else {
    SerialMon.println(" OK");
  }
  
  if (modem.isGprsConnected()) {
    SerialMon.println("GPRS connected");
  }
 }

void reconnect(){
  while(!mqtt.connected()){
  Serial.println("Conncting to ");
    String clientId = "ESP32Client-";
    clientId += String(random(0xffff), HEX);
      if(mqtt.connect(clientId.c_str(), brokerUser, brokerPass)){
      Serial.println("connected to relay");
      mqtt.publish("codersid/nodemcu/v1", "hello word");
      // ... and resubscribe
      mqtt.subscribe("codersid/nodemcu/v1");
      }else{
      Serial.print("failed, rc=");
      Serial.print(mqtt.state());
      Serial.println(" try again in 5 seconds");
      delay(1000);
      }
      
      if(mqtt.connect("espnext01ph", brokerUser, brokerPass)){
      Serial.println("Connected to ph");
      mqtt.subscribe("Displays/espnext01ph/in");
      } else if(mqtt.connect("espnext01hc", brokerUser, brokerPass)){
      Serial.println("connected to hc");
      mqtt.subscribe("Displays/espnext01hc/in");
      }else if(mqtt.connect("espnext01ra", brokerUser, brokerPass)){
      Serial.println("connected to raindrop");
      mqtt.subscribe("Displays/espnext01ra/in");
      }else{
      Serial.println(" try again in 5 seconds");
      delay(1000);
      }
  }
}

void callback (char* topic, byte* payload, unsigned int length){
  Serial.print("Payload: ");
  Serial.println(topic);
  for(int i=0; i<length; i++){
  Serial.print((char) payload[i]);
  }
  Serial.println();
  
  if ((char)payload[0] == '1') {
    digitalWrite(relay, LOW);   //on
    digitalWrite(LED, LOW);   //on
    
  } 
  if ((char)payload[0] == '0') {
    digitalWrite(relay, HIGH);  // off
    digitalWrite(LED, HIGH);   //on
  }
}


void setup()
{

  Serial.begin(9600);
//  setup_wifi();
connectGSM();
//...............pH Air...............//
  pinMode(sensorPin, INPUT);
//   Relay
   pinMode(relay, OUTPUT);
   pinMode(LED, OUTPUT);
//.............Ultrasnoik...............//
  pinMode(TRIGGER_PIN ,OUTPUT);
  pinMode(ECHO_PIN, INPUT);
  digitalWrite(TRIGGER_PIN, LOW);
  delayMicroseconds(100); 
//.............Raindrop...............//

   mqtt.setServer(broker, 1883);  
   mqtt.setCallback(callback);  
}

void loop()
{
  int A = digitalRead(R);
  int B = analogRead(R);
  int pengukuranPh = analogRead(sensorPin);
  double TeganganPh = 3.3 / 4096.0 * pengukuranPh;
  
  if (!mqtt.connected()) {
    reconnect();
  }
  mqtt.loop();  
        
  long now = millis();
  if (now - lastMsg > 10) {
   
   Serial.print("Nilai ADC Ph: ");
   Serial.println(pengukuranPh);   
   Serial.print("TeganganPh: ");
   Serial.println(TeganganPh, 3);
      ///Po = 7.00 + ((teganganPh7 - TeganganPh) / PhStep);
   Po = 7.00 + ((2.6 - TeganganPh) / 0.17);
   Serial.print("Nilai PH cairan: ");
   Serial.println(Po, 3);
   sprintf(messages1, "%2.1f", Po);
   Serial.print("Nilai PH cairan: ");
   Serial.println(messages1);
    
//  Loop Sensor Jarak....
    digitalWrite(TRIGGER_PIN, HIGH);
    delayMicroseconds(11);
    digitalWrite(TRIGGER_PIN, LOW);
    duration = pulseIn(ECHO_PIN, HIGH);
    distance = duration * USONIC_DIV/2;
    percentage = map(distance, 160, 10, 0, 160);
    if (percentage < 0)
    {percentage = 0;
    }else if (percentage > 160)
    {percentage = 160;
    }
    sprintf(messages2, "%ld", percentage);
    Serial.print("Volume air kolam CM : ");
    Serial.println(messages2);
    //Serial.print("% Distance :");
    //Serial.print (distance);
    //Serial.println (" cm");
    //    delay(1000);
    //  Loop Sensor Raindrop
  if (B>=1800){
//    Serial.println(A);
    Serial.println(B);
    sprintf(messages3, "%ld", B);
    Serial.print("Nilai Hujan : ");
    Serial.println(messages3);  
    Serial.println("Tidak Hujan"); 
  }else{
//    Serial.println(A);
    Serial.println(B);
    sprintf(messages3, "%ld", B);
    Serial.print("Nilai Hujan : ");
    Serial.println(messages3);  
    Serial.println("Hujan"); 
  }
    lastMsg = now;
    ++value;
    sprintf (msg, "Relay Berjalan", value);
    Serial.print("Publish message: ");
    Serial.println(msg);
    mqtt.publish(outTopic1, messages1);
    mqtt.publish(outTopic2, messages2);
    mqtt.publish(outTopic3, messages3);   
    mqtt.publish(outTopic4, msg);
  }
}
