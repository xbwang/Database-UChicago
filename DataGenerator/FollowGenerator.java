import java.util.*;
import java.io.*;

class FollowGenerator{
	public static void main(String[] args){
		try{
			FileReader inFile = new FileReader(args[0]);
			BufferedReader bufRead = new BufferedReader(inFile);
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("FollowIn.dat"));
			FileReader gFile = new FileReader("group.txt");
			BufferedReader groupRead = new BufferedReader(gFile);
			
			String[] groupAry = new String[100];
			String groupNam;
			int m = 0;
			while(groupRead.ready()){
				groupNam = groupRead.readLine();
				groupAry[m] = groupNam;
				m++;
			}
			String line, newLine;
			line = null;
			newLine = null;
			Random ranGen = new Random();
			
			int i = 2000;
			while(i != 0){
				line = bufRead.readLine();
				for(int j = 0; j < 20; j++){
					if(line.charAt(j) == ','){
						newLine = line.substring(j+1);
						newLine = newLine.concat(",");
						newLine = newLine.concat(line.substring(0,j-1));
						break;
					}
				}
				newLine = newLine.concat(",");
				int n = ranGen.nextInt();
				if(n <= 0)
					n = n*(-1);
				n = n%10;
				newLine = newLine.concat(groupAry[n]);
				bufWrite.write(newLine+"\n");
				i--;
			}
			
			while(bufRead.ready()){
				line = bufRead.readLine();
				line = line.concat(",");
				int n = ranGen.nextInt();
				if(n <= 0)
					n = n*(-1);
				n = n%10;
				line = line.concat(groupAry[n]);
				bufWrite.write(line+"\n");
			}
			bufRead.close();
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}