#include <stdio.h>

int main(int argc, char *argv[]) {
	int x,y=7;
	float z=4;
	x=(y=y+6,y/z);
	printf("x=%d\n",x);
	return 0;
}