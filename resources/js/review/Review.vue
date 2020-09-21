<template>
  <div>
    <!-- <div class="row" v-if="error">Unknown error has occured, please try again later!</div> -->
    <fatal-error v-if="error"></fatal-error>
    <div class="row" v-else>
      <div
        :class="[{'col-md-4': loading || !alreadyReviewed },{'d-none': !loading && alreadyReviewed}]"
      >
        <div class="card">
          <div class="card-body">
            <div v-if="loading">Loading...</div>
            <div v-if="hasBooking">
              <p>
                Stay at
                <router-link
                  :to="{name: 'bookable', params: {id:booking.bookable.bookable_id}}"
                >{{booking.bookable.title}}</router-link>
              </p>
              <p>From {{booking.from}} to {{booking.to}}</p>
            </div>
          </div>
        </div>
      </div>
      <div
        :class="[{'col-md-8': loading || !alreadyReviewed}, {'col-md-12': !loading && alreadyReviewed}]"
      >
        <div v-if="loading">Loading...</div>
        <div v-else>
          <div v-if="alreadyReviewed">
            <h3>You've already left a review for this booking!</h3>
          </div>
          <div v-else>
            <div class="form-group">
              <label for class="text-muted">Select the star rating (1 is worst -5 is best)</label>
              <star-rating class="fa-3x" v-model="review.rating"></star-rating>
            </div>
            <div class="form-group">
              <label for="content" class="text-muted">Describe your experience with</label>
              <textarea
                name="content"
                id
                cols="30"
                rows="10"
                class="form-control"
                v-model="review.content"
                :class="[{'is-invalid': errorFor('content')}]"
              ></textarea>
              <v-errors :errors="errorFor('content')"></v-errors>
            </div>
            <button
              class="btn btn-lg btn-primary btn-block"
              @click.prevent="submit"
              :disabled="sending"
            >Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { is404, is422 } from "./../shared/utils/response";
export default {
  data() {
    return {
      review: {
        id: null,
        rating: 5,
        content: null,
      },
      existingReview: null,
      loading: false,
      booking: null,
      error: false,
      errors: null,
      sending: false,
    };
  },
  created() {
    this.review.id = this.$route.params.id;
    this.loading = true;
    //1. If review already exists (in reviews table by id)
    axios
      .get(`/api/reviews/${this.review.id}`)
      .then((response) => {
        this.existingReview = response.data.data;
      })
      .catch((err) => {
        if (is404(err)) {
          //2. Fetch a booking by a revew key
          return axios
            .get(`/api/booking-by-review/${this.review.id}`)
            .then((response) => {
              this.booking = response.data.data;
            })
            .catch((err) => {
              this.error = !is404(err);

              //   this.error = !is404(err);
              //   is404(err) ? {} : (this.error = true);
              //   if (!is404(err)) {
              //     this.error = true;
              //   }
            });
        }
        this.error = true;
      })
      .then(() => {
        this.loading = false;
      });
    //   .then((response) => {
    //     console.log(this.booking.booking_id);
    //     console.log(response);
    //     this.loading = false;
    //   });

    //3. Store the review
  },
  computed: {
    alreadyReviewed() {
      return this.hasReview || !this.booking;
    },
    hasReview() {
      return this.existingReview !== null;
    },
    hasBooking() {
      return this.booking !== null;
    },
  },
  oneColumn() {
    return loading || !alreadyReviewed;
  },
  twoColumn() {
    return !loading && alreadyReviewed;
  },
  methods: {
    submit() {
      this.errors = null;
      this.sending = true;
      axios
        .post(`/api/reviews`, this.review)
        .then((response) => console.log(response))
        .catch((err) => {
          if (is422(err)) {
            const errors = err.response.data.errors;
            if (errors["content"] && 1 === _.size(errors)) {
              this.errors = errors;
              return;
            }
          }
          this.error = true;
        })
        .then(() => (this.sending = false));
    },
    errorFor(field) {
      return null !== this.errors && this.errors[field]
        ? this.errors[field]
        : null;
    },
    //   onRatingChanged(rating) {
    //       console.log(rating);
    //   }
  },
};
</script>

