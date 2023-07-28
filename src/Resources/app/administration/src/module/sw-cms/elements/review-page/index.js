import './component';
import './config';
import './preview';

Shopware.Service('cmsService').registerCmsElement({
    name: 'review-page',
    label: 'sw-cms.elements.reviewPage.label',
    component: 'sw-cms-el-review-page',
    configComponent: 'sw-cms-el-config-review-page',
    previewComponent: 'sw-cms-el-preview-review-page',
    defaultConfig: {
        minRating: {
            source: 'static',
            value: 3
        },
        maxReviews: {
            source: 'static',
            value: 9
        },
        showImages: {
            source: 'static',
            value: false
        },
        showControls: {
            source: 'static',
            value: true
        },
        autoplay: {
            source: 'static',
            value: false
        },
        slideMinWidth: {
            source: 'static',
            value: '300px'
        },
        maxTextLength: {
            source: 'static',
            value: 150
        },
        textHeight: {
            source: 'static',
            value: '110px'
        }
    }
});
