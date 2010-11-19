import java.util.*;
import java.io.*;

class ObtainGenerator{
	public static void main(String[] args){
		try{
			BufferedReader idRead = new BufferedReader(new FileReader(args[0]));
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("ObtainIn.dat"));
			int count, i;
			
			count = 1000;
			String[] idAry = new String[1000];	
			i = 0;
			while(count > 0){
				idAry[i] = idRead.readLine();
				count--;
				i++;
			}
			idRead.close();
			
			Random ranGenerator = new Random();
			int ran, oid;
			count = 2000;
			while(count > 0){
				ran = ranGenerator.nextInt()%1000;
				if(ran <= 0)
					ran = ran*(-1);
				String pid = idAry[ran];
				oid = ranGenerator.nextInt()%200;
				if(oid <= 0)
					oid = oid*(-1) + 1;
				bufWrite.write(pid+"|"+oid+"\n");
				count--;
			}
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}