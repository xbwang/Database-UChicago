import java.util.*;
import java.io.*;

class AchievementGenerator{
	public static void main(String[] args){
		try{
			BufferedReader bufRead = new BufferedReader(new FileReader(args[0]));
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("AchievementIn.dat"));
			int count = 0;
			String line;
			
			while(bufRead.ready()){
				line = bufRead.readLine();
				count++;
				bufWrite.write(count+"|"+line+"\n");
			}
			bufRead.close();
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}