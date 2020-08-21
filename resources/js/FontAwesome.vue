<template>
  <div class="font-awesome">
    <v-select
      ref="input"
      :name="name"
      @input="update"
      :clearable="config.clearable"
      :disabled="config.disabled"
      :options="options"
      :searchable="true"
      :value="value"
    >
      <template #option="icon">
        <i class="inline-block w-4 mr-sm" :class="icon.classes" />
        <span v-text="icon.label" />
      </template>

      <template #selected-option="icon">
        <i class="inline-block w-4 mr-sm" :class="icon.classes" />
        <span v-text="icon.label" />
      </template>
    </v-select>
  </div>
</template>

<script>
export default {
  mixins: [Fieldtype],

  data() {
    return {
      loading: true,
      faLicense: null,
      options: [],
    }
  },

  methods: {
    checkLicense() {
      if (! window.FontAwesomeKitConfig) {
        return setTimeout(this.checkLicense, 1000)
      }

      this.faLicense = window.FontAwesomeKitConfig.license
    },
    getIcons() {
      const params = { license: this.faLicense }

      this.$axios.get(cp_url('fontawesome-icons'), { params }).then(({ data }) => {
        _.each(data, (icon, name) => {
          _.each(icon.styles, style => {
            const label = `${icon.label} (${style})`
            const classes = `fa${style.charAt(0)} fa-${name}`

            this.options.push({ label, classes })
          })
        })

        this.loading = false
      })
    },
    setRootClass() {
      this.$el.classList.add(this.faLicense)
    },
  },

  watch: {
    faLicense() {
      this.getIcons()
      this.setRootClass()
    },
  },

  created() {
    this.checkLicense()
  },
}
</script>

<style>
  .font-awesome .fab {
    font-family: "Font Awesome 5 Brands" !important;
  }
  .font-awesome.free .fas,
  .font-awesome.free .far {
    font-family: "Font Awesome 5 Free" !important;
  }
  .font-awesome.pro .fas,
  .font-awesome.pro .far,
  .font-awesome.pro .fal,
  .font-awesome.pro .fad {
    font-family: "Font Awesome 5 Pro" !important;
  }
</style>
