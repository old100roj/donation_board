<template>
  <div
    id="app"
  >
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="dark"
    >
      <b-navbar-brand href="#">
        Donations
      </b-navbar-brand>
      <b-navbar-nav>
        <b-nav-item href="#">
          Make Donation
        </b-nav-item>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-button
          data-toggle="modal"
          data-target="#exampleModal"
          data-whatever="@mdo"
        >
          Open modal for search
        </b-button>
        <b-modal
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <b-div
            class="modal-dialog"
            role="document"
          >
            <b-div class="modal-content">
              <b-form
                method="get"
                action="{{ route('donatesAPI.index') }}"
              >
                <b-div class="modal-header">
                  <h5
                    id="exampleModalLabel"
                    class="modal-title"
                  >
                    Search
                  </h5>
                  <b-button
                    v-on:click="showModal"
                    type="submit"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                  >
                    <span aria-hidden="true">&times;</span>
                  </b-button>
                </b-div>
              </b-form>
            </b-div>
          </b-div>
        </b-modal>
      </b-navbar-nav>
    </b-navbar>
    <router-view class="container-fluid" />
  </div>
</template>

<script src="./App.js"></script>
