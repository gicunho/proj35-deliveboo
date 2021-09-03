/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\resources\\js\\app.js: Unexpected token (38:0)\n\n\u001b[0m \u001b[90m 36 |\u001b[39m     }\u001b[33m,\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 37 |\u001b[39m     mounted() {\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 38 |\u001b[39m \u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 39 |\u001b[39m         axios\u001b[33m.\u001b[39m\u001b[36mget\u001b[39m(\u001b[32m'api/users'\u001b[39m)\u001b[33m.\u001b[39mthen(resp \u001b[33m=>\u001b[39m {\u001b[0m\n\u001b[0m \u001b[90m 40 |\u001b[39m             console\u001b[33m.\u001b[39mlog(resp)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 41 |\u001b[39m \u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n    at Parser._raise (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:798:17)\n    at Parser.raiseWithData (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:791:17)\n    at Parser.raise (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:752:17)\n    at Parser.unexpected (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:3257:16)\n    at Parser.parseExprAtom (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11520:20)\n    at Parser.parseExprSubscripts (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11081:23)\n    at Parser.parseUpdate (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11061:21)\n    at Parser.parseMaybeUnary (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11039:23)\n    at Parser.parseExprOps (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10882:23)\n    at Parser.parseMaybeConditional (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10856:23)\n    at Parser.parseMaybeAssign (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10814:21)\n    at Parser.parseExpressionBase (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10754:23)\n    at C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10748:39\n    at Parser.allowInAnd (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12589:16)\n    at Parser.parseExpression (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10748:17)\n    at Parser.parseStatementContent (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12927:23)\n    at Parser.parseStatement (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12796:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:13385:25)\n    at Parser.parseBlockBody (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:13376:10)\n    at Parser.parseBlock (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:13360:10)\n    at Parser.parseFunctionBody (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12245:24)\n    at Parser.parseFunctionBodyAndFinish (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12229:10)\n    at Parser.parseMethod (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12179:10)\n    at Parser.parseObjectMethod (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12107:19)\n    at Parser.parseObjPropValue (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12140:23)\n    at Parser.parsePropertyDefinition (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12064:10)\n    at Parser.parseObjectLike (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11953:25)\n    at Parser.parseExprAtom (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11432:23)\n    at Parser.parseExprSubscripts (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11081:23)\n    at Parser.parseUpdate (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11061:21)\n    at Parser.parseMaybeUnary (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:11039:23)\n    at Parser.parseExprOps (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10882:23)\n    at Parser.parseMaybeConditional (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10856:23)\n    at Parser.parseMaybeAssign (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10814:21)\n    at C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:10776:39\n    at Parser.allowInAnd (C:\\Users\\loren\\Desktop\\Esercizi\\Esercizi Classe 35\\Progetto Finale\\proj35-deliveboo\\node_modules\\@babel\\parser\\lib\\index.js:12595:12)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\loren\Desktop\Esercizi\Esercizi Classe 35\Progetto Finale\proj35-deliveboo\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\loren\Desktop\Esercizi\Esercizi Classe 35\Progetto Finale\proj35-deliveboo\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });