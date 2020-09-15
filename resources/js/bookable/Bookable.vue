<template>
  <div>Test</div>
</template>
<script>
export default {
  data() {
    return {
      bookable: null,
    };
  },
  created() {
    // console.log(this.$route.params.id);
    let bookableId = this.$route.params.id;
    axios
      .get(`/api/bookables/${bookableId}`)
      .then((response) => this.bookable == response.data);
  },
};
</script>