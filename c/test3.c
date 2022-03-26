#include <stdio.h>

int main(int argc, char *argv[]) {
	//计算字母偏移量
	char ch,ch1,ch2;
	ch=getchar();
	putchar('\n');
	//求前驱字母
	ch1='z'-('z'-ch+1)%26;
	// 求后驱字母
	ch2='a'+(ch-'a'+1)%26;
	printf("ch1=%c,ch2=%c\n",ch1,ch2);
	return 0;
}