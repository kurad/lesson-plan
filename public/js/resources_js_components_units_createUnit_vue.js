"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_units_createUnit_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/units/createUnit.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/units/createUnit.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      units: {
        subject_id: null,
        unit_no: null,
        title: null,
        key_unit_competence: null
      },
      subject: 0,
      subjects: []
    };
  },
  created: function created() {
    this.getSubjects();
  },
  methods: {
    getSubjects: function getSubjects() {
      axios.get('http://localhost:8000/api/v1/subject-management').then(function (response) {
        this.subjects = response.data;
      }.bind(this));
    },
    addUnit: function addUnit() {
      var _this = this;

      axios.post('http://localhost:8000/api/v1/unit-management', {
        subjectId: this.units.subject_id,
        unitNo: this.units.unit_no,
        title: this.units.title,
        unitCompetence: this.units.key_unit_competence
      }).then(function (response) {
        return _this.$router.push({
          name: 'unitList'
        });
      })["catch"](function (err) {
        return console.log(err);
      })["finally"](function () {
        return _this.loading = false;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/units/createUnit.vue?vue&type=template&id=d0b4c4ea&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/units/createUnit.vue?vue&type=template&id=d0b4c4ea& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function render() {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "row"
  }, [_c("div", {
    staticClass: "col-12"
  }, [_c("div", {
    staticClass: "card"
  }, [_vm._m(0), _vm._v(" "), _c("div", {
    staticClass: "card-body"
  }, [_c("div", {
    staticClass: "row"
  }, [_c("form", {
    on: {
      submit: function submit($event) {
        $event.preventDefault();
        return _vm.addUnit.apply(null, arguments);
      }
    }
  }, [_c("div", {
    staticClass: "col-md-4"
  }, [_c("div", {
    staticClass: "form-group"
  }, [_c("label", [_vm._v("Subject")]), _vm._v(" "), _c("select", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.units.subject_id,
      expression: "units.subject_id"
    }],
    staticClass: "form-control",
    on: {
      change: function change($event) {
        var $$selectedVal = Array.prototype.filter.call($event.target.options, function (o) {
          return o.selected;
        }).map(function (o) {
          var val = "_value" in o ? o._value : o.value;
          return val;
        });

        _vm.$set(_vm.units, "subject_id", $event.target.multiple ? $$selectedVal : $$selectedVal[0]);
      }
    }
  }, [_c("option", {
    attrs: {
      value: "0"
    }
  }, [_vm._v("-- Select Subject --")]), _vm._v(" "), _vm._l(_vm.subjects, function (item) {
    return _c("option", {
      domProps: {
        value: item.id
      }
    }, [_vm._v(_vm._s(item.name) + " ")]);
  })], 2)]), _vm._v(" "), _c("div", {
    staticClass: "form-group"
  }, [_c("label", [_vm._v("Unit No")]), _vm._v(" "), _c("input", {
    directives: [{
      name: "model",
      rawName: "v-model.number",
      value: _vm.units.unit_no,
      expression: "units.unit_no",
      modifiers: {
        number: true
      }
    }],
    staticClass: "form-control",
    attrs: {
      type: "number"
    },
    domProps: {
      value: _vm.units.unit_no
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;

        _vm.$set(_vm.units, "unit_no", _vm._n($event.target.value));
      },
      blur: function blur($event) {
        return _vm.$forceUpdate();
      }
    }
  })])]), _vm._v(" "), _c("div", {
    staticClass: "col-md-6"
  }, [_c("div", {
    staticClass: "form-group"
  }, [_c("label", [_vm._v("Unit Title")]), _vm._v(" "), _c("input", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.units.title,
      expression: "units.title"
    }],
    staticClass: "form-control",
    attrs: {
      type: "text"
    },
    domProps: {
      value: _vm.units.title
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;

        _vm.$set(_vm.units, "title", $event.target.value);
      }
    }
  })]), _vm._v(" "), _c("div", {
    staticClass: "form-group"
  }, [_c("label", [_vm._v("Key Unit Competence")]), _vm._v(" "), _c("textarea", {
    directives: [{
      name: "model",
      rawName: "v-model",
      value: _vm.units.key_unit_competence,
      expression: "units.key_unit_competence"
    }],
    staticClass: "form-control",
    domProps: {
      value: _vm.units.key_unit_competence
    },
    on: {
      input: function input($event) {
        if ($event.target.composing) return;

        _vm.$set(_vm.units, "key_unit_competence", $event.target.value);
      }
    }
  })])]), _vm._v(" "), _c("button", {
    staticClass: "btn btn-primary",
    attrs: {
      type: "submit"
    }
  }, [_vm._v("Create")])])])])])])]);
};

var staticRenderFns = [function () {
  var _vm = this,
      _c = _vm._self._c;

  return _c("div", {
    staticClass: "card-header"
  }, [_c("h4", [_vm._v("Create Unit")])]);
}];
render._withStripped = true;


/***/ }),

/***/ "./resources/js/components/units/createUnit.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/units/createUnit.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _createUnit_vue_vue_type_template_id_d0b4c4ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./createUnit.vue?vue&type=template&id=d0b4c4ea& */ "./resources/js/components/units/createUnit.vue?vue&type=template&id=d0b4c4ea&");
/* harmony import */ var _createUnit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./createUnit.vue?vue&type=script&lang=js& */ "./resources/js/components/units/createUnit.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _createUnit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _createUnit_vue_vue_type_template_id_d0b4c4ea___WEBPACK_IMPORTED_MODULE_0__.render,
  _createUnit_vue_vue_type_template_id_d0b4c4ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/units/createUnit.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/units/createUnit.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/units/createUnit.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_createUnit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./createUnit.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/units/createUnit.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_createUnit_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/units/createUnit.vue?vue&type=template&id=d0b4c4ea&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/units/createUnit.vue?vue&type=template&id=d0b4c4ea& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_createUnit_vue_vue_type_template_id_d0b4c4ea___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_createUnit_vue_vue_type_template_id_d0b4c4ea___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_lib_loaders_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_lib_index_js_vue_loader_options_createUnit_vue_vue_type_template_id_d0b4c4ea___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./createUnit.vue?vue&type=template&id=d0b4c4ea& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/lib/loaders/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/units/createUnit.vue?vue&type=template&id=d0b4c4ea&");


/***/ })

}]);