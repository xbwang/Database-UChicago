import java.util.*;
import java.io.*;

class TweetGenerator{
	public static void main(String[] args){
		try{
			FileReader inFile = new FileReader(args[0]);
			BufferedReader bufRead = new BufferedReader(inFile);
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("TweetIn.dat"));
			Random ranGenerator = new Random();
			
			String line, newLine;
			line = null;
			newLine = null;
			int count = 0;
			long id = 1;
			
			while(bufRead.ready()){
				line = bufRead.readLine();
				if(line.equals("<tweet>")){
					count = 0;
					continue;
				}
				if(line.equals("</tweet>")){
					int countryCode = ranGenerator.nextInt();
					if(countryCode <=0){
						countryCode = (countryCode*(-1))%57 + 1;
					}else{
						countryCode = countryCode%57 + 1;
					}
					bufWrite.write(countryCode+"\n");
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
						bufWrite.write(id+"|"+newLine+"|");
						id++;
					}
					if(count == 2 && count == 4){
						continue;
					}
					if(count != 1 && count != 2 && count != 4){
						for(int i = 0; i < line.length(); i++){
							if(line.charAt(i) == '='){
								newLine = line.substring(i+1);
								break;
							}
						}
						bufWrite.write(newLine+"|");
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