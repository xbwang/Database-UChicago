import java.util.*;
import java.io.*;

class TagGenerator{
	public static void main(String[] args){
		try{
			BufferedReader idRead = new BufferedReader(new FileReader(args[0]));
			BufferedReader tagRead = new BufferedReader(new FileReader(args[1]));
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("TagIn.dat"));
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
			
			i = 0;
			count = 100;
			String[] tagAry = new String[100];
			while(count > 0){
				tagAry[i] = tagRead.readLine();
				count--;
				i++;
			}
			tagRead.close();
			
			Random ranGenerator = new Random();
			int ran, tid;
			count = 2000;
			while(count > 0){
				ran = ranGenerator.nextInt()%1000;
				if(ran <= 0)
					ran = ran*(-1);
				String pid = idAry[ran];
				ran = ranGenerator.nextInt()%100;
				if(ran <= 0)
					ran = ran*(-1);
				String tag = tagAry[ran];
				bufWrite.write(pid+"|"+tag+"\n");
				count--;
			}
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}