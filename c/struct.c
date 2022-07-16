#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <fcntl.h>
//#define N 3  //学生数为3
#define LEN sizeof(struct Student)
//#define N 5
//#define N 10
#define N 13
#define LEN5 sizeof(struct Student5)

struct Student5
{
	long num;
	int score;
	struct Student5 *next;
};
struct Student5 lista,listb;
int n,sum=0;

struct Student3
{
	char num[6];
	char name[8];
	float score[3];
	float avr;
}stu3[N];

struct Student2
{
	char num[6];
	char name[8];
	int score[4];
}stu[N];

/*
struct Student //建立结构体类型struct Student
{
	int num; //学号
	char name[20]; //姓名
	float score[3]; //3门课成绩
	float aver;  //平均成绩
};
*/

struct Student
{
	long num;
	float score;
	struct Student *next;
};

int n; //n为全局变量，本文件模块中各函数均可使用它
struct Student *creat2(void) //定义函数。此函数返回一个指向链表头的指针
{
	struct Student *head;
	struct Student *p1,*p2;
	n=0;
	p1=p2=(struct Student *)malloc(LEN); //开辟一个新单元
	
	scanf("%ld,%f",&p1->num,&p1->score); //输入第一个学生的学号和成绩
	head =NULL;
	
	while(p1->num!=0)
	{
		n=n+1;
		if(n==1) head=p1;
		else p2->next=p1;
		p2=p1;
		p1=(struct Student *)malloc(LEN); //开辟动态存储区，把起始地址赋给p1
		scanf("%ld,%f",&p1->num,&p1->score); //输入其他学生的学号和成绩
	}
	p2->next=NULL;
	return(head);
}

struct 	//声明无名结构体类型
{
	int num; //成员num(编号)
	char name[10]; //成员name（姓名）
	char sex; //成员sex（性别）
	char job; //成员job（职业）
	union
	{
		int clas; //成员clas（班级）
		char position[10]; //成员position（职务）
	}category; //成员category是共用体变量
}person[2]; //定义结构体数组person,有两个元素

int main(int argc, char *argv[]) {
	/*
	//输出结构体变量成员
	struct Student //声明结构题类型struct Student
	{
		long int num; //以下4行为结构体的成员
		char name[20];
		char sex;
		char addr[20];
	}a={10101,"Li Lin",'M',"123 Beijing Road"}; //定义结构体变量a并初始化
	printf("NO. :%ld\nname:%s\nsex:%c\naddress:%s\n",a.num,a.name,a.sex,a.addr);
	*/
	
	
	/*
	struct Student //声明结构体类型struct Student
	{
		int num;
		char name[20];
		float score;
	}student1,student2; //定义两个结构体变量student1,student2
	scanf("%d%s%f",&student1.num,student1.name,&student1.score); //输入学生1的数据
	scanf("%d%s%f",&student2.num,student2.name,&student2.score); //输入学生2的数据
	printf("The higher score is:\n");
	
	if(student1.score>student2.score)
		printf("%d  %s  %6.2f\n",student1.num,student1.name,student1.score);
	else if(student1.score<student2.score)
		printf("%d  %s  %6.2f\n",student2.num,student2.name,student2.score);
	else 
	{
		printf("%d  %s  %6.2f\n",student1.num,student1.name,student1.score);
		printf("%d  %s  %6.2f\n",student2.num,student2.name,student2.score);
	}
	*/
	
	
	/*
	//投票
	struct Person  //声明结构体类型struct Person
	{
		char name[20]; //候选人姓名
		int count; //候选人得票数
	}leader[3]={"Li",0,"Zhang",0,"Sun",0}; //定义结构体数组并初始化
	
	int i,j;
	char leader_name[20]; //定义字符数组
	for(i=1;i<=10;i++)
	{
		scanf("%s",leader_name); //输入所选的候选人姓名
		for(j=0;j<3;j++)
			if(strcmp(leader_name,leader[j].name)==0) leader[j].count++;
	}
	
	printf("\nResult:\n");
	for(i=0;i<3;i++)
		printf("%5s:%d\n",leader[i].name,leader[i].count);
	*/
	
	
	/*
	//成绩排序
	struct Student //声明结构体类型stuct Student
	{
		int num;
		char name[20];
		float score;
	};
	
	struct Student stu[5]={{10101,"Zhang",78},{10103,"Wang",98.5},{10106,"Li",86},{10108,"Ling",73.5},{10110,"Sun",100}}; //定义结构体数组并初始化
	struct Student temp; //定义结构体变量temp，用作交换时的临时变量
	const int n=5; //定义常变量n
	int i,j,k;
	
	printf("The order is:\n");
	for(i=0;i<n-1;i++){
		k=i;
		for(j=i+1;j<n;j++)
			if(stu[j].score>stu[k].score) //进行成绩的比较
				k=j;
		if(k!=i){
			temp=stu[k];stu[k]=stu[i];stu[i]=temp; //stu[k]和stu[i]元素互换
		}
	}
	
	for(i=0;i<n;i++)
		printf("%6d %8s %6.2f\n",stu[i].num,stu[i].name,stu[i].score);
	*/
	
	
	/*
	//指向结构体变量的指针
	struct Student  //声明结构体类型struct Student
	{
		long num;
		char name[20];
		char sex;
		float score;
	};
	
	struct Student stu_1; //定义struct Student 类型的变量stu_1
	struct Student *p; //定义指向struct Student 类型数据的指针变量p
	
	p=&stu_1; //p指向stu_1
	stu_1.num=10101; //对结构体变量的成员赋值
	strcpy(stu_1.name,"Li Lin"); //用字符串复制函数给stu_1.name赋值
	stu_1.sex='M';
	stu_1.score=89.5;
	
	printf("No.:%ld\nname:%s\nsex:%c\nscore:%5.1f\n",stu_1.num,stu_1.name,stu_1.sex,stu_1.score); //输出结果
	printf("\nNo.:%ld\nname:%s\nsex:%c\nscore:%5.1f\n",(*p).num,(*p).name,(*p).sex,(*p).score);
	*/
	
	
	/*
	//指向结构体数组的指针
	struct Student //声明结构体类型struct Student
	{
		int num;
		char name[20];
		char sex;
		int age;
	};
	
	struct Student stu[3]={{10101,"Li Lin",'M',18},{10102,"Zhang Fang",'M',19},{10104,"Wang Min",'F',20}}; //定义结构体数组并初始化
	struct Student *p; //定义指向struct Student 结构体变量的指针变量
	
	printf("No.  	Name     			sex   age\n");
	for(p=stu;p<stu+3;p++)
		printf("%5d  %-20s  %2c  %4d\n",p->num,p->name,p->sex,p->age); //输出结果
	*/
	
	
	/*
	void input(struct Student stu[]); //函数声明
	struct Student max(struct Student stu[]); //函数声明
	void print(struct Student stu); //函数声明
	
	struct Student stu[N],*p=stu; //定义结构体数组和指针
	input(p); //调用input 函数
	print(max(p)); //调用print 函数，以max函数的返回值作为实参
	*/
	
	
	/*
	//建立简单静态链表
	struct Student //声明结构体类型struct Student
	{
		int num;
		float score;
		struct Student *next;
	};
	
	struct Student a,b,c,*head,*p; //定义3个结构体变量a,b,c作为链表的结点
	a.num=10101;a.score=89.5; //对结点a的num和score成员赋值
	b.num=10103;b.score=90; //对结点b的num和score成员赋值
	c.num=10107;c.score=85; //对结点c的num和score成员赋值
	head=&a; //将结点a的起始地址赋给头指针head
	a.next=&b; //将结点b的起始地址赋给a结点的next成员
	b.next=&c; //将结点c的起始地址赋给b结点的next成员
	c.next=NULL; //c结点的next成员不存放其他结点地址
	p=head; //使p指向a结点
	
	do{
		printf("%1d %5.1f\n",p->num,p->score); //输出p指向的结点的数据
		p=p->next; //使p指向下一结点
	}while(p!=NULL); //输出完c结点后p的值为NULL，循环终止
	*/
	
	
	//建立动态链表
	/*
	struct Student *pt;
	pt=creat2(); //函数返回链表第一个结点的地址
	printf("\nnum:%ld\nscore:%5.1f\n",pt->num,pt->score); //输出第一个结点的成员值
	pt=pt->next;
	printf("\nnum:%ld\nscore:%5.1f\n",pt->num,pt->score);
	*/
	
	/*
	void print2(struct Student *head);
	struct Student *head;
	head=creat2(); //调用creat2函数，返回第一个结点的起始地址
	print2(head); //调用print2函数
	*/
	
	
	/*
	//共用体类型
	union Date
	{
		int i;
		char ch;
		float f;
	}a;
	a.i=97;
	
	printf("%d\n",a.i);
	printf("%c\n",a.i);
	printf("%f",a.f);
	*/
	
	
	/*
	int i;
	for(i=0;i<2;i++)
	{
		printf("please enter the data of person:\n");
		scanf("%d %s %c %c",&person[i].num,person[i].name,&person[i].sex,&person[i].job); //输入前4项
		
		if(person[i].job=='s')
			scanf("%d",&person[i].category.clas); //如是学生，输入班级
		else if(person[i].job=='t')
			scanf("%s",person[i].category.position); //如是教师，输入职务
		else
			printf("Input error!"); //如job不是s和t，显示输入错误
	}
	printf("\n");
	printf("No.   name    sex job class/position\n");
	for(i=0;i<2;i++)
	{
		if(person[i].job=='s') //若是学生
		printf("%-6d%-10s%-4c%-4c%-10d\n",person[i].num,person[i].name,person[i].sex,person[i].job,person[i].category.clas); 
		else //若是教师
		printf("%-6d%-10s%-4c%-4c%-10s\n",person[i].num,person[i].name,person[i].sex,person[i].job,person[i].category.position); 
	}
	*/
	
	
	/*
	//枚举类型
	enum Color{red,yellow,blue,white,black}; //声明枚举类型enum Color
	enum Color i,j,k,pri; //定义枚举变量i,j,k,pri
	int n,loop;
	n=0;
	
	for(i=red;i<=black;i++) //外循环使i的值从red变到black
	for(j=red;j<=black;j++) //中循环使j的值从red变到black
	if(i!=j) //如果两球不同色
	{
		for(k=red;k<=black;k++) //内循环使k的值从red变到black
		if((k!=i)&&(k!=j))  //如果3球不同色
		{
			n=n+1; //符合条件的次数加1
			printf("%-4d",n); //输出当前是第几个符合条件的组合
			for(loop=1;loop<=3;loop++)  //先后对3个球分别处理
			{ 
				switch(loop)		//loop的值从1变到3
				{
					case 1: pri=i;break; //loop的值为1时，把第一球的颜色赋给pri
					case 2: pri=j;break; //loop的值为2时，把第二球的颜色赋给pri
					case 3: pri=k;break; //loop的值为3时，把第三球的颜色赋给pri
					default:break;
				}
				switch(pri) //根据球的颜色输出相应的文字
				{
					case red:printf("%-10s","red"); break; //pri的值等于枚举常量red时输出red
					case yellow:printf("%-10s","yellow");break; //pri的值等于枚举常量yellow时输出yellow
					case blue:printf("%-10s","blue");break; //pri的值等于枚举常量blue时输出blue
					case white:printf("%-10s","white");break; //pri的值等于枚举常量white时输出white
					case black:printf("%-10s","black");break; //pri的值等于枚举常量black时输出black
					default:break;
				}
			}	
			printf("\n");
		}
	}
	printf("\ntotal:%5d\n",n);
	*/
	
	
	struct 
	{
		int year;
		int month;
		int day;
	}date; //结构体变量date中的成员对应于年、月、日
	
	/*
	int days; //days为天数
	printf("input year,month,day:");
	scanf("%d,%d,%d",&date.year,&date.month,&date.day);
	
	switch(date.month)
	{
		case 1: days=date.day; break;
		case 2: days=date.day+31; break;
		case 3: days=date.day+59; break;
		case 4: days=date.day+90; break;
		case 5: days=date.day+120; break;
		case 6: days=date.day+151; break;
		case 7: days=date.day+181; break;
		case 8: days=date.day+212; break;
		case 9: days=date.day+243; break;
		case 10: days=date.day+273; break;
		case 11: days=date.day+304; break;
		case 12: days=date.day+334; break;
	}
	if((date.year%4==0 && date.year%100!=0 || date.year%400==0) && date.month>=3) days+=1;
	printf("%d/%d is the %dth day in %d.\n",date.month,date.day,days,date.year);
	*/
	
	/*
	int i,days;
	int day_tab[13]={0,31,28,31,30,31,30,31,31,30,31,30,31};
	printf("input year,month,day:");
	scanf("%d,%d,%d",&date.year,&date.month,&date.day);
	
	days=0;
	for(i=1;i<date.month;i++)
		days=days+day_tab[i];
	days=days+date.day;
	if((date.year%4==0 && date.year%100!=0 || date.year%400==0) && date.month>=3)
		days=days+1;
	printf("%d/%d is the %dth day in %d.\n",date.month,date.day,days,date.year);
	*/
	
	
	/*
	void print3(struct Student2 stu[]);
	int i,j;
	for(i=0;i<N;i++)
	{
		printf("\ninput score of student %d:\n",i+1);
		printf("No.: ");
		scanf("%s",stu[i].num);
		printf("name: ");
		scanf("%s",stu[i].name);
		for(j=0;j<3;j++)
		{
			printf("score%d: ",j+1);
			scanf("%d",&stu[i].score[j]);
		}
		printf("\n");
	}
	print3(stu);
	*/
	
	
	/*
	int i,j,maxi;
	float sum,max,average;
	
	//输入数据
	for(i=0;i<N;i++)
	{
		printf("input scores of student %d:\n",i+1);
		printf("No.: ");
		scanf("%s",stu3[i].num);
		printf("name: ");
		scanf("%s",stu3[i].name);
		
		for(j=0;j<3;j++)
		{
			printf("score%d: ",j+1);
			scanf("%f",&stu3[i].score[j]);
		}
	}
	//计算
	average=0;
	max=0;
	maxi=0;
	for(i=0;i<N;i++)
	{
		sum=0;
		for(j=0;j<3;j++)
			sum+=stu3[i].score[j]; //计算第i个学生总分
		stu3[i].avr=sum/3.0; //计算第i个学生平均分
		average+=stu3[i].avr; 
		if(sum>max) //找出分数最高者
		{
			max=sum;
			maxi=i; //将此学生的下标保存在maxi
		}
	}
	average/=N; //计算总平均分数
	//输出
	printf("NO. name score1 score2 score3 average\n");
	
	for(i=0;i<N;i++)
	{
		printf("%5s%10s",stu3[i].num,stu3[i].name);
		for(j=0;j<3;j++)
			printf("%9.2f",stu3[i].score[j]);
		printf("%8.2f\n",stu3[i].avr);
	}
	
	printf("average=%5.2f\n",average);
	printf("The highest score is: student %s,%s\n",stu3[maxi].num,stu3[maxi].name);
	printf("his scores are:%6.2f,%6.2f,%6.2f,average:%5.2f.\n",stu3[maxi].score[0],stu3[maxi].score[1],stu3[maxi].score[2],stu3[maxi].avr);
	*/
	
	
//	struct Student5 *creat5(void); //函数声明
//	struct Student5 *insert5(struct Student5 *,struct Student5 *); //函数声明
//	void print5(struct Student5 *); //函数声明
//	struct Student5 *ahead,*bhead,*abh;
//	
//	printf("input list a:\n");
//	ahead=creat5(); //调用creat5函数建立表A，返回头地址
//	sum=sum+n;
//	
//	printf("input list b:\n"); 
//	bhead=creat5(); //调用creat5函数建立表B，返回头地址
//	sum=sum+n;
//	
//	abh=insert5(ahead,bhead); //调用insert函数，将两表合并
//	print5(abh); //输出合并后的链表
}

//建立链表的函数
struct Student5 * creat5(void)
{
	struct Student5 *p1,*p2,*head;
	n=0; 
	p1=p2=(struct Student5 *)malloc(LEN5);
	
	printf("input number & scores of student:\n");
	printf("if number is 0,stop inputing.\n");
	scanf("%ld,%d",&p1->num,&p1->score);
	head=NULL;
	while(p1->num!=0)
	{
		n=n+1;
		if(n==1)
			head=p1;
		else
			p2->next=p1;
		p2=p1;
		p1=(struct Student5 *)malloc(LEN5);
		scanf("%ld,%d",&p1->num,&p1->score);
	}
	p2->next=NULL;
	return(head);
}

//定义insert5函数，用来合并两个链表
//struct Student5 *insert5(struct Student5 *ah,struct Student5 *bh)
//{
//	struct Student5 *pa1,*pa2,*pb1,*pb2;
//	pa2=pa1=ah;
//	pb2=pb1=bh;
//	
//	do
//	{
//		while((pb1->num>pa1->num)&&(pa1->next!=NULL))
//		{
//			pa2=pa1;
//			pa1=pa1->next;
//		}
//	}
//}

void print2(struct Student *head) //输出链表的函数
{
	struct Student *p;
	printf("\nNow,These %d records are:\n",n);
	
	p=head;
	if(head!=NULL)
		do{
			printf("%ld %5.1f\n",p->num,p->score);
			p=p->next;
		}while(p!=NULL);
}

void print3(struct Student2 stu[])
{
	int i,j;
	printf("\n No. name score1 score2 score3\n");
	for(i=0;i<N;i++)
	{
		printf("%5s%10s",stu[i].num,stu[i].name);
		for(j=0;j<3;j++)
			printf("%9d",stu[i].score[j]);
		printf("\n");
	}
}

/*
void input(struct Student stu[]) //定义input 函数
{
	int i;
	printf("请输入各学生的信息：学号、姓名、3门课成绩：\n");
	
	for(i=0;i<N;i++){
		scanf("%d %s %f %f %f",&stu[i].num,stu[i].name,&stu[i].score[0],&stu[i].score[1],&stu[i].score[2]); //输入数据
		stu[i].aver=(stu[i].score[0]+stu[i].score[1]+stu[i].score[2])/3.0;  //求平均成绩
	}
}

struct Student max(struct Student stu[]) //定义max函数
{
	int i,m=0; //用m存放成绩最高的学生在数组中的序号
	for(i=0;i<N;i++)
		if(stu[i].aver>stu[m].aver) m=i; //找出平均成绩最高的学生在数组中的序号
	return stu[m];
}

void print(struct Student stud) //定义print函数
{
	printf("\n成绩最高的学生是：\n");
	printf("学号：%d\n姓名：%s\n三门课成绩：%5.1f,%5.1f,%5.1f\n平均成绩：%6.2f\n",stud.num,stud.name,stud.score[0],stud.score[1],stud.score[2],stud.aver);
}
*/