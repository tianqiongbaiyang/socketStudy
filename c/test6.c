#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#define NUM_std 5	//定义符号常量学生人数为5
#define NUM_course 4	//定义符号常量课程门数为4
#define SUM 100000 //指定符号常量SUM代表100000
#define N 5
void showerror(); //声明showerror函数的原型
int sum();

void swap(int  *x, int  *y)
{
	int t = *x;
	*x = *y;
	*y = t;
}

float add(float x,float y)
{
	float z;
	z=x+y;
	return (z);
}

int main(int argc, char *argv[]) {
	/*
	// 输出两个整数中的最大数
	int a,b,max;
	printf("input two numbers: ");
	scanf("%d%d",&a,&b);
	
//	max=a;
//	if(max<b)
//		max=b;
//	printf("max=%d\n",max);
	if(a>b)
		printf("max=%d\n",a);
	else
		printf("max=%d\n",b);
	*/
	
	
	/*
	//判断输入字符的种类
	char c;
	printf("Enter a character: ");
	c=getchar();
	
	if(c<0x20)
		printf("The character is a control character\n");
	else if(c>='0'&&c<='9')
		printf("The character is a digit\n");
	else if(c>='A'&&c<='Z')
		printf("The character is a capital letter\n");
	else if(c>='a'&&c<='z')
		printf("The character is lower letter\n");
	else
		printf("The character is other character\n");
	*/
	
	
	/*
	// 计算员工当月薪水
	long profit;	//所接工程的利润
	int grade;
	float ratio;	//提成比率
	float salary=500;	//薪水，初始值为保底薪水500
	printf("Input profit: ");	//提示输入所接工程的利润
	scanf("%ld",&profit);	//输入所接工程的利润
	
	//计算提成比率
//	if(profit<=1000)
//		ratio=0;
//	else if(profit<=2000)
//		ratio=(float)0.10;
//	else if(profit<=5000)
//		ratio=(float)0.15;
//	else if(profit<=10000)
//		ratio=(float)0.20;
//	else
//		ratio=(float)0.25;
	
//	if(profit<=1000)
//		ratio=0;
//	if(1000<profit &&profit<=2000)
//		ratio=(float)0.10;
//	if(2000<profit && profit<=5000)
//		ratio=(float)0.15;
//	if(5000<profit && profit<=10000)
//		ratio=(float)0.20;
//	if(10000<profit)
//		ratio=(float)0.25;
	
	//将利润-1、再整除1000，转化成switch语句中的case标号
	grade=(profit-1)/1000;
	switch(grade)	//计算提成比率
	{
		case 0: ratio=0;break;	//profi<=1000
		case 1: ratio=(float)0.10;break;	//1000<profit<=2000
		case 2:
		case 3:
		case 4: ratio=(float)0.15;break;	//2000<profit<=5000
		case 5:
		case 6:
		case 7:
		case 8:
		case 9: ratio=(float)0.20;break;	//5000<profit<=10000
		default: ratio=(float)0.25;	//10000<profit
	}
	
	salary+=profit*ratio;	//计算当月薪水
	printf("salary=%.2f\n",salary);	//输出结果
	*/
	
	
	/*
	//判断闰年
	int year,leap=0;	//leap=0:预置为非闰年
	printf("Please input the year: ");	//提示输入年份
	scanf("%d",&year);	//输入年份
	
//	if(year%4==0)	//如果被4整除
//		if(year%100!=0)	//如果不被100整除
//			leap=1;	//置为闰年
//	if(year%400==0)	//如果被400整除
//		leap=1;	//置为闰年
	
//	if((year%4==0 && year%100!=0)||(year%400==0))
//		leap=1;
	
	leap=(year%4==0&&year%100!=0) || (year%400==0);
		
	//输出结果
	if(leap)	//如果是闰年(leap==1)
		printf("%d is a leap year.\n",year);
	else
		printf("%d is not a leap year.\n",year);
	*/
	
	
	/*
	//计算器
	float a,b;	//存放两个数的变量
	int tag=0;	//运算合法的标志，0--合法，1--非法
	char ch;	//运算符变量
	float result;	//运算结果变量
	
	printf("input two number: ");	//提示输入两个数
	scanf("%f%f",&a,&b);	//输入两个数
	fflush(stdin);	//清键盘缓冲区
	printf("input arithmetic lable(+ - * /):");	//提示输入运算符
	scanf("%c",&ch);	//输入运算符
	
	switch(ch)	//根据运算符来进行相关的运算
	{
		case '+': result = a+b; break;	//加法运算
		case '-': result=a-b;	break;	//减法运算
		case '*': result=a*b;	break;	//乘法运算
		case '/': if(!b)  //除法运算，判断除数是否为0
			      {
					printf("divisor is zero!\n");	//显示除数为0
					tag=1;	//置运算非法标志
					}else  // 除数非0
						result = a/b;	//计算商
					break;
		default: printf("illegal arithmetic lable\n"); //非法的运算符
				 tag=1;	//置运算非法标志
						
	}
	
	if(!tag) //运算合法，显示运算结果
		printf("%.2f %c %.2f = %.2f\n",a,ch,b,result);
	*/
	
	
	/*
	//显示1～10的平方
	int i=1;
	while(i<=10)
	{
		printf("%d*%d=%d\n",i,i,i*i);
		i++;
	}
	*/
	
	
	/*
	//求两个正整数的最大公因子。
	int m,n,r;
	printf("Please input two positive integer: ");
	scanf("%d%d",&m,&n);
	
	//欧几里德算法
	while(n!=0)
		{
			r=m%n; //求余数
			m=n;
			n=r;
		}
	printf("Their greatest common divisor is %d\n",m);
	*/
	
	
	/*
	//求1～100的累积和
	int i=1,sum=0;
	
//	do{
//		sum+=i;
//		i++;
//	}while(i<=100);
	
	for(i=1;i<=100;i++)
	{
		sum+=i;
	}
	
	printf("sum=%d\n",sum);
	*/
	
	
	/*
	//九九乘法表
	int i,j;
	for(i=1;i<10;i++)
		printf("%4d",i);
	printf("\n---------------------------------------\n");
	
	for(i=1;i<10;i++)
	{
		for(j=1;j<10;j++)
			printf("%4d",i*j);
		printf("\n");
	}
	*/
	
	
	/*
	//将用户输入的小写字母转换成大写字母，直到输入非小写字母字符。
	char c;
	while(1)
	{
		c=getchar();	//读取一个字符
		if(c>='a'&&c<='z')	//是小写字母
			putchar(c-'a'+'A');	//输出其大写字母
		else   //不是小写字母
			break;  //循环退出
	}
	*/
	
	
	/*
	//输出0-20之间的偶数
	printf("The even numbers are as follows: \n");
	for(int i=0;i<=20;i++)
	{
		if(i%2) continue;
		printf("%d ",i);
	}
	*/
	
	
	/*
	//输入三角形的边长，求三角形面积。
	float a,b,c;
	float s,area;
	printf("input the length of three edges of triangle: ");
	scanf("%f%f%f",&a,&b,&c); 
	if(a<=0||b<=0||c<=0)
		{
			printf("the length of three edges of triangle is error!\n");
			exit(-1);
		}
	
	s=(a+b+c)/2;
	s=s*(s-a)*(s-b)*(s-c);
	if(s<0)
		{
			printf("the length of three edges of triangle is error!\n");
			exit(-1);
		}
	area=(float)sqrt(s);
	printf("area=%.2f\n",area);
	*/
	
	
	/*
	//输入一个数，判断其是否为素数。
	int m,i,k;
	printf("input a number: ");
	scanf("%d",&m);
	
	k=sqrt(m);
	
//	i=2;
//	while(i<=k)
//	{
//		if(m%i==0) break;
//		i++;
//	}
	
	i=2;
	do
	{
		if(m%i==0) break;
		i++;
	}while(i<=k);
	
//	for(i=2;i<=k;i++)
//		{
//			if(m%i==0)
//				break;
//		}
	
	if(i>k)
		printf("yes\n");
	else
		printf("no\n");
	*/
	
	
	/*
	// 验证哥德巴赫猜想：
	int i,n,p,q,flagp,flagq;
	printf("please input n: ");
	scanf("%d",&n); //输入一偶数
	if(n<4||n%2!=0) //如果该数不是偶数
	{
		printf("input data error!\n"); //显示输入数据错
		exit(-1); //程序结束
	}
	
	p=1;
	do
		{
			p++;
			q=n-p;
			
			//判断p是否为素数
			flagp=1;
			for(i=2;i<=(int)sqrt(p);i++)
				{
					if(q%i==0)
						{
							flagq=0;
							break;
						}
				} 
			
			//判断q是否为素数
			flagq=1;
			for(i=2;i<=(int)sqrt(q);i++)
				{
					if(q%i==0)
						{
							flagq=0;
							break;
						}
				}
		}while(flagp*flagq==0); //当p、q中有一个不为素数时继续执行循环
printf("%d = %d + %d\n",n,p,q); //显示结果
	*/
	
	
	/*
	//利用下面的公式求pi的近似值，要求累加到最后一项小于10-6为止。
	//pi/4 约等于1-1/3+1/5-1/7+...
	int s=1;
	float n=1.0,t=1,pi=0;
	while(fabs(t)>=1e-6)
		{
			pi+=t;
			n+=2;
			s=-s;
			t=s/n;
		}
	pi*=4;
	printf("pi=%.6f\n",pi);
	*/
	
	
	/*
	//输入一行字符，统计其中各个大写字母出现的次数。
	char ch;
	int num[26]={0},i;
	while((ch=getchar())!='\n')  //输入字符串，判断统计
	if(ch>='A' && ch<='Z')  //是否为大写字母
	num[ch-'A']++;
	for(i=0;i<26;i++)  //输出结果
	{
		if(i%9==0)
			printf("\n");
		printf("%c(%d) ",'A'+i,num[i]);
	}
	printf("\n");
	*/
	
	
	/*
	//将一个二维数组行和列的元素互换，存到另一个二维数组中。
	int a[2][3]={{1,2,3},{4,5,6}};
	int b[3][2],i,j;
	printf("array a:\n");
	for(i=0;i<=1;i++)
	{
		for(j=0;j<=2;j++)
			{
				printf("%5d",a[i][j]);
				b[j][i]=a[i][j];
			}
		printf("\n");
	}
		    
    printf("array b:\n");
	for(i=0;i<=2;i++)
	{
		for(j=0;j<=1;j++)
		{
			printf("%5d",b[i][j]);
		}
		printf("\n");
	}
	*/
	
	
	/*
	//输入多个学生多门课程的成绩，分别求每个学生的平均成绩和每门课程的平均成绩。
	int i,j;
	//定义成绩数组，各元素初值为0。+1是用来存放计算结果。
	float score[NUM_std+1][NUM_course+1]={0};
	
	for(i=0;i<NUM_std;i++)
		for(j=0;j<NUM_course;j++){
			printf("input the mark of %dth course of %dth student: ",j+1,i+1);
			scanf("%f",&score[i][j]);	//输入第i个学生的第j门课的成绩
		}
	
	for(i=0;i<NUM_std;i++){
		for(j=0;j<NUM_course;j++){
			score[i][NUM_course]+=score[i][j];
			score[NUM_std][j]+=score[i][j];
		}
		score[i][NUM_course]/=NUM_course;	//求第i个人的平均成绩
		printf("The average mark of the %dth student is %f\n",i+1,score[i][NUM_course]);
	}
	
	for(j=0;j<NUM_course;j++){
		score[NUM_std][j]/=NUM_std;	//求第j门课的平均成绩
		printf("The average mark of the %dth course is %f\n",j+1,score[NUM_std][j]);
	}
	*/
	
	
	/*
	//奇数幻方
	int m,i,j,ni,nj,k,mm,magic[20][20]={0};
	printf("Enter the number you wanted: ");
	scanf("%d",&m);
	if((m<=0)||(m%2)==0) //小于0或为偶数返回
	{
		printf("Error in input data.\n");
		exit(-1);
	}
	
	mm=m*m; //需要填入数据总个数
	i=0; //第一个值的行位置
	j=m/2; //第一个值的列位置
	
	for(k=1;k<=mm;k++){
		magic[i][j]=k;     // 填入值
		
		if(i==0)  // 最上一行
		ni=m-1;  //下一个位置在最下一行
		else
			ni=i-1;  //前一个值的上一行
		
		if(j==m-1) //最右端
		nj=0;    //下一个位置在最左端
		else
			nj=j+1;  //前一个值的下一列
		
		//判断右上方方格是否已有数
		if(magic[ni][nj] == 0)  //右上方无值
		{
			i=ni;
			j=nj;
		}
		else //右上方方格已填上数
		i++;
	}
	
	for(i=0;i<m;i++)  //显示填充的结果
	{
		for(j=0;j<m;j++)
			printf("%4d",magic[i][j]);
		printf("\n");
	}
	*/


    /*
    //求方程实根
	double a,b,c,disc,x1,x2,p,q;
	scanf("%lf%lf%lf",&a,&b,&c);
	
	disc =b*b-4*a*c;
	if(disc<0)
		printf("This equation hasn't real roots\n");
	else
	{
		p=-b/(2.0*a);
		q=sqrt(disc)/(2.0*a);
		x1=p+q;
		x2=p-q;
		printf("real roots: \nx1=%7.2f\nx2=%7.2f\n",x1,x2);
	}
	*/
	
	
	/*
	//a,b互换
	float a,b,t;
	scanf("%f,%f",&a,&b);
	if(a>b){
		t=a;
		a=b;
		b=t;
	}
	printf("%5.2f,%5.2f\n",a,b);
	*/
	
	
	/*
	//输入3个数a,b,c并由大到小输出
	float a,b,c,t;
	scanf("%f,%f,%f",&a,&b,&c);
	if(a>b){
		t=a;
		a=b;
		b=t;
	}
	if(a>c){
		t=a;
		a=c;
		c=t;
	}
	if(b>c)
	{
		t=b;
		b=c;
		c=t;
	}
	printf("%5.2f,%5.2f,%5.2f\n",a,b,c);
	*/
	

	/*
	//小写转大写
	char ch;
	scanf("%c",&ch);
	ch=(ch>='A'&&ch<='Z')?(ch+32):ch;
	printf("%c\n",ch);
	*/
	
	
	/*
	//阶跃函数
	int x,y;
	scanf("%d",&x);
	
//	if(x<0)
//		y=-1;
//	else
//		if(x==0) y=0;
//			else y=1;
	
	if(x>=0)
		if(x>0) y=1;
		else y=0;
	else y=-1;
	
	printf("x=%d,y=%d\n",x,y);
	*/
	
	
	/*
	//按评分等级返回分数范围
	char grade;
	scanf("%c",&grade);
	printf("your score:");
	switch(grade)
	{
		case 'A':	printf("85~100\n"); break;
		case 'B':	printf("70~84\n"); break;
		case 'C': 	printf("60~69\n"); break;
		case 'D':	printf("<60\n"); break;
		default: printf("enter data error!\n");
	}
	*/
	
	/*
	//处理菜单命令
	void action1(int,int),action2(int,int);	//函数声明
	char ch;
	int a=15,b=23;
	ch =getchar();
	switch(ch)
	{
		case 'a':
		case 'A':	action1(a,b); break;	//调用action1函数，执行A操作
		case 'b':
		case 'B':	action2(a,b); break;	//调用action2函数，执行B操作
		default:	putchar('\a');	//如果输入其他字符，发出警告
	}
	*/
	
	
	/*
	int year;
	printf("enter year:");
	scanf("%d",&year);
	
	if((year%4==0 && year%100!=0) || (year%400==0))
		{
			printf("%d is a leap year.\n",year);
		} else {
			printf("%d is not a leap year.\n",year);
		}
	*/
	
	
	/*
	//求ax*x+bx+c=0方程的解
	double a,b,c,disc,x1,x2,realpart,imagpart;
	scanf("%lf,%lf,%lf",&a,&b,&c);
	printf("The equation ");
	
	if(fabs(a)<=1e-6)
		printf("is not a quadratic\n");
	else{
		disc=b*b-4*a*c;
		if(fabs(disc)<=1e-6)
			printf("has two equal roots:%8.4f\n",-b/(2*a));
		else
			if(disc>1e-6){
				x1=(-b+sqrt(disc))/(2*a);
				x2=(-b-sqrt(disc))/(2*a);
				printf("has distinct real roots:%8.4f and %8.4f\n",x1,x2);
			}else{
				realpart=-b/(2*a);	//realpart是复根的实部
				imagpart=sqrt(-disc)/(2*a);	//imagpart是复根的虚部
				printf(" has complex roots:\n");
				printf("%8.4f+%8.4fi\n",realpart,imagpart);	//输出一个复数
				printf("%8.4f-%8.4fi\n",realpart,imagpart);	//输出另一个复数
				
			}
	}
	*/
	
	
	
	/*
	//计算总费用
	int c,s;
	float p,w,d,f;
	printf("please enter price,weight,distance:");	//提示输入数据
	scanf("%f,%f,%d",&p,&w,&s);	//输入单价、重量、距离
	
	if(s>=3000) c=12;	//3000km以上为同一折扣
	else c=s/250;
	
	switch(c)
	{
		case 0: d=0; break;	//c=0,代表250km以下，折扣d=0
		case 1: d=2; break;	//c=1,代表250～500km以下，折扣d=2%
		case 2:
		case 3: d=5; break;	//c=2和3，代表500～1000km，折扣d=5%
		case 4:
		case 5:
		case 6:
		case 7: d=8; break; //c=4~7,代表1000～2000km，折扣d=8%
		case 8:
		case 9:
		case 10:
		case 11: d=10; break; //c=8~11,代表2000～3000km，折扣d=10%
		case 12: d=15; break; //c12，代表3000km以上，折扣d=15%
	}
	f=p*w*s*(1-d/100);	//计算总运费
	printf("freight=%10.2f\n",f);	//输出总运费，取两位小数
	*/
	
	
	/*
	//1000中捐款，总数达到10万元时停止，并统计捐款人数及平均每人捐款数
	float amount,aver,total;
	int i;
	for(i=1,total=0;i<=1000;i++){
		printf("please enter amount:");
		scanf("%f",&amount);
		total=total+amount;
		if(total>=SUM) break;
	}
	aver=total/i;
	printf("num=%d\naver=%10.2f\n",i,aver);
	*/
	
	
	/*
	//输出100～200的不能被3整除的数。
	int n;
	for(n=100;n<=200;n++)
	{
		if(n%3==0){
			continue;
		}
		printf(" %d",n);
	}
	printf("\n");
	*/
	
	
	/*
	//4*5矩阵
	int i,j,n=0;
	for(i=1;i<=4;i++)
	{
		for(j=1;j<=5;j++,n++){	//n用来累计输出数据的个数
			if(n%5==0) printf("\n");
			printf("%d\t",i*j);	//控制在输出5个数据后换行
		}
	}
	printf("\n");
	*/
	
	
	/*
	//斐波那契数列。例如：1，1，2，3，5，8，13,...。输出40个月的兔子数。
//	int f1=1,f2=1,f3;
//	int i;
//	printf("%12d\n%12d\n",f1,f2);
//	for(i=1;i<=38;i++)
//	{
//		f3=f1+f2;
//		printf("%12d\n",f3);
//		f1=f2;
//		f2=f3;
//	}
	
//	int f1=1,f2=1;
//	int i;
//	for(i=1;i<=20;i++) //每个循环中输出2个月的数据，故循环20次即可
//	{
//		printf("%12d %12d ",f1,f2); //输出已知的两个月的兔子数
//		if(i%2==0) printf("\n");
//		f1=f1+f2; //计算出下一个月的兔子数，并存放在f1中
//		f2=f2+f1; //计算出下两个月的兔子数，并存放在f2中
//	}
	
	//只输出20个月的兔子数
	int i;
	int f[20]={1,1}; //对最前面两个元素f[0]和f[1]赋初值1
	for(i=2;i<20;i++){
		f[i]=f[i-2]+f[i-1]; //先后求出f[2]~f[9]的值
	}
	for(i=0;i<20;i++){
		if(i%5==0) printf("\n"); //控制每输出5个数后换行
		printf("%12d",f[i]);		//输出一个数
	}
	printf("\n");
	*/
	
	
	/*
	//译密码
	char c;
	
//	c=getchar();	//输入一个字符给字符变量c
//	while(c!='\n')	//检查c的值是否为换行符'\n'
//	{
//		if((c>='a'&&c<='z')||(c>='A'&&c<='Z'))	//c如果是字母
//		{
//			if(c>='W'&&c<='Z'||c>='w'&&c<='z') c=c-22;	//如果是26个字母中最后4个字母之一就使c-22
//			else c=c+4;	//如果是前面22个字母之一，就使c加4，即变成其后第4个字母
//		}
//		printf("%c",c);	//输出已改变的字符
//		c=getchar();	//再输入下一个字符给字符变量c
//	}
	
	while((c=getchar())!='\n')  //输入一个字符给字符变量c并检查其值是否是换行符
	{
		if((c>='A'&&c<='Z')||(c>='a'&&c<='z')) //c如果是字母
		{
			c=c+4;	//只要是字母，都先加4
			if(c>'Z' && c<='Z'+4 ||c>'z')  //如果是26个字母中最后4个字母之一。条件必须加c<='Z'+4，是因为小写字母都大于>'Z'
				c=c-26;	//c的值改变为26个字母中最前面的4个字母中对应的字母
		}
		printf("%c",c);	//输出已改变的字符
	}
	
	printf("\n");
	*/
	
	
	/*
	//冒泡排序
	int a[10];
	int i,j,t;
	printf("input 10 numbers :\n");
	for(i=0;i<10;i++)
		scanf("%d",&a[i]);
	printf("\n");
	
	for(j=0;j<9;j++) //进行9次循环，实现9趟比较
	for(i=0;i<9-j;i++) //在每一趟中进行9-j次比较
	if(a[i]>a[i+1]){  //相邻两个数比较
		t=a[i];
		a[i]=a[i+1];
		a[i+1]=t;
	}
	printf("the sorted numbers :\n");
	
	for(i=0;i<10;i++)
		printf("%d ",a[i]);
	printf("\n");
	*/
	
	
	/*
	//求数组最大元素值，并返回行列号
	int i,j,row=0,column=0,max;
	int a[3][4]={{1,2,3,4},{9,8,7,6},{-10,10,-5,2}};	//定义数组并赋初值
	
	max =a[0][0]; //先认为a[0][0]最大
	for(i=0;i<=2;i++)
		for(j=0;j<=3;j++)
			if(a[i][j]>max){		//如果某元素大于max，就取代max的原值
				max=a[i][j];
				row=i;	//记下此元素的行号
				column=j;	//记下此元素的列号
			}
	printf("max=%d\nrow=%d\ncolumn=%d\n",max,row,column);
	*/
	
	
	/*
	//输出字符串
	char c[15]={'I',' ','a','m',' ','a', ' ', 's','t','u','d','e','n','t','.'};
	int i;
	for(i=0;i<15;i++)
		printf("%c",c[i]);
	printf("\n");
	*/
	
	
	/*
	//输出菱形图
	char diamond[][5]={{' ',' ','*'},{' ','*',' ','*'},{'*',' ',' ',' ','*'},{' ','*',' ','*'},{' ',' ','*'}};
	int i,j;
	for(i=0;i<5;i++)
	{
		for(j=0;j<5;j++){
			printf("%c",diamond[i][j]);
		}
		printf("\n");
	}
	*/
	
	
	/*
	//输入一行字符，统计其中有多少个单词，单词之间用空格分隔开。
	char string[81];
	int i,num=0,word=0;
	char c;
	
	gets(string); 	//输入一个字符串给字符数组string
	for(i=0;(c=string[i])!='\0';i++)	//只要字符不是'\0'就继续执行循环
		if(c==' ') word=0; 	//如果是空格字符，使word置0
		else if(word==0) 	//如果不是空格字符且word原值为0
		{
			word=1;	//使word置1
			num++; //num累加1，表示增加一个单词
		}
	printf("There are %d words in this line.\n",num);	//输出单词数
	*/
	
	/*
	char str[3][20];	//定义二维字符数组
	char string[20];	//定义一维字符数组，作为交换字符串时的临时字符数组
	int i;
	
	for(i=0;i<3;i++)
		gets(str[i]);	//读入3个字符串，分别给str[0],str[1],str[2]
	
	if(strcmp(str[0],str[1])>0)	//若str[0]大于str[1]
		strcpy(string,str[0]);	//把str[0]的字符串赋给字符数组string
	else						//若str[0]小于等于str[1]
		strcpy(string,str[1]);	//把str[1]的字符串赋给字符数组string
		
	if(strcmp(str[2],string)>0)	//若str[2]大于string
		strcpy(string,str[2]);	//把str[2]的字符串赋给字符数组string
	printf("\nthe largest string is: \n%s\n",string);	//输出string
	*/
	
	/*
	//交换值	
	int a = 10, b = 20;
	printf("a=%d,b=%d\n", a, b);
	swap(&a, &b);
	printf("a=%d,b=%d\n", a, b);
	*/
	
	/*
	//由小到大输出
	int t,a,b,c,d;
	printf("请输入4个数：");
	scanf("%d,%d,%d,%d",&a,&b,&c,&d);
	
	if(a>b){
		t=a;a=b;b=t;
	}
	if(a>c){
		{t=a;a=c;c=t;}
	}
	if(a>d){
		{t=a;a=d;d=t;}
	}
	
	if(b>c){
		{t=b;b=c;c=t;}
	}
	if(b>d){
		{t=b;b=d;d=t;}
	}
	
	if(c>d){
		{t=c;c=d;d=t;}
	}
	
	printf("排序结果如下：\n");
	printf("%d %d %d %d \n", a,b,c,d);
	*/
	
	/*
	//求最大公约数及最小公倍数
	int m,n,r,p;
	printf("enter two positive integers: ");
	scanf("%d %d",&m,&n);
	p=n*m;
	while(n!=0){
		r=m%n;
		m=n;
		n=r;
	}
	printf("最大公约数为：%d",m);
	printf("最小公倍数为：%d",p/m);
	*/
	
	/*
	//统计字符个数
	int a=0,b=0,c=0,d=0;
	char s;
	while((s=getchar())!='\n') 
	{
		if((s>='A' && s<='Z') ||(s>='a'&&s<='z')) {
			a++;
		}else if(s== ' '){
			b++;
		} else if(s>'0'&&s<'9'){
			c++;
		} else {
			d++;
		}
	}
	printf("英文字母个数：%d\n",a);
	printf("空格个数：%d\n",b);
	printf("数字个数：%d\n",c);
	printf("其他字符个数：%d",d);
	*/
	
	/*
	// 求a+aa+aaa+...多项式的和
	int a,n,i=1,sn=0,tn=0;
	printf("a,n=:");
	scanf("%d,%d",&a,&n);
	
	while(i<=n)
	{
		tn = tn+a; //赋值后的tn为i个a组成数的值
		sn=sn+tn;	//赋值后的sn为多项式前i项之和
		a=a*10;
		++i;
	}
	printf("a+aa+aaa+...=%d\n",sn);
	*/
	
	/*
	//求1!+2!+3!+4!+...+20!
	double s=0,t=1;
	int n;
	for(n=1;n<=20;n++)
	{
		t=t*n;
		s=s+t;
	}
	printf("1!+2!+...+20!=%22.15e\n",s);
	*/
	
	/*
	//求各位数字立方和等于该数本身的三位数
	int i,hundred,ten,indi;
	for(i=100;i<1000;i++)
	{
		hundred = i/100;
		ten = (i-hundred*100)/10;
		indi = i%10;
		if(i==hundred*hundred*hundred+ten*ten*ten+indi*indi*indi){
			printf("%d\n",i);
		}
		
	}
	*/
	
	/*
	int n1=100,n2=50,n3=10;
	double k,s1=0,s2=0,s3=0;
	
	for(k=1;k<=n1;k++)	//计算1～100的和
	{
		s1=s1+k;
	}
	for(k=1;k<=n2;k++)	//计算1～50各数的平方和
	{
		s2=s2+k*k;
	}
	for(k=1;k<=n3;k++)	//计算1～10的各倒数和
	{
		s3=s3+1/k;
	}
	printf("sum=%15.6f\n",s1+s2+s3);
	*/
	
	/*
	int i;
	double a=2,b=1,s=0,t;
	for(i=1;i<=20;i++)
	{
		s += a/b;
		t=a;
		a=a+b;
		b=t;
	}
	printf("sum=%16.10f\n",s);
	*/
	
	/*
	double sn=100,hn=sn/2;
	int n;
	for(n=2;n<=10;n++)
	{
		sn=sn+2*hn; //第n次落地时共经过的米数
		hn=hn/2;	//第n次反跳高度
	}
	printf("第10次落地时共经过%f米\n",sn);
	printf("第10次反弹%f米\n",hn);
	*/
	
	/*
	int day,x1,x2;
	day=9;
	x2=1;
	while(day>0)
	{
		x1=(x2+1)*2;	//第1天的桃子数是第2天桃子数加1后的2倍
		x2=x1;
		day--;
	}
	printf("total=%d\n",x1);
	*/
	
	/*
	//求3x3矩阵对角线元素和
	int a[3][3],sum=0,i,j;
	printf("enter data: \n");
	
	for(i=0;i<3;i++)
		for(j=0;j<3;j++)
			scanf("%3d",&a[i][j]);
	for(i=0;i<3;i++)
		sum=sum+a[i][i];
	printf("sum=%6d\n",sum);
	*/
	
	/*
	int a[N],i,temp;
	printf("enter array a: \n");
	for(i=0;i<N;i++)
		scanf("%d",&a[i]);
	
	for(i=0;i<N/2;i++)	//循环的作用是将对称的元素的值互换
	{
		temp=a[i];
		a[i] = a[N-i-1];
		a[N-i-1] = temp;
	}
	
	printf("\nNow,array a:\n");
	for(i=0;i<N;i++)
		printf("%d ",a[i]);
	*/
	
	/*
	int i,j,upp=0,low=0,dig=0,spa=0,oth=0;
	char text[3][80];
	
	for(i=0;i<3;i++)
	{
		printf("please input line %d:\n",i+1);
		gets(text[i]);
		
		for(j=0;j<80;j++)
		{
			//遇到结束符号代表该行数据已读完
			if(text[i][j] == '\0') break;
			
			if(text[i][j]>='A'&&text[i][j]<='Z')
				upp++;
			else if(text[i][j]>='a'&&text[i][j]<='z')
				low++;
			else if(text[i][j]>='0'&&text[i][j]<='9')
				dig++;
			else if(text[i][j]==' ')
				spa++;
			else
				oth++;
		}
	}
	
	printf("\nupper case: %d\n",upp);
	printf("lower case: %d\n",low);
	printf("digit: %d\n",dig);
	printf("space: %d\n",spa);
	printf("other: %d\n",oth);
	*/
	
	/*
	//打印图形
//	char a[5] = {"*****"};
//	int i,j,k;
//	
//	for(i=0;i<5;i++)
//	{
//		for(j=0;j<=i-1;j++)
//			printf("%c",' ');
//		
//	    printf("%s",a);
//		printf("\n");	
//	}
	
	char a[5]={'*','*','*','*','*'};
	int i,j,k;
	
	for(i=0;i<5;i++)
	{
		for(j=1;j<=i;j++)
			printf("%c", ' ');
		
		for(k=0;k<5;k++)
			printf("%c",a[k]);
		
		printf("\n");
	}
	*/
	
	/*
	//密文
//	int j,n;
//	char ch[80],tran[80];
//	
//	printf("input cipher code:");
//	gets(ch);
//	printf("\ncipher code: %s",ch);
//	
//	j=0;
//	while(ch[j]!='\0')
//	{
//		if(ch[j]>='A'&&ch[j]<='Z')
//			tran[j]=155-ch[j];
//		else if(ch[j]>='a'&&ch[j]<='z')
//		    tran[j]=219-ch[j];
//		else 
//			tran[j]=ch[j];
//		j++;
//	}
//	
//	n=j;
//	printf("\norginal text:");
//	for(j=0;j<n;j++)
//		putchar(tran[j]);
//	printf("\n");
	
	int j,n;
	char ch[80];
	printf("input cipher code:\n");
	gets(ch);
	printf("\ncipher code:%s\n",ch);
	
	j=0;
	while(ch[j]!='\0')
	{
		if(ch[j]>='A'&&ch[j]<='Z')
			ch[j]=155-ch[j];
		if(ch[j]>='a'&&ch[j]<'z')
			ch[j]=219-ch[j];
		j++;
	}
	
	n=j;
	printf("original text:");
//	for(j=0;j<n;j++)
//		putchar(ch[j]);
//	printf("\n");
	printf("%s",ch);
	*/
	
	/*
	//strcat
	char s1[80],s2[40];
	int i=0,j=0;
	
	printf("input string1:");
	scanf("%s",s1);
	printf("input string2:");
	scanf("%s",s2);
	
//	while(s1[i]!='\0')
//		i++;
	i=strlen(s1);
	
	while(s2[j]!='\0')
		s1[i++]=s2[j++];
	s1[i]='\0';
	printf("\nThe new string is:%s\n",s1);
	*/
	
	/*
	//strcmp
	int i,resu;
	char s1[100],s2[100];
	
	printf("input string1:");
	gets(s1);
	printf("\ninput string2:");
	gets(s2);
	
	i=0;
	while((s1[i]==s2[i])&&(s1[i]!='\0')) i++;
	
	if(s1[i]=='\0'&&s2[i]=='\0')
		resu=0;
	else 
		resu=s1[i]-s2[i];
	printf("\nresult:%d.\n",resu);
	*/
	
	/*
	//strcpy
	char s1[80],s2[80];
	int i;
	
	printf("input s2:");
	scanf("%s",s2);
	
	for(i=0;i<=strlen(s2);i++)
		s1[i]=s2[i];
	printf("s1:%s\n",s1);
	*/
	
	/*
	int a;
	scanf("%d",&a);
	
	while(a<0)
	{
		showerror();
		scanf("%d",&a);
	}
	printf("sqrt(a)=%.2f\n",sqrt(a));
	*/
	
	/*
	void showyes(void);
	showyes();
	*/
	
	/*
	int tot;
	tot=sum();
	
	if(tot==-1)
		printf("\nnot select!\n");
	else 
		printf("\nthe result is: %d\n",tot);
	*/
	
	/*
	void compare(int a,int b);
	int i=2;
	compare(i,i++);
	printf("i=%d\n",i);
	*/
	
	/*
	int max(int a,int b); //函数的原型声明
	int a,b,c;
	scanf("%d%d",&a,&b);
	c=max(a,b);	//函数调用（a、b为实参）
	printf("the biggest number is:%d\n",c);
	*/
	
	/*
	float a,b,c;
	scanf("%f,%f",&a,&b);
	c=add(a,b);
	printf("sum is %f",c);
	*/
	
	/*
	float add2(float,float);	//函数原型声明
	float a,b,c;
	scanf("%f,%f",&a,&b);
	c=add(a,b);
	printf("sum is %f",c);
	*/
	
	void mergestr(char s1[],char s2[],char s3[]);
	
	char str1[] = {"Hello "};
	char str2[] = {"China!"};
	char str3[40];
	mergestr(str1,str2,str3);
	printf("%s\n",str3);
	
	return 0;
}

void mergestr(char s1[],char s2[],char s3[])
{
	int i,j;
	for(i=0;s1[i]!='\0';i++)	//将s1复制到s3中
		s3[i]=s1[i];
	for(j=0;s2[j]!='\0';j++)	//将s2复制到s3的后边
		s3[i+j]=s2[j];
	s3[i+j]='\0';
}

float add2(float x,float y)
{
	float z;
	z=x+y;
	return (z);
}

int max(int a,int b) //函数定义（a、b为形参）
{
	return (a>b?a:b);
}

void compare(int a,int b)
{
	printf("a=%d b=%d\n",a,b);
	if(a>b)
		printf("a>b\n");
	else 
		if(a==b)
			printf("a=b\n");
		else 
			printf("a<b\n");
}

int sum()
{
	int i,tot=0;
	char key;
	
	key=getchar();
	if(key!='0'&&key!='1')
		return (-1);
	key = key=='0' ?2:1;
	for(i=key;i<=100;i+=2)
		tot+=i;
	return (tot);
}

void showyes()
{
	char key;
	if(toupper(getchar())!='Y')
		return;
	printf("YES!");
}

void action1(int x,int y)  //执行加法的函数
{
	printf("x+y=%d\n",x+y);
}

void action2(int x,int y)	//执行乘法的函数
{
	printf("x*y=%d\n",x*y);
}

void showerror() //函数的定义，无参数无返回值
{
	printf("input error!\n"); //函数体，没有声明变量
}
