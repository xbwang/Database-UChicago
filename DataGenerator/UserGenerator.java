import java.util.*;
import java.io.*;

class UserGenerator{
	public static void main(String[] args){
		try{
			FileReader inFile = new FileReader(args[0]);
			BufferedReader bufRead = new BufferedReader(inFile);
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("UserIn.dat"));
			Random ranGenerator = new Random();
			String line, newLine;
			line = null;
			newLine = null;
			int count = 0;
			while(bufRead.ready()){
				line = bufRead.readLine();
				if(line.equals("<user>"))
					continue;
				if(line.equals("</user>")){
					count = 0;
					bufWrite.write("\n");
					continue;
				}
				else{
					count++;
					if(count != 3 && count != 5 && count != 6){
						for(int i = 0; i < line.length(); i++){
							if(line.charAt(i) == '='){
								newLine = line.substring(i+1);
								break;
							}
						}
						bufWrite.write(newLine+"|");
					}
					if(count == 3){
						for(int i = 0; i < line.length(); i++){
							if(line.charAt(i) == '='){
								newLine = line.substring(i+2);
								break;
							}
						}
						bufWrite.write(newLine+"|");
					}
					if(count == 5){
						int countryCode = ranGenerator.nextInt();
						if(countryCode <=0){
							countryCode = (countryCode*(-1))%57 + 1;
						}else{
							countryCode = countryCode%57 + 1;
						}
						bufWrite.write(countryCode+"|");
					}
					if(count == 6){
						for(int i = 0; i < line.length(); i++){
							if(line.charAt(i) == '='){
								newLine = line.substring(i+1);
								break;
							}
						}
						bufWrite.write(newLine);
					}
				}
			}
			bufRead.close();
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}