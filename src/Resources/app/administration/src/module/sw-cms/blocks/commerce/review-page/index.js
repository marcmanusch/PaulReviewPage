import './component';
import './preview';

Shopware.Service('cmsService').registerCmsBlock({
    name: 'review-page',
    label: 'sw-cms.blocks.commerce.reviewPage.label',
    category: 'commerce',
    component: 'sw-cms-block-review-page',
    previewComponent: 'sw-cms-block-preview-review-page',
    defaultConfig: {
        marginBottom: '20px',
        marginTop: '20px',
        marginLeft: '20px',
        marginRight: '20px',
        sizingMode: 'boxed'
    },
    slots: {
        content: 'review-page'
    }
});
