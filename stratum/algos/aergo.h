
#ifndef AERGO_H
#define AERGO_H

#ifdef __cplusplus
extern "C" {
#endif

#include <stdint.h>

void aergo_hash(const char* input, char* output, uint32_t len);

#ifdef __cplusplus
}
#endif

#endif
