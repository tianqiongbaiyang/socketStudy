#include <stdio.h>

int main(int argc, char *argv[]) {
	char c1,c2;
	
	int a1,a2;
	
	c1 = getchar();
	
	scanf("%2d",&a1);
	
	c2 = getchar();
	
	scanf("%3d",&a2);
	
	printf("%d,%d,%c,%c\n",a1,a2,c1,c2);

}