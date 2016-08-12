#coding=utf-8
#!/usr/bin/python
import RPi.GPIO as GPIO
 
GPIO.setmode(GPIO.BCM)
GPIO.setup(4, GPIO.IN)
 
try:
    while True:
        if GPIO.input(4):
            print "HUMO DETECTADO";

except KeyboardInterrupt:
    print "El usuario ha forzado la detención del script";
    GPIO.cleanup();
