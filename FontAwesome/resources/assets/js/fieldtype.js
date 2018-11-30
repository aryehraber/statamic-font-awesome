Vue.component('font_awesome-fieldtype', {
  props: ['data', 'config', 'name'],

  template: `
    <div>
      <div v-if="loading" class="loading loading-basic">
        <span class="icon icon-circular-graph animation-spin"></span> {{ translate('cp.loading') }}
      </div>

      <select v-el:input :name="name" v-else></select>
    </div>
  `,

  data() {
    return {
      loading: true,
      icons: [],
    }
  },

  methods: {
    init() {
      var url = document.location.pathname;
      var siteRoot = url.substring(0, url.indexOf('/cp'));

      this.$http.get(siteRoot + '/!/FontAwesome/icons').then(resp => {
        this.loading = false;
        this.icons = resp.data;

        this.categoryFilter = this.config.category_filter || [];

        if (this.categoryFilter.length > 0) {
          this.icons = this.icons.filter(icon => {
            return icon.categories.some(category => {
              return this.categoryFilter.indexOf(category) > -1;
            });
          });
        }

        this.$nextTick(() => this.selectize());
      });
    },
    selectize() {
      $(this.$els.input).selectize({
        options: this.icons,
        items: [this.data],
        valueField: 'id',
        labelField: 'id',
        searchField: ['id', 'filter'],
        placeholder: this.config.placeholder || 'Please Select',
        plugins: ['drag_drop', 'remove_button'],
        onChange: icon => this.data = icon,
        render: {
          option: (icon, escape) => this.template(icon, escape),
          item: (icon, escape) => this.template(icon, escape),
        },
      });
    },
    template(icon, escape) {
      return `
        <div>
          <i class="fa fa-${escape(icon.id)}" aria-hidden="true"></i>
          &nbsp;${escape(icon.id)}
        </div>
      `;
    }
  },

  ready() {
    this.init();
  }
});
