<template>
  <div>
    <h1>{{itemTitle}}</h1>
    <p>{{itemContent}}</p>
    <p>{{price}}</p>
  </div>
</template>
<script>
export default {
  props: { itemTitle: String, itemContent: String, price: Number },
};
</script>
