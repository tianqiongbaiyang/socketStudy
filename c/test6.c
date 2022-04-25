#include <stdio.h>
#include <math.h>
#include <stdlib.h>

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
	printf("pi=%.6f\n",pi);;

}