#include <stdio.h>

int main(int argc, char *argv[]) {
	//输出总秒数
	int h,m,s,ts;
	printf("Enter hour:minute:second: ");
	scanf("%d:%d:%d",&h,&m,&s);
	
	ts=h*3600+m*60+s;
	printf("Total second=%d\n",ts);
	return 0;
}