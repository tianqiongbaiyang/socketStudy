#include <stdio.h>

int main(int argc, char *argv[]) {
	// 个位、十位、百位分离
	int x,b0,b1,b2;
	printf("please input an integer: ");
	scanf("%d",&x);
	
	b2 = x/100;
	b1=(x-b2*100)/10;
	b0=x%10;
	printf("b2=%d,b1=%d,b0=%d\n",b2,b1,b0);
	return 0;
}