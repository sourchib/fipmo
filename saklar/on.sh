#!/bin/bash

#touch /tmp/testfile

#ping 8.8.8.8 -c 2

mosquitto_pub -u 'muchib' -P 'muchib' -t 'codersid/nodemcu/v1' -m '1'
