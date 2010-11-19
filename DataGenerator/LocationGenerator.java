import java.util.*;
import java.io.*;

class LocationGenerator{
	public static void main(String[] args){
		try{
			BufferedReader bufRead = new BufferedReader(new FileReader(args[0]));
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("LocationIn.dat"));
			
			String line, apendLine;
			line = null;
			int id = 1;
			while(bufRead.ready()){
				apendLine = "United States,";
				line = bufRead.readLine();
				apendLine = apendLine.concat(line);
				bufWrite.write(id+","+apendLine+"\n");
				id++;
			}
			bufRead.close();
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}