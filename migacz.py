import time
import RPi.GPIO as gpio

print('Prosty program migacz')

gpio.setmode(gpio.BCM)

gpio.setwarnings(False)

gpio.setup(26,gpio.OUT)
# GPIO.setup(3,GPIO.OUT)

interwal = 0.1

while True:
	print('ON')
	gpio.output(26,gpio.HIGH)
	time.sleep(interwal)

	print('OFF')
	gpio.output(26,gpio.LOW)
	time.sleep(interwal)

