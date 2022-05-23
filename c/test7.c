#include <stdio.h>
#include <string.h>

int main(int argc, char *argv[]) {
	/*
	int a=100,b=10; //定义整型变量a,b,并初始化
	int *pointer_1,*pointer_2; //定义指向整型数据的指针变量pointer_1,pointer_2
	
	pointer_1=&a; //把变量a的地址赋给指针变量pointer_1
	pointer_2=&b; //把变量b的地址赋给指针变量pointer_2
	printf("a=%d,b=%d\n",a,b); //输出变量a和b的值
	printf("*pointer_1=%d,*pointer_2=%d\n",*pointer_1,*pointer_2); //输出变量a和b的值
	*/
	
	/*
	//先大后小输出
	int *p1,*p2,*p,a,b; //p1,p2的类型是int*类型
	printf("please enter two integer numbers:");
	scanf("%d,%d",&a,&b); //输入两个整数
	
	p1=&a; //使p1指向变量a
	p2=&b; //使p2指向变量b
	if(a<b) //如果a<b
	{
		p=p1;p1=p2;p2=p; //使p1与p2的值互换
	}
	printf("a=%d,b=%d\n",a,b); //输出a,b
	printf("max=%d,min=%d\n",*p1,*p2); //输出p1和p2所指向的变量的值
	*/
	
	/*
	//交换值
	void swap(int *p1,int *p2); //对swap函数的声明
	int a,b; 
	int *pointer_1,*pointer_2; ///定义两个int*型的指针变量
	printf("please enter a and b:"); //定义两个int*型的指针变量
	scanf("%d,%d",&a,&b);
	
	pointer_1=&a; //使pointer_1指向a
	pointer_2=&b; //使pointer_2指向b
	if(a<b) swap(pointer_1,pointer_2); //如果a<b,调用swap函数
	printf("max=%d,min=%d\n",a,b); //输出结果
	*/
	
	/*
	//由大到小输出a,b,c
	void exchange(int *q1,int *q2,int *q3); //函数声明
	int a,b,c,*p1,*p2,*p3;
	printf("please enter three numbers:");
	scanf("%d,%d,%d",&a,&b,&c);
	p1=&a;p2=&b;p3=&c;
	
	exchange(p1,p2,p3);
	printf("The order is:%d,%d,%d\n",a,b,c);
	*/
	
	/*
	//输出数组元素
	int a[10],i,*p;
	
	printf("please enter 10 integer numbers:");
//	for(i=0;i<10;i++)
//		scanf("%d",&a[i]);
//		scanf("%d",a+i);
		
	for(p=a;p<(a+10);p++)
		scanf("%d",p);
	
//	for(i=0;i<10;i++)
//		printf("%d ",a[i]); //数组元素用数组名和下标表示
	
//	for(i=0;i<10;i++)
//		printf("%d ",*(a+i)); //通过数组名和元素序号计算元素地址，再找到该元素
	
	for(p=a;p<(a+10);p++)  //用指针指向当前的数组元素
		printf("%d ",*p);
	*/
	
	/*
	int *p,i,a[10];
	p=a; //p指向a[0]
	printf("please enter 10 integer numbers:");
	
	for(i=0;i<10;i++)
		scanf("%d",p++); //输入10个整数给a[0]~a[9]
	
	p=a;
	for(i=0;i<10;i++,p++) //输入10个整数给a[0]~a[9]
		printf("%d ",*p); //想输出a[0]~a[9]
	*/
	
	/*
	//数组元素翻转
	//void inv(int x[],int n); //inv函数声明
//	void inv(int *x,int n);
//	
//	int i,a[10]={3,7,9,11,0,6,7,5,4,2};
//	printf("The original array:\n");
//	
//	for(i=0;i<10;i++)
//		printf("%d ",a[i]); //输出未交换时数组各元素的值
//	printf("\n");
//	
//	inv(a,10); //调用inv函数，进行交换
//	printf("The array has been inverted:\n"); 
//	for(i=0;i<10;i++) //输出交换后数组各元素的值
//		printf("%d ",a[i]);
//	printf("\n");
	
	
	void inv(int *x,int n); //inv函数声明
	int i,arr[10],*p=arr; //指针变量p指向arr[0]

	printf("The original array:\n"); 
	for(i=0;i<10;i++,p++)
		scanf("%d",p); //输入arr数组的元素
	printf("\n");
	
	p=arr; //指针变量p重新指向arr[0]
	inv(p,10); //调用inv函数，实参p是指针变量
	printf("The array has been inverted:\n");
	
	for(p=arr;p<arr+10;p++)
		printf("%d ",*p);
	*/
	
	/*
	//选择排序,由大到小排序
	void sort(int x[],int n); //sort函数声明
	int i,*p,a[10]; 
	p=a; //指针变量p指向a[10]
	printf("please enter 10 integer numbers:");
	
	for(i=0;i<10;i++)
		scanf("%d",p++); //输入10个整数
	
	p=a; //指针变量重新指向a[0]
	sort(p,10); //调用sort函数
	
	for(p=a,i=0;i<10;i++) 
	{
		printf("%d ",*p); //输出排序后的10个数组元素
		p++;
	}
	*/
	
	/*
	int a=20;
	int *p=&a;
	
	printf("%d\t%d\t%d\n",&a,p,&(*p));
	printf("%d\t%d\t%d\n",a,*p,*(&a));
	*/
	
	/*
	int *pi;
	char *pc;
	long *pl;
	
	pi=(int *)1000;
	pc=(char *)1000;
	pl=(long *)1000;
	
	pi++; //pi=pi+1=pi+sizeof(int)=pi+4;
	printf("sizeof(int)=%d,pi=%d\n",sizeof(int),pi);
	
	pc++; //pc=pc+1=pc+sizeof(char)=pc+1;
	printf("sizeof(char)=%d,pc=%d\n",sizeof(char),pc);
	
	pl-=2; //pl=pl-2=pl-2*sizeof(long)=pl-2*4;
	printf("sizeof(long)=%d,pl=%d\n",sizeof(long),pl);
	*/
	
	/*
	int a[4]={10,20,30,40},i;
	int *p=&a[0];
	
	for(i=0;i<4;i+=2,p+=2)
		printf("p=0x%08x,address(a[%d])=0x%08x\n",p,i,&a[i]);
	*/
	
	/*
	int a[4]={10,20,30,40};
	int *p=a,*q=&a[2];
	
	printf("p=0x%08x,q=0x%08x\n",p,q);
	printf("p-q=%d\n",p-q);
	printf("q-p=%d\n",q-p);
	*/
	
	/*
	//计算数组元素和
	int A[5];
	int i,sum,*p;
	
	printf("input 5 numbers: ");
	for(i=0;i<5;i++) //数组输入，数组指针
		scanf("%d",A+i); 
		
	for(sum=0,i=0;i<5;i++) //下标法
		sum+=A[i];
	printf("sum=%d\n",sum);
	
	for(sum=0,i=0;i<5;i++) //数组指针
		sum+=*(A+i);
	printf("sum=%d\n",sum); 
	
	for(sum=0,p=A,i=0;i<5;i++) //指针变量
		sum+=p[i]; //sum+=*(p+i);
	printf("sum=%d\n",sum); 
	
	for(sum=0,p=A+2;p<A+5;p++) //移动指针变量
		sum+=*p;
	printf("sum=%d\n",sum);
	*/
	
	//利用一般指针变量引用二维数组。
//	short int a[2][3]={{1,2,3},{4,5,6}}; //定义二维数组a
//	short int i,j,*p; //定义一般指针p
//	
//	p=&a[0][0]; //p指向一维数组a[0]的第一个元素，或p=a[0]
//	for(i=0;i<2;i++) //i控制行
//	{
//		for(j=0;j<3;j++) //j控制列
//			printf("a[%d][%d]=%d ",i,j,*(p+i*3+j)); //输出a[i][j]
//			printf("\n"); //输出一行后换行
//	}
	
	/*
	//利用二维数组的行指针引用二维数组元素
	short int a[2][3]={{1,2,3},{4,5,6}}; //定义二维数组a
	short int i,j,(*p)[3]; //定义行指针变量（或数组指针）p
	
	p=a; //p赋值为二维数组a的数组指针，第0行指针，也可以写出p=&a[0]
	for(i=0;i<2;i++) //i控制行
	{
		for(j=0;j<3;j++) //j控制列
			printf("a[%d][%d]=%d ",i,j,p[i][j]); //通过行指针变量引用a[i][j]
		printf("\n"); //输出一行后换行
	}
	
	p++; //p赋值为第1行行指针
	for(j=0;j<3;j++)
		printf("%d ",p[0][j]  ); //输出第一行数据元素
	printf("\n");
	*/
	
	/*
	//利用指针数组进行排序
	int i,j,t,a,b,c,d,e;
	int *p[5]={&a,&b,&c,&d,&e}; //定义指针数组，分别指向a,b,c,d,e,即p[i]是地址，*p[i]是值
	
	printf("input 5 numbers:\n");
	scanf("%d%d%d%d%d",p[0],p[1],p[2],p[3],p[4]); //输出a,b,c,d,e变量的值
	
	//冒泡排序
	for(i=0;i<4;i++)
		for(j=0;j<4-i;j++)
			if(*p[j]>*p[j+1])
			{
				t=*p[j];
				*p[j]=*p[j+1];
				*p[j+1]=t;
			}
			
	printf("Sorted:\n");
	for(i=0;i<5;i++) //输出排序后的结果
		printf("%d ",*p[i]);
	*/
	
	/*
	//使用字符串指针变量按正序、逆序分别输出字符串。
//	char pstr[] = "I Love China!"; 
//	printf("%s\n",pstr);
	char *pstr="I Love China!"; //定义字符指针变量，指向字符串常量
	int i;
	printf("%s\n",pstr); //整体引用输出字符串
	
	for(i=strlen(pstr)-1;i>=0;i--) //单字符引用，逆序输出字符串的每个字符
		printf("%c",pstr[i]); 
	*/
	
	//利用字符指针数组对城市名进行升序排序
	void sort2(char *[],int n); //对字符指针数组指向的城市名升序排序
	void output(char *p[],int n); //输出城市
	
	//定义字符指针数组，分别指向WuHan等字符串
	char *pcity[]={"WuHan","ShenZhen","BeiJin","ShangHai","NanJing"};
	int n;
	n=sizeof(pcity)/sizeof(char *); //利用sizeof运算符计算得到数组pcity的大小
	
	sort2(pcity,n); //对pcity指向的城市名升序排序
	output(pcity,n); //输出排序后的结果
	
	
	return 0;
}

void sort2(char *p[],int n) 
{
	int i,j,flag;
	char *temp;
	
	//冒泡排序
	for(flag=1,i=0;i<n-1 && flag; i++)
		for(flag=0,j=0;j<n-1-i;j++) //flag=0,用于排序优化
			if(strcmp(p[j],p[j+1])>0) //p[j],p[j+1]指向的串反序，串比较用strcmp
			{
				temp=p[j]; //地址交换
				p[j]=p[j+1];
				p[j+1]=temp;
				flag=1; //flag用于优化，此趟排序有交换，继续
			}
}

void output(char *p[],int n)
{
	int i;
	puts("Sort Result:");
	for(i=0;i<n;i++)
		puts(p[i]); //整体引用串
}

void sort(int *x,int n) //形参x是指针变量
{
	int i,j,k,t;
	for(i=0;i<n-1;i++)
	{
		k=i;
		for(j=i+1;j<n;j++)
			if(*(x+j)>*(x+k)) k=j; //*(x+j)就是x[j]，其他亦然
		if(k!=i)
		{
			t=*(x+i);*(x+i)=*(x+k);*(x+k)=t;
		}
	}
}

//void sort(int x[],int n) //定义sort函数，x是形参数组名
//{
//	int i,j,k,t;
//	for(i=0;i<n-1;i++)
//	{
//		k=i;
//		for(j=i+1;j<n;j++)
//		{
//			if(x[j]>x[k])
//			{
//				k=j;
//			}
//			if(k!=i){
//				t=x[i];x[i]=x[k];x[k]=t;
//			}
//		}
//	}
//}

//void inv(int x[],int n) //形参x是数组名
//{
//	int temp,i,j,m=(n-1)/2;
//	for(i=0;i<=m;i++)
//	{
//		j=n-1-i;
//		temp=x[i];x[i]=x[j];x[j]=temp; //把x[i]和x[j]交换
//	}
//}

void inv(int *x,int n) //形参x是指针变量
{
	int *p,temp,*i,*j,m=(n-1)/2;
	i=x;j=x+n-1;p=x+m;
	for(;i<=p;i++,j--)
	{
		temp=*i;*i=*j;*j=temp; //*i与*j交换
	}
}

void exchange(int *q1,int *q2,int *q3) //定义i将3个变量的值交换的函数
{
	void swap(int *p1,int *p2); //函数声明
	if(*q1<*q2) swap(q1,q2); //如果a<b,交换a和b的值
	if(*q1<*q3) swap(q1,q3); //如果a<c，交换a和c的值
	if(*q2<*q3) swap(q2,q3); //如果b<c,交换b和c的值
}

void swap(int *p1,int *p2) //定义swap函数
{
	//使*p1和*p2互换
	int temp; 
	temp=*p1;
	*p1=*p2;
	*p2=temp;
}