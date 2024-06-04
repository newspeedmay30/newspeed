(()=>{var e={4184:(e,t)=>{var r;!function(){"use strict";var n={}.hasOwnProperty;function a(){for(var e=[],t=0;t<arguments.length;t++){var r=arguments[t];if(r){var o=typeof r;if("string"===o||"number"===o)e.push(r);else if(Array.isArray(r)){if(r.length){var i=a.apply(null,r);i&&e.push(i)}}else if("object"===o){if(r.toString!==Object.prototype.toString&&!r.toString.toString().includes("[native code]")){e.push(r.toString());continue}for(var c in r)n.call(r,c)&&r[c]&&e.push(c)}}}return e.join(" ")}e.exports?(a.default=a,e.exports=a):void 0===(r=function(){return a}.apply(t,[]))||(e.exports=r)}()}},t={};function r(n){var a=t[n];if(void 0!==a)return a.exports;var o=t[n]={exports:{}};return e[n](o,o.exports,r),o.exports}r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{"use strict";var e={};r.r(e),r.d(e,{updateAutoAddFK:()=>x,updateGraphKeywords:()=>U,updateIndexingFilter:()=>H,updateIndexingStats:()=>z,updatePageSpeed:()=>I,updatePostsRows:()=>C,updateSelectedPostType:()=>F,updateTrackedKeywordSummary:()=>R,updateTrackedKeywords:()=>D,updateTrackedKeywordsOverview:()=>A,updateTrackedKeywordsRows:()=>N});var t={};r.r(t),r.d(t,{appData:()=>J,appUi:()=>te});var n={};r.r(n),r.d(n,{getAppData:()=>oe,getAutoAddFK:()=>pe,getGraphKeywords:()=>de,getIndexingFilter:()=>ge,getIndexingStats:()=>ve,getPageSpeed:()=>me,getPostsRows:()=>ye,getPostsRowsAll:()=>be,getSelectedPostType:()=>fe,getTrackedKeywordSummary:()=>ue,getTrackedKeywords:()=>ce,getTrackedKeywordsAll:()=>se,getTrackedKeywordsOverview:()=>ie,getTrackedKeywordsRows:()=>le});var a={};r.r(a),r.d(a,{getIndexingStats:()=>je,getPageSpeed:()=>ke,getPostsRows:()=>Pe,getTrackedKeywordSummary:()=>Se,getTrackedKeywords:()=>he,getTrackedKeywordsOverview:()=>we,getTrackedKeywordsRows:()=>Oe});const o=lodash,i=wp.i18n,c=wp.element,s=wp.hooks;var l=r(4184),u=r.n(l);const p=wp.apiFetch;var d=r.n(p);const m=wp.data,f=wp.components,y=wp.date;const b=function(e){var t=e.className,r=e.children,n=u()("rank-math-tooltip",t);return wp.element.createElement("span",{className:n},wp.element.createElement("em",{className:"dashicons-before dashicons-editor-help"}),wp.element.createElement("span",null,r))};function g(e){return g="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},g(e)}function v(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function w(e,t,r){return(t=function(e){var t=function(e,t){if("object"!==g(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,t||"default");if("object"!==g(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===g(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function h(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,a,o,i,c=[],s=!0,l=!1;try{if(o=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;s=!1}else for(;!(s=(n=o.call(r)).done)&&(c.push(n.value),c.length!==t);s=!0);}catch(e){l=!0,a=e}finally{try{if(!s&&null!=r.return&&(i=r.return(),Object(i)!==i))return}finally{if(l)throw a}}return c}}(e,t)||function(e,t){if(!e)return;if("string"==typeof e)return O(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return O(e,t)}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function O(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}var S=function(e){return(0,o.inRange)(e,0,3.81)?"interactive-good":(0,o.inRange)(e,3.81,7.31)?"interactive-fair":"interactive-bad"},k=function(e){return e>=90?"score-good":(0,o.inRange)(e,50,90)?"score-fair":"score-bad"};const P=(0,m.withSelect)((function(e,t){return function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?v(Object(r),!0).forEach((function(t){w(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):v(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},e("rank-math-pro-analytics").getPageSpeed(t.id,t))}))((function(e){var t=e.id,r=e.pagespeed_refreshed,n=e.object_id,a=e.desktop_pagescore,s=e.desktop_interactive,l=e.mobile_pagescore,p=e.mobile_interactive;s=(0,o.isUndefined)(s)?0:s,p=(0,o.isUndefined)(p)?0:p;var g=h((0,c.useState)(!1),2),v=g[0],w=g[1],O=u()("button button-link button-small",{loading:v}),P=new Date,j=P.getFullYear()+"-"+parseInt(P.getMonth()+1)+"-"+P.getDate(),E=null===r?j:r.split(" ")[0];return v&&(a=0,s=0,l=0,p=0),(0,c.useEffect)((function(){w((0,o.isUndefined)(e.isAdminBar)&&(null===r||"0000-00-00 00:00:00"===r))}),[r]),wp.element.createElement("div",{className:"rank-math-box rank-math-pagespeed-box"},wp.element.createElement("div",{className:"rank-math-pagespeed-header"},wp.element.createElement("h3",null,(0,i.__)("PageSpeed","rank-math-pro"),wp.element.createElement(b,null,(0,i.__)("Google PageSpeed score for desktop and mobile.","rank-math-pro"))),wp.element.createElement("span",null,null!==r&&"0000-00-00 00:00:00"!==r?(0,y.dateI18n)(rankMath.dateFormat,E):""),wp.element.createElement(f.Button,{icon:"image-rotate",iconSize:"16",size:"12",className:O,title:(0,i.__)("Refresh","rank-math-pro"),onClick:function(){w(!0),d()({method:"POST",path:"rankmath/v1/an/getPagespeed/",data:{id:t,objectID:n,force:!0}}).then((function(e){(0,m.dispatch)("rank-math-pro-analytics").updatePageSpeed(e),w(!1)}))}})),wp.element.createElement("div",{className:"grid"},wp.element.createElement("div",{className:"col pagespeed-desktop"},wp.element.createElement("i",{className:"rm-icon rm-icon-desktop"}),wp.element.createElement("strong",{className:"pagespeed "+S(s)},s+" s"),wp.element.createElement("small",{className:"pagescore "+k(a)},a)),wp.element.createElement("div",{className:"col pagespeed-mobile"},wp.element.createElement("i",{className:"rm-icon rm-icon-mobile"}),wp.element.createElement("strong",{className:"pagespeed "+S(p)},p+" s"),wp.element.createElement("small",{className:"pagescore "+k(l)},l))))}));function j(e,t){return{type:"RANK_MATH_APP_DATA",key:e,value:t}}function E(e,t){return{type:"RANK_MATH_APP_UI",key:e,value:t}}function K(e){return K="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},K(e)}function T(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function _(e,t,r){return(t=function(e){var t=function(e,t){if("object"!==K(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,t||"default");if("object"!==K(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===K(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function A(e){return j("trackedKeywordsOverview",e)}function D(e){return j("trackedKeywords",e)}function N(e,t,r){var n=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?T(Object(r),!0).forEach((function(t){_(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):T(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},(0,m.select)("rank-math-pro-analytics").getTrackedKeywordsAll());return(0,o.isUndefined)(n[e])&&(n[e]={}),n[e][r]=t,j("trackedKeywordsRows",n)}function R(e){return j("trackedKeywordSummary",e)}function x(e){return j("autoAddFK",e)}function U(e){return E("selectedGraphKeywords",e)}function I(e){return j("pageSpeed",e)}function F(e){return E("selectedPostType",e)}function G(e){return G="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},G(e)}function M(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function B(e,t,r){return(t=function(e){var t=function(e,t){if("object"!==G(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,t||"default");if("object"!==G(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===G(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function C(e,t,r){var n=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?M(Object(r),!0).forEach((function(t){B(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):M(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},(0,m.select)("rank-math-pro-analytics").getPostsRowsAll());return n[e]=(0,o.isUndefined)(n[e])?{}:n[e],n[e][r]=t,j("postsRows",n)}function H(e){return E("indexingFilter",e)}function z(e){return j("indexingStats",e)}function L(e){return L="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},L(e)}function Q(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function Y(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?Q(Object(r),!0).forEach((function(t){$(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):Q(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function $(e,t,r){return(t=function(e){var t=function(e,t){if("object"!==L(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,t||"default");if("object"!==L(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===L(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var q={trackedKeywordsOverview:!1,trackedKeywords:{},trackedKeywordsRows:{},pageSpeed:{},trackedKeywordSummary:{},autoAddFK:rankMath.autoAddFK,postsRows:{}};function J(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:q,t=arguments.length>1?arguments[1]:void 0;return"RANK_MATH_APP_DATA"===t.type?Y(Y({},e),{},$({},t.key,t.value)):e}function V(e){return V="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},V(e)}function W(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function X(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?W(Object(r),!0).forEach((function(t){Z(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):W(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function Z(e,t,r){return(t=function(e){var t=function(e,t){if("object"!==V(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,t||"default");if("object"!==V(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===V(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var ee={selectedGraphKeywords:null,selectedPostType:"",indexingFilter:""};function te(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:ee,t=arguments.length>1?arguments[1]:void 0;return"RANK_MATH_APP_UI"===t.type?X(X({},e),{},Z({},t.key,t.value)):e}jQuery,wp.htmlEntities;const re=function(e){var t=e.total,r=void 0===t?0:t,n=e.difference,a=void 0===n?0:n,i=e.revert,c=void 0!==i&&i;r=(0,o.isUndefined)(r)?0:r,a=(0,o.isUndefined)(a)?0:a,c=!(0,o.isUndefined)(c)&&c;var s=Math.abs(a)!==a,l=u()("rank-math-item-difference",{up:!c&&!s&&a>0||c&&s,down:!c&&s||c&&!s&&a>0});return wp.element.createElement("div",{className:"rank-math-item-numbers"},wp.element.createElement("strong",{className:"text-large",title:(0,o.round)(r,2)},ne(r)),wp.element.createElement("span",{className:l,title:(0,o.round)(a,2)},ne(a)))};function ne(e){return(0,s.applyFilters)("rank_math_humanNumber",e)}function ae(e){var t=!(arguments.length>1&&void 0!==arguments[1])||arguments[1],r="";return(0,o.map)(e,(function(e,n){e&&(r+="&"+n+"="+(!0===t?"1":e))})),r}function oe(e){return e.appData}function ie(e){return e.appData.trackedKeywordsOverview}function ce(e){return e.appData.trackedKeywords}function se(e){return e.appData.trackedKeywordsRows}function le(e,t,r){var n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"",a=ae(r,!1);return a=a+"&search="+n,(0,o.isUndefined)(e.appData.trackedKeywordsRows[t])?{}:e.appData.trackedKeywordsRows[t][a]}function ue(e){return e.appData.trackedKeywordSummary}function pe(e){return e.appData.autoAddFK}function de(e,t){return(0,o.isNull)(e.appUi.selectedGraphKeywords)?(((0,o.isUndefined)(t)||(0,o.isNull)(t))&&(t={}),Object.keys(t).slice(0,3)):e.appUi.selectedGraphKeywords}function me(e){return e.appData.pageSpeed}function fe(e){return e.appUi.selectedPostType}function ye(e,t,r){var n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"",a=ae(r,!1);return a=""===a?"all":a,a=n?a+"&postType="+n:a,(0,o.isUndefined)(e.appData.postsRows[t])?{}:e.appData.postsRows[t][a]}function be(e){return e.appData.postsRows}function ge(e){return e.appUi.indexingFilter}function ve(e){return e.appData.indexingStats}function we(){d()({method:"GET",path:"rankmath/v1/an/trackedKeywordsOverview"}).then((function(e){(0,m.dispatch)("rank-math-pro-analytics").updateTrackedKeywordsOverview(e)}))}function he(){d()({method:"GET",path:"rankmath/v1/an/getTrackedKeywords"}).then((function(e){(0,m.dispatch)("rank-math-pro-analytics").updateTrackedKeywords(e)}))}function Oe(e,t){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"",n=ae(t,!1)+"&search="+r;d()({method:"GET",path:"rankmath/v1/an/getTrackedKeywordsRows?page="+e+n}).then((function(t){(0,m.dispatch)("rank-math-pro-analytics").updateTrackedKeywordsRows(e,t,""===n?"all":n)}))}function Se(){d()({method:"GET",path:"rankmath/v1/an/getTrackedKeywordSummary"}).then((function(e){(0,m.dispatch)("rank-math-pro-analytics").updateTrackedKeywordSummary(e)}))}function ke(e,t){if(!(0,o.isUndefined)(t)){var r=t.pagespeed_refreshed,n=t.object_id,a=!(0,o.isUndefined)(t.isAdminBar);null!==r&&"0000-00-00 00:00:00"!==r||d()({method:"POST",path:"rankmath/v1/an/getPagespeed/",data:{id:e,objectID:n,isAdminBar:a}}).then((function(e){(0,m.dispatch)("rank-math-pro-analytics").updatePageSpeed(e)})),(0,m.dispatch)("rank-math-pro-analytics").updatePageSpeed(t)}}function Pe(e,t){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"",n=ae(t,!1);n+=r?"&postType=".concat(r):"",d()({method:"GET",path:"rankmath/v1/an/postsRows?page="+e+n}).then((function(t){(0,m.dispatch)("rank-math-pro-analytics").updatePostsRows(e,t,""===n?"all":n)}))}function je(){d()({method:"GET",path:"rankmath/v1/an/inspectionStats"}).then((function(e){(0,m.dispatch)("rank-math-pro-analytics").updateIndexingStats(e)}))}(0,m.registerStore)("rank-math-pro-analytics",{reducer:(0,m.combineReducers)(t),selectors:n,actions:e,resolvers:a});function Ee(){return Ee=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},Ee.apply(this,arguments)}(0,s.addFilter)("rank_math_is_pro","rank-math-pro",(function(){return!0})),(0,s.addAction)("rank-math-analytics-stats","rank-math-pro",(function(e){if(rankMath.isAnalyticsConnected){var t=(0,o.get)(e,"pageviews",0),r=wp.element.createElement(React.Fragment,null,wp.element.createElement("h3",null,(0,i.__)("Search Traffic","rank-math-pro"),wp.element.createElement("span",{className:"rank-math-tooltip"},wp.element.createElement("em",{className:"dashicons-before dashicons-editor-help"}),wp.element.createElement("span",null,(0,i.__)("This is the number of pageviews carried out by visitors from Google.","rank-math-pro")))),wp.element.createElement("div",{className:"score"},wp.element.createElement(re,t)));(0,c.render)(r,document.getElementById("rank-math-analytics-site-traffic"))}(0,c.render)(wp.element.createElement(P,Ee({},e,{isAdminBar:!0})),document.getElementById("rank-math-analytics-stats-pagespeed"))})),(0,s.addFilter)("rank-math-analytics-stats-index-verdict","rank-math-pro",(function(e,t){if((0,o.isEmpty)(t.indexStatus))return"";var r=(0,o.lowerCase)(t.indexStatus.index_verdict),n="indexing_state verdict indexing allowed "+r;return wp.element.createElement("div",{className:"rank-math-item index-status"},wp.element.createElement("h3",null,(0,i.__)("Index Status","rank-math"),wp.element.createElement("span",{className:"rank-math-tooltip"},wp.element.createElement("em",{className:"dashicons-before dashicons-editor-help"}),wp.element.createElement("span",null,(0,i.__)("URL Inspection Status","rank-math")))),wp.element.createElement("div",{className:"verdict"},wp.element.createElement("i",{className:n}),wp.element.createElement("span",null,r)))}))})()})();