<template>
  <div style="padding: 1.25rem">
    <h6 class="text-uppercase text-secondary font-weight-bolder pt-4">Review List Event</h6>
    <div class="border-bottom d-none d-md-block" v-for="number in 3" :key="number">
      <div class="row pt-4">
        <div class="col-md-6">Roshan</div>
        <div class="col-md-6 d-flex justify-content-end">Star rating</div>
      </div>
      <div class="row">
        <div class="col-md-12">Added 5 minutes ago</div>
      </div>
      <div class="row pt-4 pd-4">
        <div class="col-md-12">Content of the review</div>
      </div>
    </div>
  </div>
</template>