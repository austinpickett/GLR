var app;app=angular.module("app.services",[]),app.service("$pages",["$http","$q","$location",function(e,r,t){return{fetch:function(a){var n;return n=r.defer(),e({method:"POST",url:a,cache:!0,headers:{REQUEST_WITH:"xmlhttprequest"}}).success(function(e,r,c){var p;return p=[],p.data=e,p.headers=c(),t.path(a.replace(/^(?:\/\/|[^\/]+)*\//,"")),t.absUrl(a),window.document.title=p.headers.title,n.resolve(p)}).error(function(e,r){return n.reject(e,r)}),n.promise}}}]);