import template from './sw-cms-el-review-page.html.twig';
import './sw-cms-el-review-page.scss';

Shopware.Component.register('sw-cms-el-review-page', {
    template,

    mixins: [
        Shopware.Mixin.getByName('cms-element')
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
