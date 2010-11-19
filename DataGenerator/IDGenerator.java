import java.util.*;
import java.io.*;

class IDGenerator{
	public static void main(String[] args){
		try{
			FileReader inFile = new FileReader(args[0]);
			BufferedReader bufRead = new BufferedReader(inFile);
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("UserID.dat"));
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
					if(count == 1){
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