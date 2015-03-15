#include <Servo.h> 
#include <OneWire.h>
#include <DallasTemperature.h>
#include <DHT11.h>

// Data wire is plugged into pin 2 on the Arduino
#define ONE_WIRE_BUS 2
#define RELAY1  7  
#define RELAY2  6
#define RELAY3  12
#define min_moisture_value 229
// Setup a oneWire instance to communicate with any OneWire devices 
// (not just Maxim/Dallas temperature ICs)
OneWire oneWire(ONE_WIRE_BUS);
// Pass our oneWire reference to Dallas Temperature.
DallasTemperature sensors(&oneWire);
Servo myservo;  // create servo object to control a servo 
                // a maximum of eight servo objects can be created 
 
int pos = 0;    // variable to store the servo position 
int lightPin = 0; //Fotoresistor
int threshold = 450; //Prag vođenja fotoresistora
int pin = 4;
int temp_lower = 24;
int temp_high = 26;
int hum_low = 50;
int hum_high = 97;
int dioda_low = 11;
int dioda_high = 10;
DHT11 dht11(pin);
int outside_temp = 0;
int soil_pin = A2;
int output_pin = 8;
int input_value = 0;
int output_value = 0;
int humi_level_diode = 3;
int pushbutton = 5;
int button_state = 0;
int push_diode = 12;

void setup() 
{ 
  Serial.begin(9600);  //Begin serial communcation
  sensors.begin();
  myservo.attach(9);  // attaches the servo on pin 9 to the servo object 
  pinMode(13, OUTPUT);
  pinMode(RELAY1, OUTPUT);
  pinMode(RELAY2, OUTPUT);
  pinMode(soil_pin, INPUT);
  pinMode(humi_level_diode, OUTPUT);
  pinMode(pushbutton, INPUT);
  pinMode(push_diode, OUTPUT);
  //pinMode(grijac, OUTPUT);
  while (!Serial) {
      ; //bla
  }
} 

 
void loop() 
{ 
  
  int err;
  float temp, humi;
  if((err=dht11.read(humi, temp))==0)
  {
    Serial.print("temperature:");
    Serial.print(temp);
     Serial.print(" humidity:");
    Serial.print(humi);
    Serial.print("%");
    Serial.println(); 
  delay(DHT11_RETRY_DELAY); //delay for reread
}

  sensors.requestTemperatures(); // Send the command to get temperatures
  Serial.print("Temperatura vani : ");
  Serial.print(sensors.getTempCByIndex(0)); // Why "byIndex"? 
  Serial.println();
  outside_temp = sensors.getTempCByIndex(0);
  
//Servo motor
  for(pos = 0; pos < 180; pos += 1)  // goes from 0 degrees to 180 degrees 
  {                                  // in steps of 1 degree 
    myservo.write(pos);              // tell servo to go to position in variable 'pos' 
    delay(27);                       // waits 15ms for the servo to reach the position 
  } 

  
 
 
  Serial.println(analogRead(lightPin)); 
    if(analogRead(lightPin)<threshold){
    Serial.println("Vrata otvorena");
    if(outside_temp>temp){
    digitalWrite(RELAY1,0);
    digitalWrite(dioda_high, LOW); 
  }      
    else{
    digitalWrite(RELAY1,1);
    digitalWrite(dioda_high, HIGH);
  }
  
  
}
     else if(analogRead(lightPin)>threshold){
      Serial.println("Vrata zatvorena");
      digitalWrite(RELAY1,1);
      digitalWrite(dioda_high, LOW);
      if(outside_temp<temp && temp > temp_lower)
      {
        digitalWrite(RELAY1,0);
        }
        
    
  }
 
 if(humi<hum_low){
  digitalWrite(RELAY2, 0);
  digitalWrite(humi_level_diode, HIGH);
  }
 else if(humi>=hum_low){
  digitalWrite(RELAY2, 1);
  digitalWrite(humi_level_diode, LOW);
  }  

  int sensorValue = analogRead(A1);
    
  Serial.print("Ocitanje iz spremnika : ");
  Serial.println(sensorValue);
  delay(1000);
  Serial.println();
  
  Serial.println("Vlaga je: ");
  input_value = analogRead(soil_pin);
  output_value = map(input_value, 0, 1023, 0, 255);
  if(output_value > min_moisture_value)
  {
      analogWrite(output_pin, output_value);
  }
  else if(output_value < min_moisture_value)
  {
    digitalWrite(output_pin, LOW);
  }
  //unutrasnja temperatura
  if(temp < temp_lower){
    digitalWrite(RELAY1, 1);
    digitalWrite(dioda_high, HIGH);
  }
  else if(temp > temp_high){
    digitalWrite(RELAY1, 0);
    digitalWrite(dioda_high, LOW);
  }
  
  
  Serial.print("Sensor = ");
  Serial.print(input_value);
  Serial.print("\t Output = ");
  Serial.print(output_value);
  Serial.print("\n");
  delay(1000);  
  //digitalWrite(RELAY2,0);
  
  button_state = digitalRead(pushbutton);
  
  
  if(button_state == HIGH)
  {
    digitalWrite(RELAY3, 0);
    delay(2000);
  }
   else{ digitalWrite(RELAY3, 1);
    delay(2000);

  }

for(pos = 180; pos>=1; pos-=1)     // goes from 180 degrees to 0 degrees 
  {                                
    myservo.write(pos);              // tell servo to go to position in variable 'pos' 
    delay(1);                       // waits 15ms for the servo to reach the position 
  } 

}
