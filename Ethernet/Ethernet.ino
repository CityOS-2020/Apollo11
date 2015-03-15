#include <Ethernet.h>
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
byte ip[] = { 10, 0, 0, 177 };
Server server(80);
void setup()
{
 Ethernet.begin(windows, ip);
 server.begin();
}
void loop()
{
 Client client = server.available();
 if (client) {
   boolean current_line_is_blank = true;
   while (client.connected()) {
     if (client.available()) {
       char c = client.read();
       if (c == '\n' && current_line_is_blank) {
         client.println("HTTP/1.1 200 OK");
         client.println("Content-Type: text/html");
         client.println();
         for (int i = 0; i < 6; i++) {
           client.print("analog input ");
           client.print(i);
           client.print(" is ");
           client.print(analogRead(i));
           client.println("");
         }
         break;
       }
       if (c == '\n') {
         // we're starting a new line
         current_line_is_blank = true;
       } else if (c!= '\r') {
         current_line_is_blank = false;
       }
     }
   }
   delay(1);
   client.stop();
 }
}
