import template from './sw-cms-el-config-review-page.html.twig';

const { Component, Mixin } = Shopware;

Component.register('sw-cms-el-config-review-page', {
    template,

    mixins: [
        Mixin.getByName('cms-element')
    ],

    created() {
        this.createdComponent();
    },

    methods: {
        createdComponent() {
            this.initElementConfig('review-page');
        }
    }

});
