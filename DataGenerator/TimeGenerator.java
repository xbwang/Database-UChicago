import java.util.*;
import java.io.*;

class TimeGenerator{
	public static void main(String[] args){
		try{
			BufferedReader bufRead = new BufferedReader(new FileReader(args[0]));
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("Time.dat"));
			Random ranGenerator = new Random();
			String line, newLine;
			line = null;
			newLine = null;
			int count = 0;
			while(bufRead.ready()){
				line = bufRead.readLine();
				if(line.equals("<tweet>"))
					continue;
				if(line.equals("</tweet>")){
					count = 0;
					bufWrite.write("\n");
					continue;
				}
				else{
					count++;
					if(count == 3){
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