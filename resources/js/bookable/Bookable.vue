<template>
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <div v-if="!loading">
            <h2>{{bookable.title}}</h2>
            <hr />
            <article>{{bookable.description}}</article>
          </div>
          <div v-else>Loading...</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">availability & prices</div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      bookable: null,
      loading: false,
    };
  },
  created() {
    this.loading = true;
    // console.log(this.$route.params.id);
    let bookableId = this.$route.params.id;
    axios.get(`/api/bookables/${bookableId}`).then((response) => {
      this.bookable = response.data;
      this.loading = false;
    });
  },
};
</script>