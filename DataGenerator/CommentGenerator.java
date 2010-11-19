import java.util.*;
import java.io.*;

class CommentGenerator{
	public static void main(String[] args){
		try{
			BufferedReader idRead = new BufferedReader(new FileReader(args[0]));
			BufferedReader timeRead = new BufferedReader(new FileReader(args[1]));
			BufferedReader textRead = new BufferedReader(new FileReader(args[2]));
			BufferedWriter bufWrite = new BufferedWriter(new FileWriter("CommentIn.dat"));
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
			count = 1000;
			String[] timeAry = new String[1000];
			while(count > 0){
				timeAry[i] = timeRead.readLine();
				count--;
				i++;
			}
			timeRead.close();
			
			count = 200;
			i = 0;
			String[] textAry = new String[200];
			while(count > 0){
				textAry[i] = textRead.readLine();
				count--;
				i++;
			}
			textRead.close();
			
			Random ranGenerator = new Random();
			int ran, tid;
			count = 2000;
			while(count > 0){
				tid = ranGenerator.nextInt()%1370;
				if(tid <= 0)
					tid = tid*(-1);
				
				ran = ranGenerator.nextInt()%1000;
				if(ran <= 0)
					ran = ran*(-1);
				String pid = idAry[ran];
				
				ran = ranGenerator.nextInt()%1000;
				if(ran <= 0)
					ran = ran*(-1);
				String time = timeAry[ran];
				
				ran = ranGenerator.nextInt()%200;
				if(ran <= 0)
					ran = ran*(-1);
				String text = textAry[ran];
				bufWrite.write(tid+"|"+pid+"|"+text+"|"+time+"\n");
				count--;
			}
			bufWrite.close();
		}catch(IOException e){
			System.out.println("- error while writing file: "+e);
			}
		
	}
}