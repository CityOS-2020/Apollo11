#define trig1  11
#define echo1  12
 
void setup() {
  pinMode(trig1, OUTPUT);
  pinMode(echo1, INPUT);
  Serial.begin (9600);

}
void loop()
{
  checkdistance(trig1, echo1, 1);
}
 
void checkdistance(int trig, int echo, int prefix)
{
  
  long duration, cm, car, block;
  digitalWrite(trig, LOW);
  delayMicroseconds(2);
  digitalWrite(trig, HIGH);
  delayMicroseconds(5);
  
  duration = pulseIn(echo, HIGH);
  cm = microsecondsToCentimeters(duration);
  if (cm >= 10 && cm <=50)
  {
    car = 1;
    block = 0;
  }
  else if (cm > 50)
  {
    car = 0;
    block = 0;
  }
  else if (cm <= 3)
    block = 1;
  delay(300);
  if (block == 0)
  {
    Serial.print(prefix);
    Serial.print(": ");
    Serial.print(car);
    Serial.println();
  }
  else if (block == 1)
  {
    Serial.print(prefix);
    Serial.print(": ");
    Serial.print("Sensor is blocked");
    Serial.println(); 
  }
 
 
   
}
  long microsecondsToCentimeters(long microseconds)
  {
    return microseconds/29/2;
  }

