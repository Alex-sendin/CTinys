var st = Object.defineProperty;
var lt = (n, e, t) => e in n ? st(n, e, { enumerable: !0, configurable: !0, writable: !0, value: t }) : n[e] = t;
var H = (n, e, t) => (lt(n, typeof e != "symbol" ? e + "" : e, t), t);
(function() {
  const e = document.createElement("link").relList;
  if (e && e.supports && e.supports("modulepreload"))
    return;
  for (const i of document.querySelectorAll('link[rel="modulepreload"]'))
    r(i);
  new MutationObserver((i) => {
    for (const d of i)
      if (d.type === "childList")
        for (const s of d.addedNodes)
          s.tagName === "LINK" && s.rel === "modulepreload" && r(s);
  }).observe(document, { childList: !0, subtree: !0 });
  function t(i) {
    const d = {};
    return i.integrity && (d.integrity = i.integrity), i.referrerPolicy && (d.referrerPolicy = i.referrerPolicy), i.crossOrigin === "use-credentials" ? d.credentials = "include" : i.crossOrigin === "anonymous" ? d.credentials = "omit" : d.credentials = "same-origin", d;
  }
  function r(i) {
    if (i.ep)
      return;
    i.ep = !0;
    const d = t(i);
    fetch(i.href, d);
  }
})();
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const ct = (n) => new Promise((e) => setTimeout(e, n)), ut = (n) => !!n && !!(n.offsetWidth || n.offsetHeight || n.getClientRects().length), $t = (n) => /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(n), ft = () => !!document.getElementById("checkout") || !!document.getElementById("module-thecheckout-order"), mt = async (n) => new Promise(async (e) => {
  const t = setInterval(async () => {
    document.getElementById("clicktopay-card-loading") && (clearInterval(t), e());
  }, 10);
}).then((e) => {
  document.getElementById("clicktopay-card-loading").classList.toggle("active", n);
}), pt = () => {
  clicktopay.isOnePageCheckout || document.getElementById("js-clicktopay-payment-form").classList.add("ps-hidden"), new Promise(async (n) => {
    const e = setInterval(async () => {
      document.querySelector('input[data-module-name*="clicktopay"]') && (clearInterval(e), n());
    }, 10);
  }).then((n) => {
    $('input[name="payment-option"]').on("change", async function(t) {
      if (clicktopay.name === this.dataset.moduleName && document.querySelector('input[data-module-name*="clicktopay"]').disabled) {
        t.stopImmediatePropagation();
        const r = [
          ...document.querySelectorAll(".payment-option")
        ].filter(
          (i) => !i.classList.contains("mc-disabled-payment-option")
        );
        r.length > 0 && r[0].querySelector('input[type="radio"]').click();
      }
    }), document.querySelector('input[data-module-name*="clicktopay"]').checked = !1, document.querySelector('input[data-module-name*="clicktopay"]').disabled = !0, document.querySelector('input[data-module-name*="clicktopay"]').closest(".payment-option").classList.add("mc-disabled-payment-option");
    const e = [
      ...document.querySelectorAll(".payment-option")
    ].filter(
      (t) => !t.classList.contains("mc-disabled-payment-option")
    );
    e.length > 0 && e[0].querySelector('input[type="radio"]').click();
  });
}, ht = (n, e, t, r) => {
  document.body.style.overflowY = "", document.getElementById("dcf-screen").classList.remove("open"), document.getElementById("dcf-overlay").classList.remove("open"), document.getElementById("clicktopay-error-title").innerHTML = n, document.getElementById("clicktopay-error-body").innerHTML = e, document.getElementById("clicktopay-error-btn").innerHTML = t, document.getElementById("clicktopay-error-btn").addEventListener("click", r);
  const i = document.getElementById("clicktopay-error-modal"), d = document.createElement("div");
  i.classList.add("d-block", "in"), i.setAttribute("aria-hidden", "false"), d.classList.add("modal-backdrop", "fade", "in");
  const s = i.parentNode;
  s.insertBefore(d, i.nextSibling), document.getElementById("clicktopay-error-btn").addEventListener("click", () => {
    i.classList.remove("d-block", "in"), i.setAttribute("aria-hidden", "true"), s.removeChild(d);
  });
}, C = {
  delay: ct,
  isVisible: ut,
  isEmail: $t,
  isPaymentStep: ft,
  toggleLoader: mt,
  disablePaymentOption: pt,
  displayError: ht
};
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const yt = (n, e, t = 3600) => {
  const r = /* @__PURE__ */ new Date(), d = {
    expiresAt: new Date(r.getTime() + t * 1e3),
    [n]: e
  };
  sessionStorage.setItem(n, JSON.stringify(d));
}, gt = (n) => {
  const e = /* @__PURE__ */ new Date();
  if (!Je(n))
    return null;
  const t = JSON.parse(sessionStorage.getItem(n)), r = t.expiresAt;
  return Date.parse(e) < Date.parse(r) ? t[n] : (sessionStorage.removeItem(n), console.log(n, "session expired"), null);
}, vt = (n) => {
  sessionStorage.removeItem(n);
}, Je = (n) => sessionStorage.getItem(n) ? JSON.parse(sessionStorage.getItem(n))[n] : !1, E = { set: yt, get: gt, has: Je, remove: vt };
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const q = {
  First: "First",
  Last: "Last",
  Previous: "Previous",
  Next: "Next"
}, bt = (n, e, t, r) => {
  const i = Array.from(n.children), d = (v) => {
    v.preventDefault(), v.stopImmediatePropagation(), n.getAttribute("data-state") === "open" ? S() : F();
  }, s = (v) => {
    switch (v.key) {
      case " ":
      case "Enter":
      case "ArrowDown":
        v.preventDefault(), v.stopPropagation(), F(), w(q.First);
        break;
      case "ArrowUp":
        v.preventDefault(), v.stopPropagation(), F(), w(q.Last);
        break;
    }
  }, m = (v) => {
    switch (v.key) {
      case "ArrowDown":
      case "ArrowRight":
        return v.preventDefault(), v.stopPropagation(), w(q.Next);
      case "ArrowUp":
      case "ArrowLeft":
        return v.preventDefault(), v.stopPropagation(), w(q.Previous);
      case "Home":
      case "PageUp":
        return v.preventDefault(), v.stopPropagation(), w(q.First);
      case "End":
      case "PageDown":
        return v.preventDefault(), v.stopPropagation(), w(q.Last);
      case "Escape":
        v.preventDefault(), v.stopPropagation(), S();
        break;
      case "Tab":
        break;
      case "Enter":
        v.preventDefault(), v.stopPropagation(), S(), D(selected);
        break;
    }
  }, u = (v) => {
    !n.contains(v.target) && !e.contains(v.target) && S();
  };
  e.removeEventListener("click", d), e.addEventListener("click", d), e.removeEventListener("keydown", s), e.addEventListener("keydown", s), n.removeEventListener("keydown", m), n.addEventListener("keydown", m), document.removeEventListener("click", u), document.addEventListener("click", u);
  const g = (v) => {
    let P = n.getAttribute("activedescendant"), _ = P ?? -1, T = ((R) => {
      switch (R) {
        case q.First:
          return i.findIndex(
            (h) => !h.getAttribute("data-disabled")
          );
        case q.Previous: {
          let h = i.slice().reverse().findIndex((c, a, o) => _ !== -1 && o.length - a - 1 >= _ ? !1 : !c.getAttribute("data-disabled"));
          return h === -1 ? h : i.length - 1 - h;
        }
        case q.Next:
          return i.findIndex((h, c) => c <= _ ? !1 : !h.getAttribute("data-disabled"));
        case q.Last: {
          let h = i.slice().reverse().findIndex((c) => !c.getAttribute("data-disabled"));
          return h === -1 ? h : i.length - 1 - h;
        }
      }
    })(v);
    return T === -1 ? P : T;
  }, w = (v) => {
    O(g(v));
  }, O = (v) => {
    n.setAttribute("activedescendant", v), i.forEach((P, _) => {
      var R;
      const T = P.getAttribute("data-state") || "";
      if (_ === parseInt(v)) {
        const h = T + (T.includes("active") ? "" : " active");
        P.setAttribute("data-state", h.trim()), P.scrollIntoView({
          behavior: "smooth",
          block: "nearest",
          inline: "start"
        });
      } else
        P.setAttribute(
          "data-state",
          ((R = P.getAttribute("data-state")) == null ? void 0 : R.replace("active", "")) ?? ""
        );
    });
  }, S = () => {
    n.setAttribute("data-state", "");
  }, F = () => {
    n.setAttribute("data-state", "open");
  }, D = (v) => {
    i.forEach((P, _) => {
      var T;
      if (_ === parseInt(v)) {
        const R = P.getAttribute("data-state") || "", h = R + (R.includes("selected") ? "" : " selected");
        P.setAttribute("data-state", h.trim());
      } else
        P.setAttribute(
          "data-state",
          ((T = P.getAttribute("data-state")) == null ? void 0 : T.replace("selected", "")) ?? ""
        );
    }), S();
  };
  i.forEach((v, P) => {
    v.getAttribute("data-disabled") || (v.addEventListener("mouseover", function(_) {
      _.preventDefault(), _.stopPropagation(), O(P);
    }), v.addEventListener("click", function(_) {
      _.preventDefault(), _.stopPropagation(), D(P), setTimeout(async () => {
        typeof r == "function" && r();
      }, 100);
    }));
  }), D(t);
}, Ct = { create: bt };
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const U = document.getElementById("card-list-dropdown-content"), x = document.getElementById("card-list-dropdown-button"), wt = (n, e = null, t) => {
  Array.from(U.children).forEach((s) => {
    s.getAttribute("data-id") && s.remove();
  }), n = kt(n), Et(U, n), n.length === 1 ? (x.style.pointerEvents = "none", document.getElementById("arrow").style.display = "none") : n.length > 1 && (x.style.pointerEvents = "all", document.getElementById("arrow").style.display = "inline-block");
  const r = n.findIndex(
    (s, m) => s.srcDigitalCardId === It(n, e)
  ), i = new MutationObserver((s, m) => {
    for (const u of s) {
      if (u.type !== "attributes" || u.attributeName !== "data-state")
        return;
      u.target.getAttribute("data-state").trim() === "open" ? (x.querySelector(".card-list-dropdown-button-empty-card").classList.remove("d-hidden"), x.querySelector(".card-list-dropdown-button-full-card").classList.add("d-hidden"), U.style.width = x.offsetWidth + "px", U.classList.add("showc2p"), setTimeout(function() {
        U.focus();
      }, 20)) : (x.querySelector(".card-list-dropdown-button-empty-card").classList.add("d-hidden"), x.querySelector(".card-list-dropdown-button-full-card").classList.remove("d-hidden"), U.classList.remove("showc2p"));
    }
  }), d = new MutationObserver((s, m) => {
    for (const u of s) {
      if (u.type !== "attributes" || u.attributeName !== "data-state")
        return;
      u.target.getAttribute("data-state").includes("selected") ? (u.target.querySelector(".card-list-dropdown-content-card-option-selected").classList.remove("d-hidden"), u.target.classList.add("selected"), x.querySelector(
        ".card-list-dropdown-button-full-card-option-img"
      ).src = u.target.querySelector(
        ".card-list-dropdown-content-card-option-img"
      ).src, x.querySelector(
        ".card-list-dropdown-button-full-card-option-information-bank-card"
      ).innerHTML = u.target.querySelector(
        ".card-list-dropdown-content-card-option-information-bank-card"
      ).innerHTML, x.querySelector(
        ".card-list-dropdown-button-full-card-option-information-card"
      ).innerHTML = u.target.querySelector(
        ".card-list-dropdown-content-card-option-information-card"
      ).innerHTML, x.querySelector(
        ".card-list-dropdown-button-full-card-option-information-number"
      ).innerHTML = u.target.querySelector(
        ".card-list-dropdown-content-card-option-information-number"
      ).innerHTML) : (u.target.querySelector(".card-list-dropdown-content-card-option-selected").classList.add("d-hidden"), u.target.classList.remove("selected")), u.target.getAttribute("data-state").includes("active") ? u.target.classList.add("hovered") : u.target.classList.remove("hovered");
    }
  });
  i.observe(U, {
    attributes: !0,
    attributeFilter: ["data-state"],
    subtree: !1
  }), Array.from(U.children).forEach((s) => {
    d.observe(s, {
      attributes: !0,
      attributeFilter: ["data-state"],
      subtree: !1
    });
  }), Ct.create(
    U,
    x,
    r + 1,
    t
  );
}, kt = (n) => {
  n.map((s) => {
    if (s.panExpirationMonth && s.panExpirationYear) {
      const m = parseInt(s.panExpirationMonth, 10), u = parseInt(s.panExpirationYear, 10);
      new Date(u, m, 1) < /* @__PURE__ */ new Date() && (s.digitalCardData.status = "EXPIRED");
    }
    return s;
  });
  const e = n.filter(
    (s) => ["ACTIVE"].includes(s.digitalCardData.status)
  ), t = n.filter(
    (s) => ["DISABLED"].includes(s.digitalCardData.status)
  ), r = n.filter(
    (s) => ["SUSPENDED"].includes(s.digitalCardData.status)
  ), i = n.filter(
    (s) => ["CANCELED"].includes(s.digitalCardData.status)
  ), d = n.filter(
    (s) => ["EXPIRED"].includes(s.digitalCardData.status)
  );
  return n = e.concat(
    t,
    r,
    i,
    d
  ), n;
}, It = (n, e) => {
  let t = n.find(
    (r) => r.srcDigitalCardId === e
  );
  if (!t) {
    const r = n.filter(
      (i) => ["ACTIVE", "SUSPENDED"].includes(i.digitalCardData.status)
    );
    t = r.length > 0 ? r[0] : null;
  }
  return t == null ? void 0 : t.srcDigitalCardId;
}, Et = (n, e) => {
  e.forEach((t, r) => {
    const i = t.digitalCardData.descriptorName, d = t.paymentCardDescriptor;
    let s = Pt(
      r,
      t.srcDigitalCardId,
      t.digitalCardData.artUri,
      i,
      d.charAt(0).toUpperCase() + d.slice(1),
      " •••• " + t.panLastFour,
      t.digitalCardData.status
    );
    n.appendChild(s);
  });
}, Pt = (n, e, t, r, i, d, s) => {
  const u = document.getElementById("card-list-initial-option").cloneNode(!0);
  switch (u.id = "list-option-" + n, u.removeAttribute("data-disabled"), u.setAttribute("data-id", e), u.classList.remove("d-hidden"), s) {
    case "SUSPENDED":
      u.querySelector(".card-list-dropdown-content-card-option-suspended").classList.remove("d-hidden"), u.querySelector(".card-list-dropdown-content-card-option-information").classList.add("line-through"), u.classList.add("disabled"), u.setAttribute("data-disabled", "true");
      break;
    case "CANCELED":
      u.querySelector(".card-list-dropdown-content-card-option-canceled").classList.remove("d-hidden"), u.querySelector(".card-list-dropdown-content-card-option-information").classList.add("line-through"), u.classList.add("disabled"), u.setAttribute("data-disabled", "true");
      break;
    case "DISABLED":
      u.querySelector(".card-list-dropdown-content-card-option-information").classList.add("line-through"), u.querySelector(".card-list-dropdown-content-card-option-disabled").classList.remove("d-hidden"), u.classList.add("disabled"), u.setAttribute("data-disabled", "true");
      break;
    case "EXPIRED":
      u.querySelector(".card-list-dropdown-content-card-option-information").classList.add("line-through"), u.querySelector(".card-list-dropdown-content-card-option-expired").classList.remove("d-hidden"), u.classList.add("disabled"), u.setAttribute("data-disabled", "true");
      break;
  }
  return u.querySelector(".card-list-dropdown-content-card-option-img").src = t, u.querySelector(
    ".card-list-dropdown-content-card-option-information-bank-card"
  ).textContent = r, u.querySelector(
    ".card-list-dropdown-content-card-option-information-card"
  ).textContent = i, u.querySelector(
    ".card-list-dropdown-content-card-option-information-number"
  ).textContent = d, u.querySelector(
    ".card-list-dropdown-content-card-option-information-bank-card"
  ).classList.remove("d-hidden"), u.querySelector(".card-list-dropdown-content-card-option-information-card").classList.remove("d-hidden"), u.querySelector(".card-list-dropdown-content-card-option-information-number").classList.remove("d-hidden"), u;
}, Z = { create: wt };
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
class ye {
  canInitialize() {
    return typeof window.initializeCTPSDK == "function";
  }
  async initialize(e, t, r, i, d, s, m) {
    return await this.request(
      async () => window.initializeCTPSDK(
        e,
        t,
        r,
        i,
        d,
        s,
        m
      )
    );
  }
  async getNonce(e) {
    return await this.request(async () => await window.getNonce(e));
  }
  async getCards() {
    return await this.request(
      async () => await window.getCardsFromTrustedDevice()
    );
  }
  async clearCardForm() {
    return await this.request(async () => await window.clearCardForm());
  }
  async createCardEntryForm() {
    return await this.request(async () => await window.createCardEntryForm());
  }
  async createCVVEntryForm(e) {
    return await this.request(
      async () => await window.createCVVEntryForm(e)
    );
  }
  async clearCVVForm() {
    return await this.request(async () => await window.clearCVVForm());
  }
  async signOut() {
    return await this.request(async () => await window.signOut());
  }
  async idLookupWithEmail(e) {
    return await this.request(
      async () => await window.idLookupWithEmail(e)
    );
  }
  async idLookupWithPhoneNumber(e, t) {
    return await this.request(
      async () => await window.idLookupWithPhoneNumber(e, t)
    );
  }
  async initiateValidationForOTP(e, t, r) {
    return await this.request(
      async () => await window.initiateValidationForOTP(e, t, r)
    );
  }
  async payWithCard(e, t, r, i, d, s, m, u) {
    return await this.request(
      async () => await window.payWithCard(
        e,
        t,
        r,
        i,
        d,
        s,
        m,
        u
      )
    );
  }
  async payWithNewCard(e, t, r, i, d, s, m) {
    return await this.request(
      async () => await window.payWithNewCard(
        e,
        t,
        r,
        i,
        d,
        s,
        m
      )
    );
  }
  async selectCardForRecognizedUser(e, t, r) {
    return await this.request(
      async () => await window.selectCardForRecognizedUser(
        e,
        t,
        r
      )
    );
  }
  async fetchInstallments(e, t) {
    return await this.request(
      async () => await window.fetchInstallments(e, t)
    );
  }
  async request(e, t = !1) {
    if (navigator.onLine)
      return e();
    if (t)
      console.error("Internet connection lost."), C.displayError(
        clicktopay.errors.internetConnectionLost.title,
        clicktopay.errors.internetConnectionLost.message,
        clicktopay.errors.internetConnectionLost.btn,
        () => {
          location.reload();
        }
      );
    else
      return new Promise((r) => {
        setTimeout(async () => {
          try {
            const i = await this.request(e, !0);
            r(i);
          } catch (i) {
            r(i);
          }
        }, 1e3);
      });
  }
}
const St = { version: 4, country_calling_codes: { 1: ["US", "AG", "AI", "AS", "BB", "BM", "BS", "CA", "DM", "DO", "GD", "GU", "JM", "KN", "KY", "LC", "MP", "MS", "PR", "SX", "TC", "TT", "VC", "VG", "VI"], 7: ["RU", "KZ"], 20: ["EG"], 27: ["ZA"], 30: ["GR"], 31: ["NL"], 32: ["BE"], 33: ["FR"], 34: ["ES"], 36: ["HU"], 39: ["IT", "VA"], 40: ["RO"], 41: ["CH"], 43: ["AT"], 44: ["GB", "GG", "IM", "JE"], 45: ["DK"], 46: ["SE"], 47: ["NO", "SJ"], 48: ["PL"], 49: ["DE"], 51: ["PE"], 52: ["MX"], 53: ["CU"], 54: ["AR"], 55: ["BR"], 56: ["CL"], 57: ["CO"], 58: ["VE"], 60: ["MY"], 61: ["AU", "CC", "CX"], 62: ["ID"], 63: ["PH"], 64: ["NZ"], 65: ["SG"], 66: ["TH"], 81: ["JP"], 82: ["KR"], 84: ["VN"], 86: ["CN"], 90: ["TR"], 91: ["IN"], 92: ["PK"], 93: ["AF"], 94: ["LK"], 95: ["MM"], 98: ["IR"], 211: ["SS"], 212: ["MA", "EH"], 213: ["DZ"], 216: ["TN"], 218: ["LY"], 220: ["GM"], 221: ["SN"], 222: ["MR"], 223: ["ML"], 224: ["GN"], 225: ["CI"], 226: ["BF"], 227: ["NE"], 228: ["TG"], 229: ["BJ"], 230: ["MU"], 231: ["LR"], 232: ["SL"], 233: ["GH"], 234: ["NG"], 235: ["TD"], 236: ["CF"], 237: ["CM"], 238: ["CV"], 239: ["ST"], 240: ["GQ"], 241: ["GA"], 242: ["CG"], 243: ["CD"], 244: ["AO"], 245: ["GW"], 246: ["IO"], 247: ["AC"], 248: ["SC"], 249: ["SD"], 250: ["RW"], 251: ["ET"], 252: ["SO"], 253: ["DJ"], 254: ["KE"], 255: ["TZ"], 256: ["UG"], 257: ["BI"], 258: ["MZ"], 260: ["ZM"], 261: ["MG"], 262: ["RE", "YT"], 263: ["ZW"], 264: ["NA"], 265: ["MW"], 266: ["LS"], 267: ["BW"], 268: ["SZ"], 269: ["KM"], 290: ["SH", "TA"], 291: ["ER"], 297: ["AW"], 298: ["FO"], 299: ["GL"], 350: ["GI"], 351: ["PT"], 352: ["LU"], 353: ["IE"], 354: ["IS"], 355: ["AL"], 356: ["MT"], 357: ["CY"], 358: ["FI", "AX"], 359: ["BG"], 370: ["LT"], 371: ["LV"], 372: ["EE"], 373: ["MD"], 374: ["AM"], 375: ["BY"], 376: ["AD"], 377: ["MC"], 378: ["SM"], 380: ["UA"], 381: ["RS"], 382: ["ME"], 383: ["XK"], 385: ["HR"], 386: ["SI"], 387: ["BA"], 389: ["MK"], 420: ["CZ"], 421: ["SK"], 423: ["LI"], 500: ["FK"], 501: ["BZ"], 502: ["GT"], 503: ["SV"], 504: ["HN"], 505: ["NI"], 506: ["CR"], 507: ["PA"], 508: ["PM"], 509: ["HT"], 590: ["GP", "BL", "MF"], 591: ["BO"], 592: ["GY"], 593: ["EC"], 594: ["GF"], 595: ["PY"], 596: ["MQ"], 597: ["SR"], 598: ["UY"], 599: ["CW", "BQ"], 670: ["TL"], 672: ["NF"], 673: ["BN"], 674: ["NR"], 675: ["PG"], 676: ["TO"], 677: ["SB"], 678: ["VU"], 679: ["FJ"], 680: ["PW"], 681: ["WF"], 682: ["CK"], 683: ["NU"], 685: ["WS"], 686: ["KI"], 687: ["NC"], 688: ["TV"], 689: ["PF"], 690: ["TK"], 691: ["FM"], 692: ["MH"], 850: ["KP"], 852: ["HK"], 853: ["MO"], 855: ["KH"], 856: ["LA"], 880: ["BD"], 886: ["TW"], 960: ["MV"], 961: ["LB"], 962: ["JO"], 963: ["SY"], 964: ["IQ"], 965: ["KW"], 966: ["SA"], 967: ["YE"], 968: ["OM"], 970: ["PS"], 971: ["AE"], 972: ["IL"], 973: ["BH"], 974: ["QA"], 975: ["BT"], 976: ["MN"], 977: ["NP"], 992: ["TJ"], 993: ["TM"], 994: ["AZ"], 995: ["GE"], 996: ["KG"], 998: ["UZ"] }, countries: { AC: ["247", "00", "(?:[01589]\\d|[46])\\d{4}", [5, 6]], AD: ["376", "00", "(?:1|6\\d)\\d{7}|[135-9]\\d{5}", [6, 8, 9], [["(\\d{3})(\\d{3})", "$1 $2", ["[135-9]"]], ["(\\d{4})(\\d{4})", "$1 $2", ["1"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["6"]]]], AE: ["971", "00", "(?:[4-7]\\d|9[0-689])\\d{7}|800\\d{2,9}|[2-4679]\\d{7}", [5, 6, 7, 8, 9, 10, 11, 12], [["(\\d{3})(\\d{2,9})", "$1 $2", ["60|8"]], ["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["[236]|[479][2-8]"], "0$1"], ["(\\d{3})(\\d)(\\d{5})", "$1 $2 $3", ["[479]"]], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["5"], "0$1"]], "0"], AF: ["93", "00", "[2-7]\\d{8}", [9], [["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[2-7]"], "0$1"]], "0"], AG: ["1", "011", "(?:268|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([457]\\d{6})$|1", "268$1", 0, "268"], AI: ["1", "011", "(?:264|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2457]\\d{6})$|1", "264$1", 0, "264"], AL: ["355", "00", "(?:700\\d\\d|900)\\d{3}|8\\d{5,7}|(?:[2-5]|6\\d)\\d{7}", [6, 7, 8, 9], [["(\\d{3})(\\d{3,4})", "$1 $2", ["80|9"], "0$1"], ["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["4[2-6]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[2358][2-5]|4"], "0$1"], ["(\\d{3})(\\d{5})", "$1 $2", ["[23578]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["6"], "0$1"]], "0"], AM: ["374", "00", "(?:[1-489]\\d|55|60|77)\\d{6}", [8], [["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["[89]0"], "0 $1"], ["(\\d{3})(\\d{5})", "$1 $2", ["2|3[12]"], "(0$1)"], ["(\\d{2})(\\d{6})", "$1 $2", ["1|47"], "(0$1)"], ["(\\d{2})(\\d{6})", "$1 $2", ["[3-9]"], "0$1"]], "0"], AO: ["244", "00", "[29]\\d{8}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[29]"]]]], AR: ["54", "00", "(?:11|[89]\\d\\d)\\d{8}|[2368]\\d{9}", [10, 11], [["(\\d{4})(\\d{2})(\\d{4})", "$1 $2-$3", ["2(?:2[024-9]|3[0-59]|47|6[245]|9[02-8])|3(?:3[28]|4[03-9]|5[2-46-8]|7[1-578]|8[2-9])", "2(?:[23]02|6(?:[25]|4[6-8])|9(?:[02356]|4[02568]|72|8[23]))|3(?:3[28]|4(?:[04679]|3[5-8]|5[4-68]|8[2379])|5(?:[2467]|3[237]|8[2-5])|7[1-578]|8(?:[2469]|3[2578]|5[4-8]|7[36-8]|8[5-8]))|2(?:2[24-9]|3[1-59]|47)", "2(?:[23]02|6(?:[25]|4(?:64|[78]))|9(?:[02356]|4(?:[0268]|5[2-6])|72|8[23]))|3(?:3[28]|4(?:[04679]|3[78]|5(?:4[46]|8)|8[2379])|5(?:[2467]|3[237]|8[23])|7[1-578]|8(?:[2469]|3[278]|5[56][46]|86[3-6]))|2(?:2[24-9]|3[1-59]|47)|38(?:[58][78]|7[378])|3(?:4[35][56]|58[45]|8(?:[38]5|54|76))[4-6]", "2(?:[23]02|6(?:[25]|4(?:64|[78]))|9(?:[02356]|4(?:[0268]|5[2-6])|72|8[23]))|3(?:3[28]|4(?:[04679]|3(?:5(?:4[0-25689]|[56])|[78])|58|8[2379])|5(?:[2467]|3[237]|8(?:[23]|4(?:[45]|60)|5(?:4[0-39]|5|64)))|7[1-578]|8(?:[2469]|3[278]|54(?:4|5[13-7]|6[89])|86[3-6]))|2(?:2[24-9]|3[1-59]|47)|38(?:[58][78]|7[378])|3(?:454|85[56])[46]|3(?:4(?:36|5[56])|8(?:[38]5|76))[4-6]"], "0$1", 1], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2-$3", ["1"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{4})", "$1-$2-$3", ["[68]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2-$3", ["[23]"], "0$1", 1], ["(\\d)(\\d{4})(\\d{2})(\\d{4})", "$2 15-$3-$4", ["9(?:2[2-469]|3[3-578])", "9(?:2(?:2[024-9]|3[0-59]|47|6[245]|9[02-8])|3(?:3[28]|4[03-9]|5[2-46-8]|7[1-578]|8[2-9]))", "9(?:2(?:[23]02|6(?:[25]|4[6-8])|9(?:[02356]|4[02568]|72|8[23]))|3(?:3[28]|4(?:[04679]|3[5-8]|5[4-68]|8[2379])|5(?:[2467]|3[237]|8[2-5])|7[1-578]|8(?:[2469]|3[2578]|5[4-8]|7[36-8]|8[5-8])))|92(?:2[24-9]|3[1-59]|47)", "9(?:2(?:[23]02|6(?:[25]|4(?:64|[78]))|9(?:[02356]|4(?:[0268]|5[2-6])|72|8[23]))|3(?:3[28]|4(?:[04679]|3[78]|5(?:4[46]|8)|8[2379])|5(?:[2467]|3[237]|8[23])|7[1-578]|8(?:[2469]|3[278]|5(?:[56][46]|[78])|7[378]|8(?:6[3-6]|[78]))))|92(?:2[24-9]|3[1-59]|47)|93(?:4[35][56]|58[45]|8(?:[38]5|54|76))[4-6]", "9(?:2(?:[23]02|6(?:[25]|4(?:64|[78]))|9(?:[02356]|4(?:[0268]|5[2-6])|72|8[23]))|3(?:3[28]|4(?:[04679]|3(?:5(?:4[0-25689]|[56])|[78])|5(?:4[46]|8)|8[2379])|5(?:[2467]|3[237]|8(?:[23]|4(?:[45]|60)|5(?:4[0-39]|5|64)))|7[1-578]|8(?:[2469]|3[278]|5(?:4(?:4|5[13-7]|6[89])|[56][46]|[78])|7[378]|8(?:6[3-6]|[78]))))|92(?:2[24-9]|3[1-59]|47)|93(?:4(?:36|5[56])|8(?:[38]5|76))[4-6]"], "0$1", 0, "$1 $2 $3-$4"], ["(\\d)(\\d{2})(\\d{4})(\\d{4})", "$2 15-$3-$4", ["91"], "0$1", 0, "$1 $2 $3-$4"], ["(\\d{3})(\\d{3})(\\d{5})", "$1-$2-$3", ["8"], "0$1"], ["(\\d)(\\d{3})(\\d{3})(\\d{4})", "$2 15-$3-$4", ["9"], "0$1", 0, "$1 $2 $3-$4"]], "0", 0, "0?(?:(11|2(?:2(?:02?|[13]|2[13-79]|4[1-6]|5[2457]|6[124-8]|7[1-4]|8[13-6]|9[1267])|3(?:02?|1[467]|2[03-6]|3[13-8]|[49][2-6]|5[2-8]|[67])|4(?:7[3-578]|9)|6(?:[0136]|2[24-6]|4[6-8]?|5[15-8])|80|9(?:0[1-3]|[19]|2\\d|3[1-6]|4[02568]?|5[2-4]|6[2-46]|72?|8[23]?))|3(?:3(?:2[79]|6|8[2578])|4(?:0[0-24-9]|[12]|3[5-8]?|4[24-7]|5[4-68]?|6[02-9]|7[126]|8[2379]?|9[1-36-8])|5(?:1|2[1245]|3[237]?|4[1-46-9]|6[2-4]|7[1-6]|8[2-5]?)|6[24]|7(?:[069]|1[1568]|2[15]|3[145]|4[13]|5[14-8]|7[2-57]|8[126])|8(?:[01]|2[15-7]|3[2578]?|4[13-6]|5[4-8]?|6[1-357-9]|7[36-8]?|8[5-8]?|9[124])))15)?", "9$1"], AS: ["1", "011", "(?:[58]\\d\\d|684|900)\\d{7}", [10], 0, "1", 0, "([267]\\d{6})$|1", "684$1", 0, "684"], AT: ["43", "00", "1\\d{3,12}|2\\d{6,12}|43(?:(?:0\\d|5[02-9])\\d{3,9}|2\\d{4,5}|[3467]\\d{4}|8\\d{4,6}|9\\d{4,7})|5\\d{4,12}|8\\d{7,12}|9\\d{8,12}|(?:[367]\\d|4[0-24-9])\\d{4,11}", [4, 5, 6, 7, 8, 9, 10, 11, 12, 13], [["(\\d)(\\d{3,12})", "$1 $2", ["1(?:11|[2-9])"], "0$1"], ["(\\d{3})(\\d{2})", "$1 $2", ["517"], "0$1"], ["(\\d{2})(\\d{3,5})", "$1 $2", ["5[079]"], "0$1"], ["(\\d{3})(\\d{3,10})", "$1 $2", ["(?:31|4)6|51|6(?:5[0-3579]|[6-9])|7(?:20|32|8)|[89]"], "0$1"], ["(\\d{4})(\\d{3,9})", "$1 $2", ["[2-467]|5[2-6]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["5"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4,7})", "$1 $2 $3", ["5"], "0$1"]], "0"], AU: ["61", "001[14-689]|14(?:1[14]|34|4[17]|[56]6|7[47]|88)0011", "1(?:[0-79]\\d{7}(?:\\d(?:\\d{2})?)?|8[0-24-9]\\d{7})|[2-478]\\d{8}|1\\d{4,7}", [5, 6, 7, 8, 9, 10, 12], [["(\\d{2})(\\d{3,4})", "$1 $2", ["16"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2,4})", "$1 $2 $3", ["16"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["14|4"], "0$1"], ["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["[2378]"], "(0$1)"], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["1(?:30|[89])"]]], "0", 0, "(183[12])|0", 0, 0, 0, [["(?:(?:2(?:[0-26-9]\\d|3[0-8]|4[02-9]|5[0135-9])|3(?:[0-3589]\\d|4[0-578]|6[1-9]|7[0-35-9])|7(?:[013-57-9]\\d|2[0-8]))\\d{3}|8(?:51(?:0(?:0[03-9]|[12479]\\d|3[2-9]|5[0-8]|6[1-9]|8[0-7])|1(?:[0235689]\\d|1[0-69]|4[0-589]|7[0-47-9])|2(?:0[0-79]|[18][13579]|2[14-9]|3[0-46-9]|[4-6]\\d|7[89]|9[0-4]))|(?:6[0-8]|[78]\\d)\\d{3}|9(?:[02-9]\\d{3}|1(?:(?:[0-58]\\d|6[0135-9])\\d|7(?:0[0-24-9]|[1-9]\\d)|9(?:[0-46-9]\\d|5[0-79])))))\\d{3}", [9]], ["4(?:(?:79|94)[01]|83[0-389])\\d{5}|4(?:[0-3]\\d|4[047-9]|5[0-25-9]|6[0-26-9]|7[02-8]|8[0-24-9]|9[0-37-9])\\d{6}", [9]], ["180(?:0\\d{3}|2)\\d{3}", [7, 10]], ["190[0-26]\\d{6}", [10]], 0, 0, 0, ["163\\d{2,6}", [5, 6, 7, 8, 9]], ["14(?:5(?:1[0458]|[23][458])|71\\d)\\d{4}", [9]], ["13(?:00\\d{6}(?:\\d{2})?|45[0-4]\\d{3})|13\\d{4}", [6, 8, 10, 12]]], "0011"], AW: ["297", "00", "(?:[25-79]\\d\\d|800)\\d{4}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[25-9]"]]]], AX: ["358", "00|99(?:[01469]|5(?:[14]1|3[23]|5[59]|77|88|9[09]))", "2\\d{4,9}|35\\d{4,5}|(?:60\\d\\d|800)\\d{4,6}|7\\d{5,11}|(?:[14]\\d|3[0-46-9]|50)\\d{4,8}", [5, 6, 7, 8, 9, 10, 11, 12], 0, "0", 0, 0, 0, 0, "18", 0, "00"], AZ: ["994", "00", "365\\d{6}|(?:[124579]\\d|60|88)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["90"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["1[28]|2|365|46", "1[28]|2|365[45]|46", "1[28]|2|365(?:4|5[02])|46"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[13-9]"], "0$1"]], "0"], BA: ["387", "00", "6\\d{8}|(?:[35689]\\d|49|70)\\d{6}", [8, 9], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["6[1-3]|[7-9]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2-$3", ["[3-5]|6[56]"], "0$1"], ["(\\d{2})(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3 $4", ["6"], "0$1"]], "0"], BB: ["1", "011", "(?:246|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "246$1", 0, "246"], BD: ["880", "00", "[1-469]\\d{9}|8[0-79]\\d{7,8}|[2-79]\\d{8}|[2-9]\\d{7}|[3-9]\\d{6}|[57-9]\\d{5}", [6, 7, 8, 9, 10], [["(\\d{2})(\\d{4,6})", "$1-$2", ["31[5-8]|[459]1"], "0$1"], ["(\\d{3})(\\d{3,7})", "$1-$2", ["3(?:[67]|8[013-9])|4(?:6[168]|7|[89][18])|5(?:6[128]|9)|6(?:[15]|28|4[14])|7[2-589]|8(?:0[014-9]|[12])|9[358]|(?:3[2-5]|4[235]|5[2-578]|6[0389]|76|8[3-7]|9[24])1|(?:44|66)[01346-9]"], "0$1"], ["(\\d{4})(\\d{3,6})", "$1-$2", ["[13-9]|22"], "0$1"], ["(\\d)(\\d{7,8})", "$1-$2", ["2"], "0$1"]], "0"], BE: ["32", "00", "4\\d{8}|[1-9]\\d{7}", [8, 9], [["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["(?:80|9)0"], "0$1"], ["(\\d)(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[239]|4[23]"], "0$1"], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[15-8]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["4"], "0$1"]], "0"], BF: ["226", "00", "[025-7]\\d{7}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[025-7]"]]]], BG: ["359", "00", "00800\\d{7}|[2-7]\\d{6,7}|[89]\\d{6,8}|2\\d{5}", [6, 7, 8, 9, 12], [["(\\d)(\\d)(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["2"], "0$1"], ["(\\d{3})(\\d{4})", "$1 $2", ["43[1-6]|70[1-9]"], "0$1"], ["(\\d)(\\d{3})(\\d{3,4})", "$1 $2 $3", ["2"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2,3})", "$1 $2 $3", ["[356]|4[124-7]|7[1-9]|8[1-6]|9[1-7]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["(?:70|8)0"], "0$1"], ["(\\d{3})(\\d{3})(\\d{2})", "$1 $2 $3", ["43[1-7]|7"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[48]|9[08]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["9"], "0$1"]], "0"], BH: ["973", "00", "[136-9]\\d{7}", [8], [["(\\d{4})(\\d{4})", "$1 $2", ["[13679]|8[02-4679]"]]]], BI: ["257", "00", "(?:[267]\\d|31)\\d{6}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2367]"]]]], BJ: ["229", "00", "[24-689]\\d{7}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[24-689]"]]]], BL: ["590", "00", "590\\d{6}|(?:69|80|9\\d)\\d{7}", [9], 0, "0", 0, 0, 0, 0, 0, [["590(?:2[7-9]|3[3-7]|5[12]|87)\\d{4}"], ["69(?:0\\d\\d|1(?:2[2-9]|3[0-5]))\\d{4}"], ["80[0-5]\\d{6}"], 0, 0, 0, 0, 0, ["9(?:(?:395|76[018])\\d|475[0-5])\\d{4}"]]], BM: ["1", "011", "(?:441|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "441$1", 0, "441"], BN: ["673", "00", "[2-578]\\d{6}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[2-578]"]]]], BO: ["591", "00(?:1\\d)?", "(?:[2-467]\\d\\d|8001)\\d{5}", [8, 9], [["(\\d)(\\d{7})", "$1 $2", ["[23]|4[46]"]], ["(\\d{8})", "$1", ["[67]"]], ["(\\d{3})(\\d{2})(\\d{4})", "$1 $2 $3", ["8"]]], "0", 0, "0(1\\d)?"], BQ: ["599", "00", "(?:[34]1|7\\d)\\d{5}", [7], 0, 0, 0, 0, 0, 0, "[347]"], BR: ["55", "00(?:1[245]|2[1-35]|31|4[13]|[56]5|99)", "(?:[1-46-9]\\d\\d|5(?:[0-46-9]\\d|5[0-46-9]))\\d{8}|[1-9]\\d{9}|[3589]\\d{8}|[34]\\d{7}", [8, 9, 10, 11], [["(\\d{4})(\\d{4})", "$1-$2", ["300|4(?:0[02]|37)", "4(?:02|37)0|[34]00"]], ["(\\d{3})(\\d{2,3})(\\d{4})", "$1 $2 $3", ["(?:[358]|90)0"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2-$3", ["(?:[14689][1-9]|2[12478]|3[1-578]|5[13-5]|7[13-579])[2-57]"], "($1)"], ["(\\d{2})(\\d{5})(\\d{4})", "$1 $2-$3", ["[16][1-9]|[2-57-9]"], "($1)"]], "0", 0, "(?:0|90)(?:(1[245]|2[1-35]|31|4[13]|[56]5|99)(\\d{10,11}))?", "$2"], BS: ["1", "011", "(?:242|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([3-8]\\d{6})$|1", "242$1", 0, "242"], BT: ["975", "00", "[17]\\d{7}|[2-8]\\d{6}", [7, 8], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["[2-68]|7[246]"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["1[67]|7"]]]], BW: ["267", "00", "(?:0800|(?:[37]|800)\\d)\\d{6}|(?:[2-6]\\d|90)\\d{5}", [7, 8, 10], [["(\\d{2})(\\d{5})", "$1 $2", ["90"]], ["(\\d{3})(\\d{4})", "$1 $2", ["[24-6]|3[15-9]"]], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[37]"]], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["0"]], ["(\\d{3})(\\d{4})(\\d{3})", "$1 $2 $3", ["8"]]]], BY: ["375", "810", "(?:[12]\\d|33|44|902)\\d{7}|8(?:0[0-79]\\d{5,7}|[1-7]\\d{9})|8(?:1[0-489]|[5-79]\\d)\\d{7}|8[1-79]\\d{6,7}|8[0-79]\\d{5}|8\\d{5}", [6, 7, 8, 9, 10, 11], [["(\\d{3})(\\d{3})", "$1 $2", ["800"], "8 $1"], ["(\\d{3})(\\d{2})(\\d{2,4})", "$1 $2 $3", ["800"], "8 $1"], ["(\\d{4})(\\d{2})(\\d{3})", "$1 $2-$3", ["1(?:5[169]|6[3-5]|7[179])|2(?:1[35]|2[34]|3[3-5])", "1(?:5[169]|6(?:3[1-3]|4|5[125])|7(?:1[3-9]|7[0-24-6]|9[2-7]))|2(?:1[35]|2[34]|3[3-5])"], "8 0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2-$3-$4", ["1(?:[56]|7[467])|2[1-3]"], "8 0$1"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2-$3-$4", ["[1-4]"], "8 0$1"], ["(\\d{3})(\\d{3,4})(\\d{4})", "$1 $2 $3", ["[89]"], "8 $1"]], "8", 0, "0|80?", 0, 0, 0, 0, "8~10"], BZ: ["501", "00", "(?:0800\\d|[2-8])\\d{6}", [7, 11], [["(\\d{3})(\\d{4})", "$1-$2", ["[2-8]"]], ["(\\d)(\\d{3})(\\d{4})(\\d{3})", "$1-$2-$3-$4", ["0"]]]], CA: ["1", "011", "(?:[2-8]\\d|90)\\d{8}|3\\d{6}", [7, 10], 0, "1", 0, 0, 0, 0, 0, [["(?:2(?:04|[23]6|[48]9|50|63)|3(?:06|43|54|6[578]|82)|4(?:03|1[68]|[26]8|3[178]|50|74)|5(?:06|1[49]|48|79|8[147])|6(?:04|[18]3|39|47|72)|7(?:0[59]|42|53|78|8[02])|8(?:[06]7|19|25|73)|90[25])[2-9]\\d{6}", [10]], ["", [10]], ["8(?:00|33|44|55|66|77|88)[2-9]\\d{6}", [10]], ["900[2-9]\\d{6}", [10]], ["52(?:3(?:[2-46-9][02-9]\\d|5(?:[02-46-9]\\d|5[0-46-9]))|4(?:[2-478][02-9]\\d|5(?:[034]\\d|2[024-9]|5[0-46-9])|6(?:0[1-9]|[2-9]\\d)|9(?:[05-9]\\d|2[0-5]|49)))\\d{4}|52[34][2-9]1[02-9]\\d{4}|(?:5(?:00|2[125-9]|33|44|66|77|88)|622)[2-9]\\d{6}", [10]], 0, ["310\\d{4}", [7]], 0, ["600[2-9]\\d{6}", [10]]]], CC: ["61", "001[14-689]|14(?:1[14]|34|4[17]|[56]6|7[47]|88)0011", "1(?:[0-79]\\d{8}(?:\\d{2})?|8[0-24-9]\\d{7})|[148]\\d{8}|1\\d{5,7}", [6, 7, 8, 9, 10, 12], 0, "0", 0, "([59]\\d{7})$|0", "8$1", 0, 0, [["8(?:51(?:0(?:02|31|60|89)|1(?:18|76)|223)|91(?:0(?:1[0-2]|29)|1(?:[28]2|50|79)|2(?:10|64)|3(?:[06]8|22)|4[29]8|62\\d|70[23]|959))\\d{3}", [9]], ["4(?:(?:79|94)[01]|83[0-389])\\d{5}|4(?:[0-3]\\d|4[047-9]|5[0-25-9]|6[0-26-9]|7[02-8]|8[0-24-9]|9[0-37-9])\\d{6}", [9]], ["180(?:0\\d{3}|2)\\d{3}", [7, 10]], ["190[0-26]\\d{6}", [10]], 0, 0, 0, 0, ["14(?:5(?:1[0458]|[23][458])|71\\d)\\d{4}", [9]], ["13(?:00\\d{6}(?:\\d{2})?|45[0-4]\\d{3})|13\\d{4}", [6, 8, 10, 12]]], "0011"], CD: ["243", "00", "[189]\\d{8}|[1-68]\\d{6}", [7, 9], [["(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3", ["88"], "0$1"], ["(\\d{2})(\\d{5})", "$1 $2", ["[1-6]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[89]"], "0$1"]], "0"], CF: ["236", "00", "(?:[27]\\d{3}|8776)\\d{4}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[278]"]]]], CG: ["242", "00", "222\\d{6}|(?:0\\d|80)\\d{7}", [9], [["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["8"]], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[02]"]]]], CH: ["41", "00", "8\\d{11}|[2-9]\\d{8}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["8[047]|90"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2-79]|81"], "0$1"], ["(\\d{3})(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4 $5", ["8"], "0$1"]], "0"], CI: ["225", "00", "[02]\\d{9}", [10], [["(\\d{2})(\\d{2})(\\d)(\\d{5})", "$1 $2 $3 $4", ["2"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{4})", "$1 $2 $3 $4", ["0"]]]], CK: ["682", "00", "[2-578]\\d{4}", [5], [["(\\d{2})(\\d{3})", "$1 $2", ["[2-578]"]]]], CL: ["56", "(?:0|1(?:1[0-69]|2[02-5]|5[13-58]|69|7[0167]|8[018]))0", "12300\\d{6}|6\\d{9,10}|[2-9]\\d{8}", [9, 10, 11], [["(\\d{5})(\\d{4})", "$1 $2", ["219", "2196"], "($1)"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["44"]], ["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["2[1-36]"], "($1)"], ["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["9[2-9]"]], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["3[2-5]|[47]|5[1-3578]|6[13-57]|8(?:0[1-9]|[1-9])"], "($1)"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["60|8"]], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"]], ["(\\d{3})(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3 $4", ["60"]]]], CM: ["237", "00", "[26]\\d{8}|88\\d{6,7}", [8, 9], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["88"]], ["(\\d)(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4 $5", ["[26]|88"]]]], CN: ["86", "00|1(?:[12]\\d|79)\\d\\d00", "1[127]\\d{8,9}|2\\d{9}(?:\\d{2})?|[12]\\d{6,7}|86\\d{6}|(?:1[03-689]\\d|6)\\d{7,9}|(?:[3-579]\\d|8[0-57-9])\\d{6,9}", [7, 8, 9, 10, 11, 12], [["(\\d{2})(\\d{5,6})", "$1 $2", ["(?:10|2[0-57-9])[19]", "(?:10|2[0-57-9])(?:10|9[56])", "10(?:10|9[56])|2[0-57-9](?:100|9[56])"], "0$1"], ["(\\d{3})(\\d{5,6})", "$1 $2", ["3(?:[157]|35|49|9[1-68])|4(?:[17]|2[179]|6[47-9]|8[23])|5(?:[1357]|2[37]|4[36]|6[1-46]|80)|6(?:3[1-5]|6[0238]|9[12])|7(?:01|[1579]|2[248]|3[014-9]|4[3-6]|6[023689])|8(?:1[236-8]|2[5-7]|[37]|8[36-8]|9[1-8])|9(?:0[1-3689]|1[1-79]|[379]|4[13]|5[1-5])|(?:4[35]|59|85)[1-9]", "(?:3(?:[157]\\d|35|49|9[1-68])|4(?:[17]\\d|2[179]|[35][1-9]|6[47-9]|8[23])|5(?:[1357]\\d|2[37]|4[36]|6[1-46]|80|9[1-9])|6(?:3[1-5]|6[0238]|9[12])|7(?:01|[1579]\\d|2[248]|3[014-9]|4[3-6]|6[023689])|8(?:1[236-8]|2[5-7]|[37]\\d|5[1-9]|8[36-8]|9[1-8])|9(?:0[1-3689]|1[1-79]|[379]\\d|4[13]|5[1-5]))[19]", "85[23](?:10|95)|(?:3(?:[157]\\d|35|49|9[1-68])|4(?:[17]\\d|2[179]|[35][1-9]|6[47-9]|8[23])|5(?:[1357]\\d|2[37]|4[36]|6[1-46]|80|9[1-9])|6(?:3[1-5]|6[0238]|9[12])|7(?:01|[1579]\\d|2[248]|3[014-9]|4[3-6]|6[023689])|8(?:1[236-8]|2[5-7]|[37]\\d|5[14-9]|8[36-8]|9[1-8])|9(?:0[1-3689]|1[1-79]|[379]\\d|4[13]|5[1-5]))(?:10|9[56])", "85[23](?:100|95)|(?:3(?:[157]\\d|35|49|9[1-68])|4(?:[17]\\d|2[179]|[35][1-9]|6[47-9]|8[23])|5(?:[1357]\\d|2[37]|4[36]|6[1-46]|80|9[1-9])|6(?:3[1-5]|6[0238]|9[12])|7(?:01|[1579]\\d|2[248]|3[014-9]|4[3-6]|6[023689])|8(?:1[236-8]|2[5-7]|[37]\\d|5[14-9]|8[36-8]|9[1-8])|9(?:0[1-3689]|1[1-79]|[379]\\d|4[13]|5[1-5]))(?:100|9[56])"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["(?:4|80)0"]], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["10|2(?:[02-57-9]|1[1-9])", "10|2(?:[02-57-9]|1[1-9])", "10[0-79]|2(?:[02-57-9]|1[1-79])|(?:10|21)8(?:0[1-9]|[1-9])"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["3(?:[3-59]|7[02-68])|4(?:[26-8]|3[3-9]|5[2-9])|5(?:3[03-9]|[468]|7[028]|9[2-46-9])|6|7(?:[0-247]|3[04-9]|5[0-4689]|6[2368])|8(?:[1-358]|9[1-7])|9(?:[013479]|5[1-5])|(?:[34]1|55|79|87)[02-9]"], "0$1", 1], ["(\\d{3})(\\d{7,8})", "$1 $2", ["9"]], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["80"], "0$1", 1], ["(\\d{3})(\\d{4})(\\d{4})", "$1 $2 $3", ["[3-578]"], "0$1", 1], ["(\\d{3})(\\d{4})(\\d{4})", "$1 $2 $3", ["1[3-9]"]], ["(\\d{2})(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3 $4", ["[12]"], "0$1", 1]], "0", 0, "(1(?:[12]\\d|79)\\d\\d)|0", 0, 0, 0, 0, "00"], CO: ["57", "00(?:4(?:[14]4|56)|[579])", "(?:60\\d\\d|9101)\\d{6}|(?:1\\d|3)\\d{9}", [10, 11], [["(\\d{3})(\\d{7})", "$1 $2", ["6"], "($1)"], ["(\\d{3})(\\d{7})", "$1 $2", ["3[0-357]|91"]], ["(\\d)(\\d{3})(\\d{7})", "$1-$2-$3", ["1"], "0$1", 0, "$1 $2 $3"]], "0", 0, "0([3579]|4(?:[14]4|56))?"], CR: ["506", "00", "(?:8\\d|90)\\d{8}|(?:[24-8]\\d{3}|3005)\\d{4}", [8, 10], [["(\\d{4})(\\d{4})", "$1 $2", ["[2-7]|8[3-9]"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1-$2-$3", ["[89]"]]], 0, 0, "(19(?:0[0-2468]|1[09]|20|66|77|99))"], CU: ["53", "119", "[27]\\d{6,7}|[34]\\d{5,7}|63\\d{6}|(?:5|8\\d\\d)\\d{7}", [6, 7, 8, 10], [["(\\d{2})(\\d{4,6})", "$1 $2", ["2[1-4]|[34]"], "(0$1)"], ["(\\d)(\\d{6,7})", "$1 $2", ["7"], "(0$1)"], ["(\\d)(\\d{7})", "$1 $2", ["[56]"], "0$1"], ["(\\d{3})(\\d{7})", "$1 $2", ["8"], "0$1"]], "0"], CV: ["238", "0", "(?:[2-59]\\d\\d|800)\\d{4}", [7], [["(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3", ["[2-589]"]]]], CW: ["599", "00", "(?:[34]1|60|(?:7|9\\d)\\d)\\d{5}", [7, 8], [["(\\d{3})(\\d{4})", "$1 $2", ["[3467]"]], ["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["9[4-8]"]]], 0, 0, 0, 0, 0, "[69]"], CX: ["61", "001[14-689]|14(?:1[14]|34|4[17]|[56]6|7[47]|88)0011", "1(?:[0-79]\\d{8}(?:\\d{2})?|8[0-24-9]\\d{7})|[148]\\d{8}|1\\d{5,7}", [6, 7, 8, 9, 10, 12], 0, "0", 0, "([59]\\d{7})$|0", "8$1", 0, 0, [["8(?:51(?:0(?:01|30|59|88)|1(?:17|46|75)|2(?:22|35))|91(?:00[6-9]|1(?:[28]1|49|78)|2(?:09|63)|3(?:12|26|75)|4(?:56|97)|64\\d|7(?:0[01]|1[0-2])|958))\\d{3}", [9]], ["4(?:(?:79|94)[01]|83[0-389])\\d{5}|4(?:[0-3]\\d|4[047-9]|5[0-25-9]|6[0-26-9]|7[02-8]|8[0-24-9]|9[0-37-9])\\d{6}", [9]], ["180(?:0\\d{3}|2)\\d{3}", [7, 10]], ["190[0-26]\\d{6}", [10]], 0, 0, 0, 0, ["14(?:5(?:1[0458]|[23][458])|71\\d)\\d{4}", [9]], ["13(?:00\\d{6}(?:\\d{2})?|45[0-4]\\d{3})|13\\d{4}", [6, 8, 10, 12]]], "0011"], CY: ["357", "00", "(?:[279]\\d|[58]0)\\d{6}", [8], [["(\\d{2})(\\d{6})", "$1 $2", ["[257-9]"]]]], CZ: ["420", "00", "(?:[2-578]\\d|60)\\d{7}|9\\d{8,11}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[2-8]|9[015-7]"]], ["(\\d{2})(\\d{3})(\\d{3})(\\d{2})", "$1 $2 $3 $4", ["96"]], ["(\\d{2})(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["9"]], ["(\\d{3})(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["9"]]]], DE: ["49", "00", "[2579]\\d{5,14}|49(?:[34]0|69|8\\d)\\d\\d?|49(?:37|49|60|7[089]|9\\d)\\d{1,3}|49(?:2[024-9]|3[2-689]|7[1-7])\\d{1,8}|(?:1|[368]\\d|4[0-8])\\d{3,13}|49(?:[015]\\d|2[13]|31|[46][1-8])\\d{1,9}", [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15], [["(\\d{2})(\\d{3,13})", "$1 $2", ["3[02]|40|[68]9"], "0$1"], ["(\\d{3})(\\d{3,12})", "$1 $2", ["2(?:0[1-389]|1[124]|2[18]|3[14])|3(?:[35-9][15]|4[015])|906|(?:2[4-9]|4[2-9]|[579][1-9]|[68][1-8])1", "2(?:0[1-389]|12[0-8])|3(?:[35-9][15]|4[015])|906|2(?:[13][14]|2[18])|(?:2[4-9]|4[2-9]|[579][1-9]|[68][1-8])1"], "0$1"], ["(\\d{4})(\\d{2,11})", "$1 $2", ["[24-6]|3(?:[3569][02-46-9]|4[2-4679]|7[2-467]|8[2-46-8])|70[2-8]|8(?:0[2-9]|[1-8])|90[7-9]|[79][1-9]", "[24-6]|3(?:3(?:0[1-467]|2[127-9]|3[124578]|7[1257-9]|8[1256]|9[145])|4(?:2[135]|4[13578]|9[1346])|5(?:0[14]|2[1-3589]|6[1-4]|7[13468]|8[13568])|6(?:2[1-489]|3[124-6]|6[13]|7[12579]|8[1-356]|9[135])|7(?:2[1-7]|4[145]|6[1-5]|7[1-4])|8(?:21|3[1468]|6|7[1467]|8[136])|9(?:0[12479]|2[1358]|4[134679]|6[1-9]|7[136]|8[147]|9[1468]))|70[2-8]|8(?:0[2-9]|[1-8])|90[7-9]|[79][1-9]|3[68]4[1347]|3(?:47|60)[1356]|3(?:3[46]|46|5[49])[1246]|3[4579]3[1357]"], "0$1"], ["(\\d{3})(\\d{4})", "$1 $2", ["138"], "0$1"], ["(\\d{5})(\\d{2,10})", "$1 $2", ["3"], "0$1"], ["(\\d{3})(\\d{5,11})", "$1 $2", ["181"], "0$1"], ["(\\d{3})(\\d)(\\d{4,10})", "$1 $2 $3", ["1(?:3|80)|9"], "0$1"], ["(\\d{3})(\\d{7,8})", "$1 $2", ["1[67]"], "0$1"], ["(\\d{3})(\\d{7,12})", "$1 $2", ["8"], "0$1"], ["(\\d{5})(\\d{6})", "$1 $2", ["185", "1850", "18500"], "0$1"], ["(\\d{3})(\\d{4})(\\d{4})", "$1 $2 $3", ["7"], "0$1"], ["(\\d{4})(\\d{7})", "$1 $2", ["18[68]"], "0$1"], ["(\\d{4})(\\d{7})", "$1 $2", ["15[1279]"], "0$1"], ["(\\d{5})(\\d{6})", "$1 $2", ["15[03568]", "15(?:[0568]|31)"], "0$1"], ["(\\d{3})(\\d{8})", "$1 $2", ["18"], "0$1"], ["(\\d{3})(\\d{2})(\\d{7,8})", "$1 $2 $3", ["1(?:6[023]|7)"], "0$1"], ["(\\d{4})(\\d{2})(\\d{7})", "$1 $2 $3", ["15[279]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{8})", "$1 $2 $3", ["15"], "0$1"]], "0"], DJ: ["253", "00", "(?:2\\d|77)\\d{6}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[27]"]]]], DK: ["45", "00", "[2-9]\\d{7}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2-9]"]]]], DM: ["1", "011", "(?:[58]\\d\\d|767|900)\\d{7}", [10], 0, "1", 0, "([2-7]\\d{6})$|1", "767$1", 0, "767"], DO: ["1", "011", "(?:[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, 0, 0, 0, "8001|8[024]9"], DZ: ["213", "00", "(?:[1-4]|[5-79]\\d|80)\\d{7}", [8, 9], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[1-4]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["9"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[5-8]"], "0$1"]], "0"], EC: ["593", "00", "1\\d{9,10}|(?:[2-7]|9\\d)\\d{7}", [8, 9, 10, 11], [["(\\d)(\\d{3})(\\d{4})", "$1 $2-$3", ["[2-7]"], "(0$1)", 0, "$1-$2-$3"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["9"], "0$1"], ["(\\d{4})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["1"]]], "0"], EE: ["372", "00", "8\\d{9}|[4578]\\d{7}|(?:[3-8]\\d|90)\\d{5}", [7, 8, 10], [["(\\d{3})(\\d{4})", "$1 $2", ["[369]|4[3-8]|5(?:[0-2]|5[0-478]|6[45])|7[1-9]|88", "[369]|4[3-8]|5(?:[02]|1(?:[0-8]|95)|5[0-478]|6(?:4[0-4]|5[1-589]))|7[1-9]|88"]], ["(\\d{4})(\\d{3,4})", "$1 $2", ["[45]|8(?:00|[1-49])", "[45]|8(?:00[1-9]|[1-49])"]], ["(\\d{2})(\\d{2})(\\d{4})", "$1 $2 $3", ["7"]], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["8"]]]], EG: ["20", "00", "[189]\\d{8,9}|[24-6]\\d{8}|[135]\\d{7}", [8, 9, 10], [["(\\d)(\\d{7,8})", "$1 $2", ["[23]"], "0$1"], ["(\\d{2})(\\d{6,7})", "$1 $2", ["1[35]|[4-6]|8[2468]|9[235-7]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["[89]"], "0$1"], ["(\\d{2})(\\d{8})", "$1 $2", ["1"], "0$1"]], "0"], EH: ["212", "00", "[5-8]\\d{8}", [9], 0, "0", 0, 0, 0, 0, "528[89]"], ER: ["291", "00", "[178]\\d{6}", [7], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["[178]"], "0$1"]], "0"], ES: ["34", "00", "[5-9]\\d{8}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[89]00"]], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[5-9]"]]]], ET: ["251", "00", "(?:11|[2-579]\\d)\\d{7}", [9], [["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[1-579]"], "0$1"]], "0"], FI: ["358", "00|99(?:[01469]|5(?:[14]1|3[23]|5[59]|77|88|9[09]))", "[1-35689]\\d{4}|7\\d{10,11}|(?:[124-7]\\d|3[0-46-9])\\d{8}|[1-9]\\d{5,8}", [5, 6, 7, 8, 9, 10, 11, 12], [["(\\d{5})", "$1", ["20[2-59]"], "0$1"], ["(\\d{3})(\\d{3,7})", "$1 $2", ["(?:[1-3]0|[68])0|70[07-9]"], "0$1"], ["(\\d{2})(\\d{4,8})", "$1 $2", ["[14]|2[09]|50|7[135]"], "0$1"], ["(\\d{2})(\\d{6,10})", "$1 $2", ["7"], "0$1"], ["(\\d)(\\d{4,9})", "$1 $2", ["(?:1[3-79]|[2568])[1-8]|3(?:0[1-9]|[1-9])|9"], "0$1"]], "0", 0, 0, 0, 0, "1[03-79]|[2-9]", 0, "00"], FJ: ["679", "0(?:0|52)", "45\\d{5}|(?:0800\\d|[235-9])\\d{6}", [7, 11], [["(\\d{3})(\\d{4})", "$1 $2", ["[235-9]|45"]], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["0"]]], 0, 0, 0, 0, 0, 0, 0, "00"], FK: ["500", "00", "[2-7]\\d{4}", [5]], FM: ["691", "00", "(?:[39]\\d\\d|820)\\d{4}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[389]"]]]], FO: ["298", "00", "[2-9]\\d{5}", [6], [["(\\d{6})", "$1", ["[2-9]"]]], 0, 0, "(10(?:01|[12]0|88))"], FR: ["33", "00", "[1-9]\\d{8}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"], "0 $1"], ["(\\d)(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4 $5", ["[1-79]"], "0$1"]], "0"], GA: ["241", "00", "(?:[067]\\d|11)\\d{6}|[2-7]\\d{6}", [7, 8], [["(\\d)(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2-7]"], "0$1"], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["0"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["11|[67]"], "0$1"]], 0, 0, "0(11\\d{6}|60\\d{6}|61\\d{6}|6[256]\\d{6}|7[467]\\d{6})", "$1"], GB: ["44", "00", "[1-357-9]\\d{9}|[18]\\d{8}|8\\d{6}", [7, 9, 10], [["(\\d{3})(\\d{4})", "$1 $2", ["800", "8001", "80011", "800111", "8001111"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3", ["845", "8454", "84546", "845464"], "0$1"], ["(\\d{3})(\\d{6})", "$1 $2", ["800"], "0$1"], ["(\\d{5})(\\d{4,5})", "$1 $2", ["1(?:38|5[23]|69|76|94)", "1(?:(?:38|69)7|5(?:24|39)|768|946)", "1(?:3873|5(?:242|39[4-6])|(?:697|768)[347]|9467)"], "0$1"], ["(\\d{4})(\\d{5,6})", "$1 $2", ["1(?:[2-69][02-9]|[78])"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["[25]|7(?:0|6[02-9])", "[25]|7(?:0|6(?:[03-9]|2[356]))"], "0$1"], ["(\\d{4})(\\d{6})", "$1 $2", ["7"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["[1389]"], "0$1"]], "0", 0, 0, 0, 0, 0, [["(?:1(?:1(?:3(?:[0-58]\\d\\d|73[0235])|4(?:[0-5]\\d\\d|69[7-9]|70[0-79])|(?:(?:5[0-26-9]|[78][0-49])\\d|6(?:[0-4]\\d|50))\\d)|(?:2(?:(?:0[024-9]|2[3-9]|3[3-79]|4[1-689]|[58][02-9]|6[0-47-9]|7[013-9]|9\\d)\\d|1(?:[0-7]\\d|8[0-2]))|(?:3(?:0\\d|1[0-8]|[25][02-9]|3[02-579]|[468][0-46-9]|7[1-35-79]|9[2-578])|4(?:0[03-9]|[137]\\d|[28][02-57-9]|4[02-69]|5[0-8]|[69][0-79])|5(?:0[1-35-9]|[16]\\d|2[024-9]|3[015689]|4[02-9]|5[03-9]|7[0-35-9]|8[0-468]|9[0-57-9])|6(?:0[034689]|1\\d|2[0-35689]|[38][013-9]|4[1-467]|5[0-69]|6[13-9]|7[0-8]|9[0-24578])|7(?:0[0246-9]|2\\d|3[0236-8]|4[03-9]|5[0-46-9]|6[013-9]|7[0-35-9]|8[024-9]|9[02-9])|8(?:0[35-9]|2[1-57-9]|3[02-578]|4[0-578]|5[124-9]|6[2-69]|7\\d|8[02-9]|9[02569])|9(?:0[02-589]|[18]\\d|2[02-689]|3[1-57-9]|4[2-9]|5[0-579]|6[2-47-9]|7[0-24578]|9[2-57]))\\d)\\d)|2(?:0[013478]|3[0189]|4[017]|8[0-46-9]|9[0-2])\\d{3})\\d{4}|1(?:2(?:0(?:46[1-4]|87[2-9])|545[1-79]|76(?:2\\d|3[1-8]|6[1-6])|9(?:7(?:2[0-4]|3[2-5])|8(?:2[2-8]|7[0-47-9]|8[3-5])))|3(?:6(?:38[2-5]|47[23])|8(?:47[04-9]|64[0157-9]))|4(?:044[1-7]|20(?:2[23]|8\\d)|6(?:0(?:30|5[2-57]|6[1-8]|7[2-8])|140)|8(?:052|87[1-3]))|5(?:2(?:4(?:3[2-79]|6\\d)|76\\d)|6(?:26[06-9]|686))|6(?:06(?:4\\d|7[4-79])|295[5-7]|35[34]\\d|47(?:24|61)|59(?:5[08]|6[67]|74)|9(?:55[0-4]|77[23]))|7(?:26(?:6[13-9]|7[0-7])|(?:442|688)\\d|50(?:2[0-3]|[3-68]2|76))|8(?:27[56]\\d|37(?:5[2-5]|8[239])|843[2-58])|9(?:0(?:0(?:6[1-8]|85)|52\\d)|3583|4(?:66[1-8]|9(?:2[01]|81))|63(?:23|3[1-4])|9561))\\d{3}", [9, 10]], ["7(?:457[0-57-9]|700[01]|911[028])\\d{5}|7(?:[1-3]\\d\\d|4(?:[0-46-9]\\d|5[0-689])|5(?:0[0-8]|[13-9]\\d|2[0-35-9])|7(?:0[1-9]|[1-7]\\d|8[02-9]|9[0-689])|8(?:[014-9]\\d|[23][0-8])|9(?:[024-9]\\d|1[02-9]|3[0-689]))\\d{6}", [10]], ["80[08]\\d{7}|800\\d{6}|8001111"], ["(?:8(?:4[2-5]|7[0-3])|9(?:[01]\\d|8[2-49]))\\d{7}|845464\\d", [7, 10]], ["70\\d{8}", [10]], 0, ["(?:3[0347]|55)\\d{8}", [10]], ["76(?:464|652)\\d{5}|76(?:0[0-28]|2[356]|34|4[01347]|5[49]|6[0-369]|77|8[14]|9[139])\\d{6}", [10]], ["56\\d{8}", [10]]], 0, " x"], GD: ["1", "011", "(?:473|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "473$1", 0, "473"], GE: ["995", "00", "(?:[3-57]\\d\\d|800)\\d{6}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["70"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["32"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[57]"]], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[348]"], "0$1"]], "0"], GF: ["594", "00", "[56]94\\d{6}|(?:80|9\\d)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[56]|9[47]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[89]"], "0$1"]], "0"], GG: ["44", "00", "(?:1481|[357-9]\\d{3})\\d{6}|8\\d{6}(?:\\d{2})?", [7, 9, 10], 0, "0", 0, "([25-9]\\d{5})$|0", "1481$1", 0, 0, [["1481[25-9]\\d{5}", [10]], ["7(?:(?:781|839)\\d|911[17])\\d{5}", [10]], ["80[08]\\d{7}|800\\d{6}|8001111"], ["(?:8(?:4[2-5]|7[0-3])|9(?:[01]\\d|8[0-3]))\\d{7}|845464\\d", [7, 10]], ["70\\d{8}", [10]], 0, ["(?:3[0347]|55)\\d{8}", [10]], ["76(?:464|652)\\d{5}|76(?:0[0-28]|2[356]|34|4[01347]|5[49]|6[0-369]|77|8[14]|9[139])\\d{6}", [10]], ["56\\d{8}", [10]]]], GH: ["233", "00", "(?:[235]\\d{3}|800)\\d{5}", [8, 9], [["(\\d{3})(\\d{5})", "$1 $2", ["8"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[235]"], "0$1"]], "0"], GI: ["350", "00", "(?:[25]\\d|60)\\d{6}", [8], [["(\\d{3})(\\d{5})", "$1 $2", ["2"]]]], GL: ["299", "00", "(?:19|[2-689]\\d|70)\\d{4}", [6], [["(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3", ["19|[2-9]"]]]], GM: ["220", "00", "[2-9]\\d{6}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[2-9]"]]]], GN: ["224", "00", "722\\d{6}|(?:3|6\\d)\\d{7}", [8, 9], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["3"]], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[67]"]]]], GP: ["590", "00", "590\\d{6}|(?:69|80|9\\d)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[569]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"], "0$1"]], "0", 0, 0, 0, 0, 0, [["590(?:0[1-68]|[14][0-24-9]|2[0-68]|3[1-9]|5[3-579]|[68][0-689]|7[08]|9\\d)\\d{4}"], ["69(?:0\\d\\d|1(?:2[2-9]|3[0-5]))\\d{4}"], ["80[0-5]\\d{6}"], 0, 0, 0, 0, 0, ["9(?:(?:395|76[018])\\d|475[0-5])\\d{4}"]]], GQ: ["240", "00", "222\\d{6}|(?:3\\d|55|[89]0)\\d{7}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[235]"]], ["(\\d{3})(\\d{6})", "$1 $2", ["[89]"]]]], GR: ["30", "00", "5005000\\d{3}|8\\d{9,11}|(?:[269]\\d|70)\\d{8}", [10, 11, 12], [["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["21|7"]], ["(\\d{4})(\\d{6})", "$1 $2", ["2(?:2|3[2-57-9]|4[2-469]|5[2-59]|6[2-9]|7[2-69]|8[2-49])|5"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["[2689]"]], ["(\\d{3})(\\d{3,4})(\\d{5})", "$1 $2 $3", ["8"]]]], GT: ["502", "00", "80\\d{6}|(?:1\\d{3}|[2-7])\\d{7}", [8, 11], [["(\\d{4})(\\d{4})", "$1 $2", ["[2-8]"]], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"]]]], GU: ["1", "011", "(?:[58]\\d\\d|671|900)\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "671$1", 0, "671"], GW: ["245", "00", "[49]\\d{8}|4\\d{6}", [7, 9], [["(\\d{3})(\\d{4})", "$1 $2", ["40"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[49]"]]]], GY: ["592", "001", "(?:[2-8]\\d{3}|9008)\\d{3}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[2-9]"]]]], HK: ["852", "00(?:30|5[09]|[126-9]?)", "8[0-46-9]\\d{6,7}|9\\d{4,7}|(?:[2-7]|9\\d{3})\\d{7}", [5, 6, 7, 8, 9, 11], [["(\\d{3})(\\d{2,5})", "$1 $2", ["900", "9003"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[2-7]|8[1-4]|9(?:0[1-9]|[1-8])"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["8"]], ["(\\d{3})(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["9"]]], 0, 0, 0, 0, 0, 0, 0, "00"], HN: ["504", "00", "8\\d{10}|[237-9]\\d{7}", [8, 11], [["(\\d{4})(\\d{4})", "$1-$2", ["[237-9]"]]]], HR: ["385", "00", "(?:[24-69]\\d|3[0-79])\\d{7}|80\\d{5,7}|[1-79]\\d{7}|6\\d{5,6}", [6, 7, 8, 9], [["(\\d{2})(\\d{2})(\\d{2,3})", "$1 $2 $3", ["6[01]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2,3})", "$1 $2 $3", ["8"], "0$1"], ["(\\d)(\\d{4})(\\d{3})", "$1 $2 $3", ["1"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[67]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["9"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[2-5]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["8"], "0$1"]], "0"], HT: ["509", "00", "(?:[2-489]\\d|55)\\d{6}", [8], [["(\\d{2})(\\d{2})(\\d{4})", "$1 $2 $3", ["[2-589]"]]]], HU: ["36", "00", "[235-7]\\d{8}|[1-9]\\d{7}", [8, 9], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["1"], "(06 $1)"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[27][2-9]|3[2-7]|4[24-9]|5[2-79]|6|8[2-57-9]|9[2-69]"], "(06 $1)"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[2-9]"], "06 $1"]], "06"], ID: ["62", "00[89]", "(?:(?:00[1-9]|8\\d)\\d{4}|[1-36])\\d{6}|00\\d{10}|[1-9]\\d{8,10}|[2-9]\\d{7}", [7, 8, 9, 10, 11, 12, 13], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["15"]], ["(\\d{2})(\\d{5,9})", "$1 $2", ["2[124]|[36]1"], "(0$1)"], ["(\\d{3})(\\d{5,7})", "$1 $2", ["800"], "0$1"], ["(\\d{3})(\\d{5,8})", "$1 $2", ["[2-79]"], "(0$1)"], ["(\\d{3})(\\d{3,4})(\\d{3})", "$1-$2-$3", ["8[1-35-9]"], "0$1"], ["(\\d{3})(\\d{6,8})", "$1 $2", ["1"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["804"], "0$1"], ["(\\d{3})(\\d)(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["80"], "0$1"], ["(\\d{3})(\\d{4})(\\d{4,5})", "$1-$2-$3", ["8"], "0$1"]], "0"], IE: ["353", "00", "(?:1\\d|[2569])\\d{6,8}|4\\d{6,9}|7\\d{8}|8\\d{8,9}", [7, 8, 9, 10], [["(\\d{2})(\\d{5})", "$1 $2", ["2[24-9]|47|58|6[237-9]|9[35-9]"], "(0$1)"], ["(\\d{3})(\\d{5})", "$1 $2", ["[45]0"], "(0$1)"], ["(\\d)(\\d{3,4})(\\d{4})", "$1 $2 $3", ["1"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[2569]|4[1-69]|7[14]"], "(0$1)"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["70"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["81"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[78]"], "0$1"], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["1"]], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["4"], "(0$1)"], ["(\\d{2})(\\d)(\\d{3})(\\d{4})", "$1 $2 $3 $4", ["8"], "0$1"]], "0"], IL: ["972", "0(?:0|1[2-9])", "1\\d{6}(?:\\d{3,5})?|[57]\\d{8}|[1-489]\\d{7}", [7, 8, 9, 10, 11, 12], [["(\\d{4})(\\d{3})", "$1-$2", ["125"]], ["(\\d{4})(\\d{2})(\\d{2})", "$1-$2-$3", ["121"]], ["(\\d)(\\d{3})(\\d{4})", "$1-$2-$3", ["[2-489]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1-$2-$3", ["[57]"], "0$1"], ["(\\d{4})(\\d{3})(\\d{3})", "$1-$2-$3", ["12"]], ["(\\d{4})(\\d{6})", "$1-$2", ["159"]], ["(\\d)(\\d{3})(\\d{3})(\\d{3})", "$1-$2-$3-$4", ["1[7-9]"]], ["(\\d{3})(\\d{1,2})(\\d{3})(\\d{4})", "$1-$2 $3-$4", ["15"]]], "0"], IM: ["44", "00", "1624\\d{6}|(?:[3578]\\d|90)\\d{8}", [10], 0, "0", 0, "([25-8]\\d{5})$|0", "1624$1", 0, "74576|(?:16|7[56])24"], IN: ["91", "00", "(?:000800|[2-9]\\d\\d)\\d{7}|1\\d{7,12}", [8, 9, 10, 11, 12, 13], [["(\\d{8})", "$1", ["5(?:0|2[23]|3[03]|[67]1|88)", "5(?:0|2(?:21|3)|3(?:0|3[23])|616|717|888)", "5(?:0|2(?:21|3)|3(?:0|3[23])|616|717|8888)"], 0, 1], ["(\\d{4})(\\d{4,5})", "$1 $2", ["180", "1800"], 0, 1], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["140"], 0, 1], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["11|2[02]|33|4[04]|79[1-7]|80[2-46]", "11|2[02]|33|4[04]|79(?:[1-6]|7[19])|80(?:[2-4]|6[0-589])", "11|2[02]|33|4[04]|79(?:[124-6]|3(?:[02-9]|1[0-24-9])|7(?:1|9[1-6]))|80(?:[2-4]|6[0-589])"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["1(?:2[0-249]|3[0-25]|4[145]|[68]|7[1257])|2(?:1[257]|3[013]|4[01]|5[0137]|6[0158]|78|8[1568])|3(?:26|4[1-3]|5[34]|6[01489]|7[02-46]|8[159])|4(?:1[36]|2[1-47]|5[12]|6[0-26-9]|7[0-24-9]|8[013-57]|9[014-7])|5(?:1[025]|22|[36][25]|4[28]|5[12]|[78]1)|6(?:12|[2-4]1|5[17]|6[13]|80)|7(?:12|3[134]|4[47]|61|88)|8(?:16|2[014]|3[126]|6[136]|7[078]|8[34]|91)|(?:43|59|75)[15]|(?:1[59]|29|67|72)[14]", "1(?:2[0-24]|3[0-25]|4[145]|[59][14]|6[1-9]|7[1257]|8[1-57-9])|2(?:1[257]|3[013]|4[01]|5[0137]|6[058]|78|8[1568]|9[14])|3(?:26|4[1-3]|5[34]|6[01489]|7[02-46]|8[159])|4(?:1[36]|2[1-47]|3[15]|5[12]|6[0-26-9]|7[0-24-9]|8[013-57]|9[014-7])|5(?:1[025]|22|[36][25]|4[28]|[578]1|9[15])|674|7(?:(?:2[14]|3[34]|5[15])[2-6]|61[346]|88[0-8])|8(?:70[2-6]|84[235-7]|91[3-7])|(?:1(?:29|60|8[06])|261|552|6(?:12|[2-47]1|5[17]|6[13]|80)|7(?:12|31|4[47])|8(?:16|2[014]|3[126]|6[136]|7[78]|83))[2-7]", "1(?:2[0-24]|3[0-25]|4[145]|[59][14]|6[1-9]|7[1257]|8[1-57-9])|2(?:1[257]|3[013]|4[01]|5[0137]|6[058]|78|8[1568]|9[14])|3(?:26|4[1-3]|5[34]|6[01489]|7[02-46]|8[159])|4(?:1[36]|2[1-47]|3[15]|5[12]|6[0-26-9]|7[0-24-9]|8[013-57]|9[014-7])|5(?:1[025]|22|[36][25]|4[28]|[578]1|9[15])|6(?:12(?:[2-6]|7[0-8])|74[2-7])|7(?:(?:2[14]|5[15])[2-6]|3171|61[346]|88(?:[2-7]|82))|8(?:70[2-6]|84(?:[2356]|7[19])|91(?:[3-6]|7[19]))|73[134][2-6]|(?:74[47]|8(?:16|2[014]|3[126]|6[136]|7[78]|83))(?:[2-6]|7[19])|(?:1(?:29|60|8[06])|261|552|6(?:[2-4]1|5[17]|6[13]|7(?:1|4[0189])|80)|7(?:12|88[01]))[2-7]"], "0$1", 1], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["1(?:[2-479]|5[0235-9])|[2-5]|6(?:1[1358]|2[2457-9]|3[2-5]|4[235-7]|5[2-689]|6[24578]|7[235689]|8[1-6])|7(?:1[013-9]|28|3[129]|4[1-35689]|5[29]|6[02-5]|70)|807", "1(?:[2-479]|5[0235-9])|[2-5]|6(?:1[1358]|2(?:[2457]|84|95)|3(?:[2-4]|55)|4[235-7]|5[2-689]|6[24578]|7[235689]|8[1-6])|7(?:1(?:[013-8]|9[6-9])|28[6-8]|3(?:17|2[0-49]|9[2-57])|4(?:1[2-4]|[29][0-7]|3[0-8]|[56]|8[0-24-7])|5(?:2[1-3]|9[0-6])|6(?:0[5689]|2[5-9]|3[02-8]|4|5[0-367])|70[13-7])|807[19]", "1(?:[2-479]|5(?:[0236-9]|5[013-9]))|[2-5]|6(?:2(?:84|95)|355|83)|73179|807(?:1|9[1-3])|(?:1552|6(?:1[1358]|2[2457]|3[2-4]|4[235-7]|5[2-689]|6[24578]|7[235689]|8[124-6])\\d|7(?:1(?:[013-8]\\d|9[6-9])|28[6-8]|3(?:2[0-49]|9[2-57])|4(?:1[2-4]|[29][0-7]|3[0-8]|[56]\\d|8[0-24-7])|5(?:2[1-3]|9[0-6])|6(?:0[5689]|2[5-9]|3[02-8]|4\\d|5[0-367])|70[13-7]))[2-7]"], "0$1", 1], ["(\\d{5})(\\d{5})", "$1 $2", ["[6-9]"], "0$1", 1], ["(\\d{4})(\\d{2,4})(\\d{4})", "$1 $2 $3", ["1(?:6|8[06])", "1(?:6|8[06]0)"], 0, 1], ["(\\d{4})(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["18"], 0, 1]], "0"], IO: ["246", "00", "3\\d{6}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["3"]]]], IQ: ["964", "00", "(?:1|7\\d\\d)\\d{7}|[2-6]\\d{7,8}", [8, 9, 10], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["1"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[2-6]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["7"], "0$1"]], "0"], IR: ["98", "00", "[1-9]\\d{9}|(?:[1-8]\\d\\d|9)\\d{3,4}", [4, 5, 6, 7, 10], [["(\\d{4,5})", "$1", ["96"], "0$1"], ["(\\d{2})(\\d{4,5})", "$1 $2", ["(?:1[137]|2[13-68]|3[1458]|4[145]|5[1468]|6[16]|7[1467]|8[13467])[12689]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["9"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["[1-8]"], "0$1"]], "0"], IS: ["354", "00|1(?:0(?:01|[12]0)|100)", "(?:38\\d|[4-9])\\d{6}", [7, 9], [["(\\d{3})(\\d{4})", "$1 $2", ["[4-9]"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["3"]]], 0, 0, 0, 0, 0, 0, 0, "00"], IT: ["39", "00", "0\\d{5,10}|1\\d{8,10}|3(?:[0-8]\\d{7,10}|9\\d{7,8})|(?:55|70)\\d{8}|8\\d{5}(?:\\d{2,4})?", [6, 7, 8, 9, 10, 11], [["(\\d{2})(\\d{4,6})", "$1 $2", ["0[26]"]], ["(\\d{3})(\\d{3,6})", "$1 $2", ["0[13-57-9][0159]|8(?:03|4[17]|9[2-5])", "0[13-57-9][0159]|8(?:03|4[17]|9(?:2|3[04]|[45][0-4]))"]], ["(\\d{4})(\\d{2,6})", "$1 $2", ["0(?:[13-579][2-46-8]|8[236-8])"]], ["(\\d{4})(\\d{4})", "$1 $2", ["894"]], ["(\\d{2})(\\d{3,4})(\\d{4})", "$1 $2 $3", ["0[26]|5"]], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["1(?:44|[679])|[378]"]], ["(\\d{3})(\\d{3,4})(\\d{4})", "$1 $2 $3", ["0[13-57-9][0159]|14"]], ["(\\d{2})(\\d{4})(\\d{5})", "$1 $2 $3", ["0[26]"]], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["0"]], ["(\\d{3})(\\d{4})(\\d{4,5})", "$1 $2 $3", ["3"]]], 0, 0, 0, 0, 0, 0, [["0669[0-79]\\d{1,6}|0(?:1(?:[0159]\\d|[27][1-5]|31|4[1-4]|6[1356]|8[2-57])|2\\d\\d|3(?:[0159]\\d|2[1-4]|3[12]|[48][1-6]|6[2-59]|7[1-7])|4(?:[0159]\\d|[23][1-9]|4[245]|6[1-5]|7[1-4]|81)|5(?:[0159]\\d|2[1-5]|3[2-6]|4[1-79]|6[4-6]|7[1-578]|8[3-8])|6(?:[0-57-9]\\d|6[0-8])|7(?:[0159]\\d|2[12]|3[1-7]|4[2-46]|6[13569]|7[13-6]|8[1-59])|8(?:[0159]\\d|2[3-578]|3[1-356]|[6-8][1-5])|9(?:[0159]\\d|[238][1-5]|4[12]|6[1-8]|7[1-6]))\\d{2,7}"], ["3[1-9]\\d{8}|3[2-9]\\d{7}", [9, 10]], ["80(?:0\\d{3}|3)\\d{3}", [6, 9]], ["(?:0878\\d{3}|89(?:2\\d|3[04]|4(?:[0-4]|[5-9]\\d\\d)|5[0-4]))\\d\\d|(?:1(?:44|6[346])|89(?:38|5[5-9]|9))\\d{6}", [6, 8, 9, 10]], ["1(?:78\\d|99)\\d{6}", [9, 10]], 0, 0, 0, ["55\\d{8}", [10]], ["84(?:[08]\\d{3}|[17])\\d{3}", [6, 9]]]], JE: ["44", "00", "1534\\d{6}|(?:[3578]\\d|90)\\d{8}", [10], 0, "0", 0, "([0-24-8]\\d{5})$|0", "1534$1", 0, 0, [["1534[0-24-8]\\d{5}"], ["7(?:(?:(?:50|82)9|937)\\d|7(?:00[378]|97[7-9]))\\d{5}"], ["80(?:07(?:35|81)|8901)\\d{4}"], ["(?:8(?:4(?:4(?:4(?:05|42|69)|703)|5(?:041|800))|7(?:0002|1206))|90(?:066[59]|1810|71(?:07|55)))\\d{4}"], ["701511\\d{4}"], 0, ["(?:3(?:0(?:07(?:35|81)|8901)|3\\d{4}|4(?:4(?:4(?:05|42|69)|703)|5(?:041|800))|7(?:0002|1206))|55\\d{4})\\d{4}"], ["76(?:464|652)\\d{5}|76(?:0[0-28]|2[356]|34|4[01347]|5[49]|6[0-369]|77|8[14]|9[139])\\d{6}"], ["56\\d{8}"]]], JM: ["1", "011", "(?:[58]\\d\\d|658|900)\\d{7}", [10], 0, "1", 0, 0, 0, 0, "658|876"], JO: ["962", "00", "(?:(?:[2689]|7\\d)\\d|32|53)\\d{6}", [8, 9], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["[2356]|87"], "(0$1)"], ["(\\d{3})(\\d{5,6})", "$1 $2", ["[89]"], "0$1"], ["(\\d{2})(\\d{7})", "$1 $2", ["70"], "0$1"], ["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["7"], "0$1"]], "0"], JP: ["81", "010", "00[1-9]\\d{6,14}|[257-9]\\d{9}|(?:00|[1-9]\\d\\d)\\d{6}", [8, 9, 10, 11, 12, 13, 14, 15, 16, 17], [["(\\d{3})(\\d{3})(\\d{3})", "$1-$2-$3", ["(?:12|57|99)0"], "0$1"], ["(\\d{4})(\\d)(\\d{4})", "$1-$2-$3", ["1(?:26|3[79]|4[56]|5[4-68]|6[3-5])|499|5(?:76|97)|746|8(?:3[89]|47|51)|9(?:80|9[16])", "1(?:267|3(?:7[247]|9[278])|466|5(?:47|58|64)|6(?:3[245]|48|5[4-68]))|499[2468]|5(?:76|97)9|7468|8(?:3(?:8[7-9]|96)|477|51[2-9])|9(?:802|9(?:1[23]|69))|1(?:45|58)[67]", "1(?:267|3(?:7[247]|9[278])|466|5(?:47|58|64)|6(?:3[245]|48|5[4-68]))|499[2468]|5(?:769|979[2-69])|7468|8(?:3(?:8[7-9]|96[2457-9])|477|51[2-9])|9(?:802|9(?:1[23]|69))|1(?:45|58)[67]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1-$2-$3", ["60"], "0$1"], ["(\\d)(\\d{4})(\\d{4})", "$1-$2-$3", ["[36]|4(?:2[09]|7[01])", "[36]|4(?:2(?:0|9[02-69])|7(?:0[019]|1))"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1-$2-$3", ["1(?:1|5[45]|77|88|9[69])|2(?:2[1-37]|3[0-269]|4[59]|5|6[24]|7[1-358]|8[1369]|9[0-38])|4(?:[28][1-9]|3[0-57]|[45]|6[248]|7[2-579]|9[29])|5(?:2|3[0459]|4[0-369]|5[29]|8[02389]|9[0-389])|7(?:2[02-46-9]|34|[58]|6[0249]|7[57]|9[2-6])|8(?:2[124589]|3[26-9]|49|51|6|7[0-468]|8[68]|9[019])|9(?:[23][1-9]|4[15]|5[138]|6[1-3]|7[156]|8[189]|9[1-489])", "1(?:1|5(?:4[018]|5[017])|77|88|9[69])|2(?:2(?:[127]|3[014-9])|3[0-269]|4[59]|5(?:[1-3]|5[0-69]|9[19])|62|7(?:[1-35]|8[0189])|8(?:[16]|3[0134]|9[0-5])|9(?:[028]|17))|4(?:2(?:[13-79]|8[014-6])|3[0-57]|[45]|6[248]|7[2-47]|8[1-9]|9[29])|5(?:2|3(?:[045]|9[0-8])|4[0-369]|5[29]|8[02389]|9[0-3])|7(?:2[02-46-9]|34|[58]|6[0249]|7[57]|9(?:[23]|4[0-59]|5[01569]|6[0167]))|8(?:2(?:[1258]|4[0-39]|9[0-2469])|3(?:[29]|60)|49|51|6(?:[0-24]|36|5[0-3589]|7[23]|9[01459])|7[0-468]|8[68])|9(?:[23][1-9]|4[15]|5[138]|6[1-3]|7[156]|8[189]|9(?:[1289]|3[34]|4[0178]))|(?:264|837)[016-9]|2(?:57|93)[015-9]|(?:25[0468]|422|838)[01]|(?:47[59]|59[89]|8(?:6[68]|9))[019]", "1(?:1|5(?:4[018]|5[017])|77|88|9[69])|2(?:2[127]|3[0-269]|4[59]|5(?:[1-3]|5[0-69]|9(?:17|99))|6(?:2|4[016-9])|7(?:[1-35]|8[0189])|8(?:[16]|3[0134]|9[0-5])|9(?:[028]|17))|4(?:2(?:[13-79]|8[014-6])|3[0-57]|[45]|6[248]|7[2-47]|9[29])|5(?:2|3(?:[045]|9(?:[0-58]|6[4-9]|7[0-35689]))|4[0-369]|5[29]|8[02389]|9[0-3])|7(?:2[02-46-9]|34|[58]|6[0249]|7[57]|9(?:[23]|4[0-59]|5[01569]|6[0167]))|8(?:2(?:[1258]|4[0-39]|9[0169])|3(?:[29]|60|7(?:[017-9]|6[6-8]))|49|51|6(?:[0-24]|36[2-57-9]|5(?:[0-389]|5[23])|6(?:[01]|9[178])|7(?:2[2-468]|3[78])|9[0145])|7[0-468]|8[68])|9(?:4[15]|5[138]|7[156]|8[189]|9(?:[1289]|3(?:31|4[357])|4[0178]))|(?:8294|96)[1-3]|2(?:57|93)[015-9]|(?:223|8699)[014-9]|(?:25[0468]|422|838)[01]|(?:48|8292|9[23])[1-9]|(?:47[59]|59[89]|8(?:68|9))[019]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{4})", "$1-$2-$3", ["[14]|[289][2-9]|5[3-9]|7[2-4679]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1-$2-$3", ["800"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4})", "$1-$2-$3", ["[257-9]"], "0$1"]], "0", 0, "(000[259]\\d{6})$|(?:(?:003768)0?)|0", "$1"], KE: ["254", "000", "(?:[17]\\d\\d|900)\\d{6}|(?:2|80)0\\d{6,7}|[4-6]\\d{6,8}", [7, 8, 9, 10], [["(\\d{2})(\\d{5,7})", "$1 $2", ["[24-6]"], "0$1"], ["(\\d{3})(\\d{6})", "$1 $2", ["[17]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[89]"], "0$1"]], "0"], KG: ["996", "00", "8\\d{9}|[235-9]\\d{8}", [9, 10], [["(\\d{4})(\\d{5})", "$1 $2", ["3(?:1[346]|[24-79])"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[235-79]|88"], "0$1"], ["(\\d{3})(\\d{3})(\\d)(\\d{2,3})", "$1 $2 $3 $4", ["8"], "0$1"]], "0"], KH: ["855", "00[14-9]", "1\\d{9}|[1-9]\\d{7,8}", [8, 9, 10], [["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[1-9]"], "0$1"], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["1"]]], "0"], KI: ["686", "00", "(?:[37]\\d|6[0-79])\\d{6}|(?:[2-48]\\d|50)\\d{3}", [5, 8], 0, "0"], KM: ["269", "00", "[3478]\\d{6}", [7], [["(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3", ["[3478]"]]]], KN: ["1", "011", "(?:[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-7]\\d{6})$|1", "869$1", 0, "869"], KP: ["850", "00|99", "85\\d{6}|(?:19\\d|[2-7])\\d{7}", [8, 10], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["8"], "0$1"], ["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["[2-7]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"], "0$1"]], "0"], KR: ["82", "00(?:[125689]|3(?:[46]5|91)|7(?:00|27|3|55|6[126]))", "00[1-9]\\d{8,11}|(?:[12]|5\\d{3})\\d{7}|[13-6]\\d{9}|(?:[1-6]\\d|80)\\d{7}|[3-6]\\d{4,5}|(?:00|7)0\\d{8}", [5, 6, 8, 9, 10, 11, 12, 13, 14], [["(\\d{2})(\\d{3,4})", "$1-$2", ["(?:3[1-3]|[46][1-4]|5[1-5])1"], "0$1"], ["(\\d{4})(\\d{4})", "$1-$2", ["1"]], ["(\\d)(\\d{3,4})(\\d{4})", "$1-$2-$3", ["2"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1-$2-$3", ["60|8"], "0$1"], ["(\\d{2})(\\d{3,4})(\\d{4})", "$1-$2-$3", ["[1346]|5[1-5]"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4})", "$1-$2-$3", ["[57]"], "0$1"], ["(\\d{2})(\\d{5})(\\d{4})", "$1-$2-$3", ["5"], "0$1"]], "0", 0, "0(8(?:[1-46-8]|5\\d\\d))?"], KW: ["965", "00", "18\\d{5}|(?:[2569]\\d|41)\\d{6}", [7, 8], [["(\\d{4})(\\d{3,4})", "$1 $2", ["[169]|2(?:[235]|4[1-35-9])|52"]], ["(\\d{3})(\\d{5})", "$1 $2", ["[245]"]]]], KY: ["1", "011", "(?:345|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "345$1", 0, "345"], KZ: ["7", "810", "(?:33622|8\\d{8})\\d{5}|[78]\\d{9}", [10, 14], 0, "8", 0, 0, 0, 0, "33|7", 0, "8~10"], LA: ["856", "00", "[23]\\d{9}|3\\d{8}|(?:[235-8]\\d|41)\\d{6}", [8, 9, 10], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["2[13]|3[14]|[4-8]"], "0$1"], ["(\\d{2})(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3 $4", ["30[013-9]"], "0$1"], ["(\\d{2})(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["[23]"], "0$1"]], "0"], LB: ["961", "00", "[27-9]\\d{7}|[13-9]\\d{6}", [7, 8], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["[13-69]|7(?:[2-57]|62|8[0-7]|9[04-9])|8[02-9]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[27-9]"]]], "0"], LC: ["1", "011", "(?:[58]\\d\\d|758|900)\\d{7}", [10], 0, "1", 0, "([2-8]\\d{6})$|1", "758$1", 0, "758"], LI: ["423", "00", "[68]\\d{8}|(?:[2378]\\d|90)\\d{5}", [7, 9], [["(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3", ["[2379]|8(?:0[09]|7)", "[2379]|8(?:0(?:02|9)|7)"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["8"]], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["69"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["6"]]], "0", 0, "(1001)|0"], LK: ["94", "00", "[1-9]\\d{8}", [9], [["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["7"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[1-689]"], "0$1"]], "0"], LR: ["231", "00", "(?:[25]\\d|33|77|88)\\d{7}|(?:2\\d|[4-6])\\d{6}", [7, 8, 9], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["[4-6]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["2"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[23578]"], "0$1"]], "0"], LS: ["266", "00", "(?:[256]\\d\\d|800)\\d{5}", [8], [["(\\d{4})(\\d{4})", "$1 $2", ["[2568]"]]]], LT: ["370", "00", "(?:[3469]\\d|52|[78]0)\\d{6}", [8], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["52[0-7]"], "(8-$1)", 1], ["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["[7-9]"], "8 $1", 1], ["(\\d{2})(\\d{6})", "$1 $2", ["37|4(?:[15]|6[1-8])"], "(8-$1)", 1], ["(\\d{3})(\\d{5})", "$1 $2", ["[3-6]"], "(8-$1)", 1]], "8", 0, "[08]"], LU: ["352", "00", "35[013-9]\\d{4,8}|6\\d{8}|35\\d{2,4}|(?:[2457-9]\\d|3[0-46-9])\\d{2,9}", [4, 5, 6, 7, 8, 9, 10, 11], [["(\\d{2})(\\d{3})", "$1 $2", ["2(?:0[2-689]|[2-9])|[3-57]|8(?:0[2-9]|[13-9])|9(?:0[89]|[2-579])"]], ["(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3", ["2(?:0[2-689]|[2-9])|[3-57]|8(?:0[2-9]|[13-9])|9(?:0[89]|[2-579])"]], ["(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3", ["20[2-689]"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{1,2})", "$1 $2 $3 $4", ["2(?:[0367]|4[3-8])"]], ["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["80[01]|90[015]"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3 $4", ["20"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["6"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})(\\d{1,2})", "$1 $2 $3 $4 $5", ["2(?:[0367]|4[3-8])"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{1,5})", "$1 $2 $3 $4", ["[3-57]|8[13-9]|9(?:0[89]|[2-579])|(?:2|80)[2-9]"]]], 0, 0, "(15(?:0[06]|1[12]|[35]5|4[04]|6[26]|77|88|99)\\d)"], LV: ["371", "00", "(?:[268]\\d|90)\\d{6}", [8], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[269]|8[01]"]]]], LY: ["218", "00", "[2-9]\\d{8}", [9], [["(\\d{2})(\\d{7})", "$1-$2", ["[2-9]"], "0$1"]], "0"], MA: ["212", "00", "[5-8]\\d{8}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["5[45]"], "0$1"], ["(\\d{4})(\\d{5})", "$1-$2", ["5(?:2[2-489]|3[5-9]|9)|8(?:0[89]|92)", "5(?:2(?:[2-49]|8[235-9])|3[5-9]|9)|8(?:0[89]|92)"], "0$1"], ["(\\d{2})(\\d{7})", "$1-$2", ["8"], "0$1"], ["(\\d{3})(\\d{6})", "$1-$2", ["[5-7]"], "0$1"]], "0", 0, 0, 0, 0, 0, [["5(?:2(?:[0-25-79]\\d|3[1-578]|4[02-46-8]|8[0235-7])|3(?:[0-47]\\d|5[02-9]|6[02-8]|8[014-9]|9[3-9])|(?:4[067]|5[03])\\d)\\d{5}"], ["(?:6(?:[0-79]\\d|8[0-247-9])|7(?:[0167]\\d|2[0-2]|5[01]|8[0-3]))\\d{6}"], ["80[0-7]\\d{6}"], ["89\\d{7}"], 0, 0, 0, 0, ["(?:592(?:4[0-2]|93)|80[89]\\d\\d)\\d{4}"]]], MC: ["377", "00", "(?:[3489]|6\\d)\\d{7}", [8, 9], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["4"], "0$1"], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[389]"]], ["(\\d)(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4 $5", ["6"], "0$1"]], "0"], MD: ["373", "00", "(?:[235-7]\\d|[89]0)\\d{6}", [8], [["(\\d{3})(\\d{5})", "$1 $2", ["[89]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["22|3"], "0$1"], ["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["[25-7]"], "0$1"]], "0"], ME: ["382", "00", "(?:20|[3-79]\\d)\\d{6}|80\\d{6,7}", [8, 9], [["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[2-9]"], "0$1"]], "0"], MF: ["590", "00", "590\\d{6}|(?:69|80|9\\d)\\d{7}", [9], 0, "0", 0, 0, 0, 0, 0, [["590(?:0[079]|[14]3|[27][79]|3[03-7]|5[0-268]|87)\\d{4}"], ["69(?:0\\d\\d|1(?:2[2-9]|3[0-5]))\\d{4}"], ["80[0-5]\\d{6}"], 0, 0, 0, 0, 0, ["9(?:(?:395|76[018])\\d|475[0-5])\\d{4}"]]], MG: ["261", "00", "[23]\\d{8}", [9], [["(\\d{2})(\\d{2})(\\d{3})(\\d{2})", "$1 $2 $3 $4", ["[23]"], "0$1"]], "0", 0, "([24-9]\\d{6})$|0", "20$1"], MH: ["692", "011", "329\\d{4}|(?:[256]\\d|45)\\d{5}", [7], [["(\\d{3})(\\d{4})", "$1-$2", ["[2-6]"]]], "1"], MK: ["389", "00", "[2-578]\\d{7}", [8], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["2|34[47]|4(?:[37]7|5[47]|64)"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[347]"], "0$1"], ["(\\d{3})(\\d)(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[58]"], "0$1"]], "0"], ML: ["223", "00", "[24-9]\\d{7}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[24-9]"]]]], MM: ["95", "00", "1\\d{5,7}|95\\d{6}|(?:[4-7]|9[0-46-9])\\d{6,8}|(?:2|8\\d)\\d{5,8}", [6, 7, 8, 9, 10], [["(\\d)(\\d{2})(\\d{3})", "$1 $2 $3", ["16|2"], "0$1"], ["(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3", ["[45]|6(?:0[23]|[1-689]|7[235-7])|7(?:[0-4]|5[2-7])|8[1-6]"], "0$1"], ["(\\d)(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[12]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[4-7]|8[1-35]"], "0$1"], ["(\\d)(\\d{3})(\\d{4,6})", "$1 $2 $3", ["9(?:2[0-4]|[35-9]|4[137-9])"], "0$1"], ["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["2"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["8"], "0$1"], ["(\\d)(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["92"], "0$1"], ["(\\d)(\\d{5})(\\d{4})", "$1 $2 $3", ["9"], "0$1"]], "0"], MN: ["976", "001", "[12]\\d{7,9}|[5-9]\\d{7}", [8, 9, 10], [["(\\d{2})(\\d{2})(\\d{4})", "$1 $2 $3", ["[12]1"], "0$1"], ["(\\d{4})(\\d{4})", "$1 $2", ["[5-9]"]], ["(\\d{3})(\\d{5,6})", "$1 $2", ["[12]2[1-3]"], "0$1"], ["(\\d{4})(\\d{5,6})", "$1 $2", ["[12](?:27|3[2-8]|4[2-68]|5[1-4689])", "[12](?:27|3[2-8]|4[2-68]|5[1-4689])[0-3]"], "0$1"], ["(\\d{5})(\\d{4,5})", "$1 $2", ["[12]"], "0$1"]], "0"], MO: ["853", "00", "0800\\d{3}|(?:28|[68]\\d)\\d{6}", [7, 8], [["(\\d{4})(\\d{3})", "$1 $2", ["0"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[268]"]]]], MP: ["1", "011", "[58]\\d{9}|(?:67|90)0\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "670$1", 0, "670"], MQ: ["596", "00", "596\\d{6}|(?:69|80|9\\d)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[569]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"], "0$1"]], "0"], MR: ["222", "00", "(?:[2-4]\\d\\d|800)\\d{5}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2-48]"]]]], MS: ["1", "011", "(?:[58]\\d\\d|664|900)\\d{7}", [10], 0, "1", 0, "([34]\\d{6})$|1", "664$1", 0, "664"], MT: ["356", "00", "3550\\d{4}|(?:[2579]\\d\\d|800)\\d{5}", [8], [["(\\d{4})(\\d{4})", "$1 $2", ["[2357-9]"]]]], MU: ["230", "0(?:0|[24-7]0|3[03])", "(?:[57]|8\\d\\d)\\d{7}|[2-468]\\d{6}", [7, 8, 10], [["(\\d{3})(\\d{4})", "$1 $2", ["[2-46]|8[013]"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[57]"]], ["(\\d{5})(\\d{5})", "$1 $2", ["8"]]], 0, 0, 0, 0, 0, 0, 0, "020"], MV: ["960", "0(?:0|19)", "(?:800|9[0-57-9]\\d)\\d{7}|[34679]\\d{6}", [7, 10], [["(\\d{3})(\\d{4})", "$1-$2", ["[34679]"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["[89]"]]], 0, 0, 0, 0, 0, 0, 0, "00"], MW: ["265", "00", "(?:[1289]\\d|31|77)\\d{7}|1\\d{6}", [7, 9], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["1[2-9]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["2"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[137-9]"], "0$1"]], "0"], MX: ["52", "0[09]", "1(?:(?:[27]2|44|87|99)[1-9]|65[0-689])\\d{7}|(?:1(?:[01]\\d|2[13-9]|[35][1-9]|4[0-35-9]|6[0-46-9]|7[013-9]|8[1-69]|9[1-8])|[2-9]\\d)\\d{8}", [10, 11], [["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["33|5[56]|81"], 0, 1], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["[2-9]"], 0, 1], ["(\\d)(\\d{2})(\\d{4})(\\d{4})", "$2 $3 $4", ["1(?:33|5[56]|81)"], 0, 1], ["(\\d)(\\d{3})(\\d{3})(\\d{4})", "$2 $3 $4", ["1"], 0, 1]], "01", 0, "0(?:[12]|4[45])|1", 0, 0, 0, 0, "00"], MY: ["60", "00", "1\\d{8,9}|(?:3\\d|[4-9])\\d{7}", [8, 9, 10], [["(\\d)(\\d{3})(\\d{4})", "$1-$2 $3", ["[4-79]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1-$2 $3", ["1(?:[02469]|[378][1-9]|53)|8", "1(?:[02469]|[37][1-9]|53|8(?:[1-46-9]|5[7-9]))|8"], "0$1"], ["(\\d)(\\d{4})(\\d{4})", "$1-$2 $3", ["3"], "0$1"], ["(\\d)(\\d{3})(\\d{2})(\\d{4})", "$1-$2-$3-$4", ["1(?:[367]|80)"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1-$2 $3", ["15"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4})", "$1-$2 $3", ["1"], "0$1"]], "0"], MZ: ["258", "00", "(?:2|8\\d)\\d{7}", [8, 9], [["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["2|8[2-79]"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["8"]]]], NA: ["264", "00", "[68]\\d{7,8}", [8, 9], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["88"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["6"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["87"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["8"], "0$1"]], "0"], NC: ["687", "00", "(?:050|[2-57-9]\\d\\d)\\d{3}", [6], [["(\\d{2})(\\d{2})(\\d{2})", "$1.$2.$3", ["[02-57-9]"]]]], NE: ["227", "00", "[027-9]\\d{7}", [8], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["08"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[089]|2[013]|7[047]"]]]], NF: ["672", "00", "[13]\\d{5}", [6], [["(\\d{2})(\\d{4})", "$1 $2", ["1[0-3]"]], ["(\\d)(\\d{5})", "$1 $2", ["[13]"]]], 0, 0, "([0-258]\\d{4})$", "3$1"], NG: ["234", "009", "(?:[124-7]|9\\d{3})\\d{6}|[1-9]\\d{7}|[78]\\d{9,13}", [7, 8, 10, 11, 12, 13, 14], [["(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3", ["78"], "0$1"], ["(\\d)(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[12]|9(?:0[3-9]|[1-9])"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2,3})", "$1 $2 $3", ["[3-7]|8[2-9]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[7-9]"], "0$1"], ["(\\d{3})(\\d{4})(\\d{4,5})", "$1 $2 $3", ["[78]"], "0$1"], ["(\\d{3})(\\d{5})(\\d{5,6})", "$1 $2 $3", ["[78]"], "0$1"]], "0"], NI: ["505", "00", "(?:1800|[25-8]\\d{3})\\d{4}", [8], [["(\\d{4})(\\d{4})", "$1 $2", ["[125-8]"]]]], NL: ["31", "00", "(?:[124-7]\\d\\d|3(?:[02-9]\\d|1[0-8]))\\d{6}|8\\d{6,9}|9\\d{6,10}|1\\d{4,5}", [5, 6, 7, 8, 9, 10, 11], [["(\\d{3})(\\d{4,7})", "$1 $2", ["[89]0"], "0$1"], ["(\\d{2})(\\d{7})", "$1 $2", ["66"], "0$1"], ["(\\d)(\\d{8})", "$1 $2", ["6"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["1[16-8]|2[259]|3[124]|4[17-9]|5[124679]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[1-578]|91"], "0$1"], ["(\\d{3})(\\d{3})(\\d{5})", "$1 $2 $3", ["9"], "0$1"]], "0"], NO: ["47", "00", "(?:0|[2-9]\\d{3})\\d{4}", [5, 8], [["(\\d{3})(\\d{2})(\\d{3})", "$1 $2 $3", ["8"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2-79]"]]], 0, 0, 0, 0, 0, "[02-689]|7[0-8]"], NP: ["977", "00", "(?:1\\d|9)\\d{9}|[1-9]\\d{7}", [8, 10, 11], [["(\\d)(\\d{7})", "$1-$2", ["1[2-6]"], "0$1"], ["(\\d{2})(\\d{6})", "$1-$2", ["1[01]|[2-8]|9(?:[1-59]|[67][2-6])"], "0$1"], ["(\\d{3})(\\d{7})", "$1-$2", ["9"]]], "0"], NR: ["674", "00", "(?:444|(?:55|8\\d)\\d|666)\\d{4}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[4-68]"]]]], NU: ["683", "00", "(?:[4-7]|888\\d)\\d{3}", [4, 7], [["(\\d{3})(\\d{4})", "$1 $2", ["8"]]]], NZ: ["64", "0(?:0|161)", "[1289]\\d{9}|50\\d{5}(?:\\d{2,3})?|[27-9]\\d{7,8}|(?:[34]\\d|6[0-35-9])\\d{6}|8\\d{4,6}", [5, 6, 7, 8, 9, 10], [["(\\d{2})(\\d{3,8})", "$1 $2", ["8[1-79]"], "0$1"], ["(\\d{3})(\\d{2})(\\d{2,3})", "$1 $2 $3", ["50[036-8]|8|90", "50(?:[0367]|88)|8|90"], "0$1"], ["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["24|[346]|7[2-57-9]|9[2-9]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["2(?:10|74)|[589]"], "0$1"], ["(\\d{2})(\\d{3,4})(\\d{4})", "$1 $2 $3", ["1|2[028]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,5})", "$1 $2 $3", ["2(?:[169]|7[0-35-9])|7"], "0$1"]], "0", 0, 0, 0, 0, 0, 0, "00"], OM: ["968", "00", "(?:1505|[279]\\d{3}|500)\\d{4}|800\\d{5,6}", [7, 8, 9], [["(\\d{3})(\\d{4,6})", "$1 $2", ["[58]"]], ["(\\d{2})(\\d{6})", "$1 $2", ["2"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[179]"]]]], PA: ["507", "00", "(?:00800|8\\d{3})\\d{6}|[68]\\d{7}|[1-57-9]\\d{6}", [7, 8, 10, 11], [["(\\d{3})(\\d{4})", "$1-$2", ["[1-57-9]"]], ["(\\d{4})(\\d{4})", "$1-$2", ["[68]"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["8"]]]], PE: ["51", "00|19(?:1[124]|77|90)00", "(?:[14-8]|9\\d)\\d{7}", [8, 9], [["(\\d{3})(\\d{5})", "$1 $2", ["80"], "(0$1)"], ["(\\d)(\\d{7})", "$1 $2", ["1"], "(0$1)"], ["(\\d{2})(\\d{6})", "$1 $2", ["[4-8]"], "(0$1)"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["9"]]], "0", 0, 0, 0, 0, 0, 0, "00", " Anexo "], PF: ["689", "00", "4\\d{5}(?:\\d{2})?|8\\d{7,8}", [6, 8, 9], [["(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3", ["44"]], ["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["4|8[7-9]"]], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"]]]], PG: ["675", "00|140[1-3]", "(?:180|[78]\\d{3})\\d{4}|(?:[2-589]\\d|64)\\d{5}", [7, 8], [["(\\d{3})(\\d{4})", "$1 $2", ["18|[2-69]|85"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[78]"]]], 0, 0, 0, 0, 0, 0, 0, "00"], PH: ["63", "00", "(?:[2-7]|9\\d)\\d{8}|2\\d{5}|(?:1800|8)\\d{7,9}", [6, 8, 9, 10, 11, 12, 13], [["(\\d)(\\d{5})", "$1 $2", ["2"], "(0$1)"], ["(\\d{4})(\\d{4,6})", "$1 $2", ["3(?:23|39|46)|4(?:2[3-6]|[35]9|4[26]|76)|544|88[245]|(?:52|64|86)2", "3(?:230|397|461)|4(?:2(?:35|[46]4|51)|396|4(?:22|63)|59[347]|76[15])|5(?:221|446)|642[23]|8(?:622|8(?:[24]2|5[13]))"], "(0$1)"], ["(\\d{5})(\\d{4})", "$1 $2", ["346|4(?:27|9[35])|883", "3469|4(?:279|9(?:30|56))|8834"], "(0$1)"], ["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["2"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[3-7]|8[2-8]"], "(0$1)"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["[89]"], "0$1"], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"]], ["(\\d{4})(\\d{1,2})(\\d{3})(\\d{4})", "$1 $2 $3 $4", ["1"]]], "0"], PK: ["92", "00", "122\\d{6}|[24-8]\\d{10,11}|9(?:[013-9]\\d{8,10}|2(?:[01]\\d\\d|2(?:[06-8]\\d|1[01]))\\d{7})|(?:[2-8]\\d{3}|92(?:[0-7]\\d|8[1-9]))\\d{6}|[24-9]\\d{8}|[89]\\d{7}", [8, 9, 10, 11, 12], [["(\\d{3})(\\d{3})(\\d{2,7})", "$1 $2 $3", ["[89]0"], "0$1"], ["(\\d{4})(\\d{5})", "$1 $2", ["1"]], ["(\\d{3})(\\d{6,7})", "$1 $2", ["2(?:3[2358]|4[2-4]|9[2-8])|45[3479]|54[2-467]|60[468]|72[236]|8(?:2[2-689]|3[23578]|4[3478]|5[2356])|9(?:2[2-8]|3[27-9]|4[2-6]|6[3569]|9[25-8])", "9(?:2[3-8]|98)|(?:2(?:3[2358]|4[2-4]|9[2-8])|45[3479]|54[2-467]|60[468]|72[236]|8(?:2[2-689]|3[23578]|4[3478]|5[2356])|9(?:22|3[27-9]|4[2-6]|6[3569]|9[25-7]))[2-9]"], "(0$1)"], ["(\\d{2})(\\d{7,8})", "$1 $2", ["(?:2[125]|4[0-246-9]|5[1-35-7]|6[1-8]|7[14]|8[16]|91)[2-9]"], "(0$1)"], ["(\\d{5})(\\d{5})", "$1 $2", ["58"], "(0$1)"], ["(\\d{3})(\\d{7})", "$1 $2", ["3"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["2[125]|4[0-246-9]|5[1-35-7]|6[1-8]|7[14]|8[16]|91"], "(0$1)"], ["(\\d{3})(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["[24-9]"], "(0$1)"]], "0"], PL: ["48", "00", "(?:6|8\\d\\d)\\d{7}|[1-9]\\d{6}(?:\\d{2})?|[26]\\d{5}", [6, 7, 8, 9, 10], [["(\\d{5})", "$1", ["19"]], ["(\\d{3})(\\d{3})", "$1 $2", ["11|20|64"]], ["(\\d{2})(\\d{2})(\\d{3})", "$1 $2 $3", ["(?:1[2-8]|2[2-69]|3[2-4]|4[1-468]|5[24-689]|6[1-3578]|7[14-7]|8[1-79]|9[145])1", "(?:1[2-8]|2[2-69]|3[2-4]|4[1-468]|5[24-689]|6[1-3578]|7[14-7]|8[1-79]|9[145])19"]], ["(\\d{3})(\\d{2})(\\d{2,3})", "$1 $2 $3", ["64"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["21|39|45|5[0137]|6[0469]|7[02389]|8(?:0[14]|8)"]], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["1[2-8]|[2-7]|8[1-79]|9[145]"]], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["8"]]]], PM: ["508", "00", "[45]\\d{5}|(?:708|80\\d)\\d{6}", [6, 9], [["(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3", ["[45]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["7"]], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"], "0$1"]], "0"], PR: ["1", "011", "(?:[589]\\d\\d|787)\\d{7}", [10], 0, "1", 0, 0, 0, 0, "787|939"], PS: ["970", "00", "[2489]2\\d{6}|(?:1\\d|5)\\d{8}", [8, 9, 10], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["[2489]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["5"], "0$1"], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["1"]]], "0"], PT: ["351", "00", "1693\\d{5}|(?:[26-9]\\d|30)\\d{7}", [9], [["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["2[12]"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["16|[236-9]"]]]], PW: ["680", "01[12]", "(?:[24-8]\\d\\d|345|900)\\d{4}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[2-9]"]]]], PY: ["595", "00", "59\\d{4,6}|9\\d{5,10}|(?:[2-46-8]\\d|5[0-8])\\d{4,7}", [6, 7, 8, 9, 10, 11], [["(\\d{3})(\\d{3,6})", "$1 $2", ["[2-9]0"], "0$1"], ["(\\d{2})(\\d{5})", "$1 $2", ["[26]1|3[289]|4[1246-8]|7[1-3]|8[1-36]"], "(0$1)"], ["(\\d{3})(\\d{4,5})", "$1 $2", ["2[279]|3[13-5]|4[359]|5|6(?:[34]|7[1-46-8])|7[46-8]|85"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["2[14-68]|3[26-9]|4[1246-8]|6(?:1|75)|7[1-35]|8[1-36]"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["87"]], ["(\\d{3})(\\d{6})", "$1 $2", ["9(?:[5-79]|8[1-7])"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[2-8]"], "0$1"], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["9"]]], "0"], QA: ["974", "00", "800\\d{4}|(?:2|800)\\d{6}|(?:0080|[3-7])\\d{7}", [7, 8, 9, 11], [["(\\d{3})(\\d{4})", "$1 $2", ["2[16]|8"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[3-7]"]]]], RE: ["262", "00", "(?:26|[689]\\d)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2689]"], "0$1"]], "0", 0, 0, 0, 0, 0, [["26(?:2\\d\\d|3(?:0\\d|1[0-6]))\\d{4}"], ["69(?:2\\d\\d|3(?:[06][0-6]|1[013]|2[0-2]|3[0-39]|4\\d|5[0-5]|7[0-37]|8[0-8]|9[0-479]))\\d{4}"], ["80\\d{7}"], ["89[1-37-9]\\d{6}"], 0, 0, 0, 0, ["9(?:399[0-3]|479[0-5]|76(?:2[27]|3[0-37]))\\d{4}"], ["8(?:1[019]|2[0156]|84|90)\\d{6}"]]], RO: ["40", "00", "(?:[236-8]\\d|90)\\d{7}|[23]\\d{5}", [6, 9], [["(\\d{3})(\\d{3})", "$1 $2", ["2[3-6]", "2[3-6]\\d9"], "0$1"], ["(\\d{2})(\\d{4})", "$1 $2", ["219|31"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[23]1"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[236-9]"], "0$1"]], "0", 0, 0, 0, 0, 0, 0, 0, " int "], RS: ["381", "00", "38[02-9]\\d{6,9}|6\\d{7,9}|90\\d{4,8}|38\\d{5,6}|(?:7\\d\\d|800)\\d{3,9}|(?:[12]\\d|3[0-79])\\d{5,10}", [6, 7, 8, 9, 10, 11, 12], [["(\\d{3})(\\d{3,9})", "$1 $2", ["(?:2[389]|39)0|[7-9]"], "0$1"], ["(\\d{2})(\\d{5,10})", "$1 $2", ["[1-36]"], "0$1"]], "0"], RU: ["7", "810", "8\\d{13}|[347-9]\\d{9}", [10, 14], [["(\\d{4})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["7(?:1[0-8]|2[1-9])", "7(?:1(?:[0-356]2|4[29]|7|8[27])|2(?:1[23]|[2-9]2))", "7(?:1(?:[0-356]2|4[29]|7|8[27])|2(?:13[03-69]|62[013-9]))|72[1-57-9]2"], "8 ($1)", 1], ["(\\d{5})(\\d)(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["7(?:1[0-68]|2[1-9])", "7(?:1(?:[06][3-6]|[18]|2[35]|[3-5][3-5])|2(?:[13][3-5]|[24-689]|7[457]))", "7(?:1(?:0(?:[356]|4[023])|[18]|2(?:3[013-9]|5)|3[45]|43[013-79]|5(?:3[1-8]|4[1-7]|5)|6(?:3[0-35-9]|[4-6]))|2(?:1(?:3[178]|[45])|[24-689]|3[35]|7[457]))|7(?:14|23)4[0-8]|71(?:33|45)[1-79]"], "8 ($1)", 1], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["7"], "8 ($1)", 1], ["(\\d{3})(\\d{3})(\\d{2})(\\d{2})", "$1 $2-$3-$4", ["[349]|8(?:[02-7]|1[1-8])"], "8 ($1)", 1], ["(\\d{4})(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["8"], "8 ($1)"]], "8", 0, 0, 0, 0, "3[04-689]|[489]", 0, "8~10"], RW: ["250", "00", "(?:06|[27]\\d\\d|[89]00)\\d{6}", [8, 9], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["0"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["2"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[7-9]"], "0$1"]], "0"], SA: ["966", "00", "92\\d{7}|(?:[15]|8\\d)\\d{8}", [9, 10], [["(\\d{4})(\\d{5})", "$1 $2", ["9"]], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["5"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["81"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["8"]]], "0"], SB: ["677", "0[01]", "(?:[1-6]|[7-9]\\d\\d)\\d{4}", [5, 7], [["(\\d{2})(\\d{5})", "$1 $2", ["7|8[4-9]|9(?:[1-8]|9[0-8])"]]]], SC: ["248", "010|0[0-2]", "800\\d{4}|(?:[249]\\d|64)\\d{5}", [7], [["(\\d)(\\d{3})(\\d{3})", "$1 $2 $3", ["[246]|9[57]"]]], 0, 0, 0, 0, 0, 0, 0, "00"], SD: ["249", "00", "[19]\\d{8}", [9], [["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[19]"], "0$1"]], "0"], SE: ["46", "00", "(?:[26]\\d\\d|9)\\d{9}|[1-9]\\d{8}|[1-689]\\d{7}|[1-4689]\\d{6}|2\\d{5}", [6, 7, 8, 9, 10], [["(\\d{2})(\\d{2,3})(\\d{2})", "$1-$2 $3", ["20"], "0$1", 0, "$1 $2 $3"], ["(\\d{3})(\\d{4})", "$1-$2", ["9(?:00|39|44|9)"], "0$1", 0, "$1 $2"], ["(\\d{2})(\\d{3})(\\d{2})", "$1-$2 $3", ["[12][136]|3[356]|4[0246]|6[03]|90[1-9]"], "0$1", 0, "$1 $2 $3"], ["(\\d)(\\d{2,3})(\\d{2})(\\d{2})", "$1-$2 $3 $4", ["8"], "0$1", 0, "$1 $2 $3 $4"], ["(\\d{3})(\\d{2,3})(\\d{2})", "$1-$2 $3", ["1[2457]|2(?:[247-9]|5[0138])|3[0247-9]|4[1357-9]|5[0-35-9]|6(?:[125689]|4[02-57]|7[0-2])|9(?:[125-8]|3[02-5]|4[0-3])"], "0$1", 0, "$1 $2 $3"], ["(\\d{3})(\\d{2,3})(\\d{3})", "$1-$2 $3", ["9(?:00|39|44)"], "0$1", 0, "$1 $2 $3"], ["(\\d{2})(\\d{2,3})(\\d{2})(\\d{2})", "$1-$2 $3 $4", ["1[13689]|2[0136]|3[1356]|4[0246]|54|6[03]|90[1-9]"], "0$1", 0, "$1 $2 $3 $4"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1-$2 $3 $4", ["10|7"], "0$1", 0, "$1 $2 $3 $4"], ["(\\d)(\\d{3})(\\d{3})(\\d{2})", "$1-$2 $3 $4", ["8"], "0$1", 0, "$1 $2 $3 $4"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1-$2 $3 $4", ["[13-5]|2(?:[247-9]|5[0138])|6(?:[124-689]|7[0-2])|9(?:[125-8]|3[02-5]|4[0-3])"], "0$1", 0, "$1 $2 $3 $4"], ["(\\d{3})(\\d{2})(\\d{2})(\\d{3})", "$1-$2 $3 $4", ["9"], "0$1", 0, "$1 $2 $3 $4"], ["(\\d{3})(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1-$2 $3 $4 $5", ["[26]"], "0$1", 0, "$1 $2 $3 $4 $5"]], "0"], SG: ["65", "0[0-3]\\d", "(?:(?:1\\d|8)\\d\\d|7000)\\d{7}|[3689]\\d{7}", [8, 10, 11], [["(\\d{4})(\\d{4})", "$1 $2", ["[369]|8(?:0[1-8]|[1-9])"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["8"]], ["(\\d{4})(\\d{4})(\\d{3})", "$1 $2 $3", ["7"]], ["(\\d{4})(\\d{3})(\\d{4})", "$1 $2 $3", ["1"]]]], SH: ["290", "00", "(?:[256]\\d|8)\\d{3}", [4, 5], 0, 0, 0, 0, 0, 0, "[256]"], SI: ["386", "00|10(?:22|66|88|99)", "[1-7]\\d{7}|8\\d{4,7}|90\\d{4,6}", [5, 6, 7, 8], [["(\\d{2})(\\d{3,6})", "$1 $2", ["8[09]|9"], "0$1"], ["(\\d{3})(\\d{5})", "$1 $2", ["59|8"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[37][01]|4[0139]|51|6"], "0$1"], ["(\\d)(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[1-57]"], "(0$1)"]], "0", 0, 0, 0, 0, 0, 0, "00"], SJ: ["47", "00", "0\\d{4}|(?:[489]\\d|79)\\d{6}", [5, 8], 0, 0, 0, 0, 0, 0, "79"], SK: ["421", "00", "[2-689]\\d{8}|[2-59]\\d{6}|[2-5]\\d{5}", [6, 7, 9], [["(\\d)(\\d{2})(\\d{3,4})", "$1 $2 $3", ["21"], "0$1"], ["(\\d{2})(\\d{2})(\\d{2,3})", "$1 $2 $3", ["[3-5][1-8]1", "[3-5][1-8]1[67]"], "0$1"], ["(\\d)(\\d{3})(\\d{3})(\\d{2})", "$1/$2 $3 $4", ["2"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[689]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1/$2 $3 $4", ["[3-5]"], "0$1"]], "0"], SL: ["232", "00", "(?:[237-9]\\d|66)\\d{6}", [8], [["(\\d{2})(\\d{6})", "$1 $2", ["[236-9]"], "(0$1)"]], "0"], SM: ["378", "00", "(?:0549|[5-7]\\d)\\d{6}", [8, 10], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[5-7]"]], ["(\\d{4})(\\d{6})", "$1 $2", ["0"]]], 0, 0, "([89]\\d{5})$", "0549$1"], SN: ["221", "00", "(?:[378]\\d|93)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"]], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[379]"]]]], SO: ["252", "00", "[346-9]\\d{8}|[12679]\\d{7}|[1-5]\\d{6}|[1348]\\d{5}", [6, 7, 8, 9], [["(\\d{2})(\\d{4})", "$1 $2", ["8[125]"]], ["(\\d{6})", "$1", ["[134]"]], ["(\\d)(\\d{6})", "$1 $2", ["[15]|2[0-79]|3[0-46-8]|4[0-7]"]], ["(\\d)(\\d{7})", "$1 $2", ["(?:2|90)4|[67]"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[348]|64|79|90"]], ["(\\d{2})(\\d{5,7})", "$1 $2", ["1|28|6[0-35-9]|77|9[2-9]"]]], "0"], SR: ["597", "00", "(?:[2-5]|68|[78]\\d)\\d{5}", [6, 7], [["(\\d{2})(\\d{2})(\\d{2})", "$1-$2-$3", ["56"]], ["(\\d{3})(\\d{3})", "$1-$2", ["[2-5]"]], ["(\\d{3})(\\d{4})", "$1-$2", ["[6-8]"]]]], SS: ["211", "00", "[19]\\d{8}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[19]"], "0$1"]], "0"], ST: ["239", "00", "(?:22|9\\d)\\d{5}", [7], [["(\\d{3})(\\d{4})", "$1 $2", ["[29]"]]]], SV: ["503", "00", "[267]\\d{7}|[89]00\\d{4}(?:\\d{4})?", [7, 8, 11], [["(\\d{3})(\\d{4})", "$1 $2", ["[89]"]], ["(\\d{4})(\\d{4})", "$1 $2", ["[267]"]], ["(\\d{3})(\\d{4})(\\d{4})", "$1 $2 $3", ["[89]"]]]], SX: ["1", "011", "7215\\d{6}|(?:[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "(5\\d{6})$|1", "721$1", 0, "721"], SY: ["963", "00", "[1-39]\\d{8}|[1-5]\\d{7}", [8, 9], [["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[1-5]"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["9"], "0$1", 1]], "0"], SZ: ["268", "00", "0800\\d{4}|(?:[237]\\d|900)\\d{6}", [8, 9], [["(\\d{4})(\\d{4})", "$1 $2", ["[0237]"]], ["(\\d{5})(\\d{4})", "$1 $2", ["9"]]]], TA: ["290", "00", "8\\d{3}", [4], 0, 0, 0, 0, 0, 0, "8"], TC: ["1", "011", "(?:[58]\\d\\d|649|900)\\d{7}", [10], 0, "1", 0, "([2-479]\\d{6})$|1", "649$1", 0, "649"], TD: ["235", "00|16", "(?:22|[69]\\d|77)\\d{6}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[2679]"]]], 0, 0, 0, 0, 0, 0, 0, "00"], TG: ["228", "00", "[279]\\d{7}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[279]"]]]], TH: ["66", "00[1-9]", "(?:001800|[2-57]|[689]\\d)\\d{7}|1\\d{7,9}", [8, 9, 10, 13], [["(\\d)(\\d{3})(\\d{4})", "$1 $2 $3", ["2"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[13-9]"], "0$1"], ["(\\d{4})(\\d{3})(\\d{3})", "$1 $2 $3", ["1"]]], "0"], TJ: ["992", "810", "[0-57-9]\\d{8}", [9], [["(\\d{6})(\\d)(\\d{2})", "$1 $2 $3", ["331", "3317"]], ["(\\d{3})(\\d{2})(\\d{4})", "$1 $2 $3", ["44[02-479]|[34]7"]], ["(\\d{4})(\\d)(\\d{4})", "$1 $2 $3", ["3[1-5]"]], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[0-57-9]"]]], 0, 0, 0, 0, 0, 0, 0, "8~10"], TK: ["690", "00", "[2-47]\\d{3,6}", [4, 5, 6, 7]], TL: ["670", "00", "7\\d{7}|(?:[2-47]\\d|[89]0)\\d{5}", [7, 8], [["(\\d{3})(\\d{4})", "$1 $2", ["[2-489]|70"]], ["(\\d{4})(\\d{4})", "$1 $2", ["7"]]]], TM: ["993", "810", "[1-6]\\d{7}", [8], [["(\\d{2})(\\d{2})(\\d{2})(\\d{2})", "$1 $2-$3-$4", ["12"], "(8 $1)"], ["(\\d{3})(\\d)(\\d{2})(\\d{2})", "$1 $2-$3-$4", ["[1-5]"], "(8 $1)"], ["(\\d{2})(\\d{6})", "$1 $2", ["6"], "8 $1"]], "8", 0, 0, 0, 0, 0, 0, "8~10"], TN: ["216", "00", "[2-57-9]\\d{7}", [8], [["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[2-57-9]"]]]], TO: ["676", "00", "(?:0800|(?:[5-8]\\d\\d|999)\\d)\\d{3}|[2-8]\\d{4}", [5, 7], [["(\\d{2})(\\d{3})", "$1-$2", ["[2-4]|50|6[09]|7[0-24-69]|8[05]"]], ["(\\d{4})(\\d{3})", "$1 $2", ["0"]], ["(\\d{3})(\\d{4})", "$1 $2", ["[5-9]"]]]], TR: ["90", "00", "4\\d{6}|8\\d{11,12}|(?:[2-58]\\d\\d|900)\\d{7}", [7, 10, 12, 13], [["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["512|8[01589]|90"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["5(?:[0-59]|61)", "5(?:[0-59]|61[06])", "5(?:[0-59]|61[06]1)"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[24][1-8]|3[1-9]"], "(0$1)", 1], ["(\\d{3})(\\d{3})(\\d{6,7})", "$1 $2 $3", ["80"], "0$1", 1]], "0"], TT: ["1", "011", "(?:[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-46-8]\\d{6})$|1", "868$1", 0, "868"], TV: ["688", "00", "(?:2|7\\d\\d|90)\\d{4}", [5, 6, 7], [["(\\d{2})(\\d{3})", "$1 $2", ["2"]], ["(\\d{2})(\\d{4})", "$1 $2", ["90"]], ["(\\d{2})(\\d{5})", "$1 $2", ["7"]]]], TW: ["886", "0(?:0[25-79]|19)", "[2-689]\\d{8}|7\\d{9,10}|[2-8]\\d{7}|2\\d{6}", [7, 8, 9, 10, 11], [["(\\d{2})(\\d)(\\d{4})", "$1 $2 $3", ["202"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[258]0"], "0$1"], ["(\\d)(\\d{3,4})(\\d{4})", "$1 $2 $3", ["[23568]|4(?:0[02-48]|[1-47-9])|7[1-9]", "[23568]|4(?:0[2-48]|[1-47-9])|(?:400|7)[1-9]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[49]"], "0$1"], ["(\\d{2})(\\d{4})(\\d{4,5})", "$1 $2 $3", ["7"], "0$1"]], "0", 0, 0, 0, 0, 0, 0, 0, "#"], TZ: ["255", "00[056]", "(?:[25-8]\\d|41|90)\\d{7}", [9], [["(\\d{3})(\\d{2})(\\d{4})", "$1 $2 $3", ["[89]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[24]"], "0$1"], ["(\\d{2})(\\d{7})", "$1 $2", ["5"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[67]"], "0$1"]], "0"], UA: ["380", "00", "[89]\\d{9}|[3-9]\\d{8}", [9, 10], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["6[12][29]|(?:3[1-8]|4[136-8]|5[12457]|6[49])2|(?:56|65)[24]", "6[12][29]|(?:35|4[1378]|5[12457]|6[49])2|(?:56|65)[24]|(?:3[1-46-8]|46)2[013-9]"], "0$1"], ["(\\d{4})(\\d{5})", "$1 $2", ["3[1-8]|4(?:[1367]|[45][6-9]|8[4-6])|5(?:[1-5]|6[0135689]|7[4-6])|6(?:[12][3-7]|[459])", "3[1-8]|4(?:[1367]|[45][6-9]|8[4-6])|5(?:[1-5]|6(?:[015689]|3[02389])|7[4-6])|6(?:[12][3-7]|[459])"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[3-7]|89|9[1-9]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[89]"], "0$1"]], "0", 0, 0, 0, 0, 0, 0, "0~0"], UG: ["256", "00[057]", "800\\d{6}|(?:[29]0|[347]\\d)\\d{7}", [9], [["(\\d{4})(\\d{5})", "$1 $2", ["202", "2024"], "0$1"], ["(\\d{3})(\\d{6})", "$1 $2", ["[27-9]|4(?:6[45]|[7-9])"], "0$1"], ["(\\d{2})(\\d{7})", "$1 $2", ["[34]"], "0$1"]], "0"], US: ["1", "011", "[2-9]\\d{9}|3\\d{6}", [10], [["(\\d{3})(\\d{4})", "$1-$2", ["310"], 0, 1], ["(\\d{3})(\\d{3})(\\d{4})", "($1) $2-$3", ["[2-9]"], 0, 1, "$1-$2-$3"]], "1", 0, 0, 0, 0, 0, [["(?:5056(?:[0-35-9]\\d|4[468])|73020\\d)\\d{4}|(?:472[24]|505[2-57-9]|983[289])\\d{6}|(?:2(?:0[1-35-9]|1[02-9]|2[03-57-9]|3[149]|4[08]|5[1-46]|6[0279]|7[0269]|8[13])|3(?:0[1-57-9]|1[02-9]|2[013569]|3[0-24679]|4[167]|5[0-2]|6[0149]|8[056])|4(?:0[124-9]|1[02-579]|2[3-5]|3[0245]|4[023578]|58|6[349]|7[0589]|8[04])|5(?:0[1-47-9]|1[0235-8]|20|3[0149]|4[01]|5[179]|6[1-47]|7[0-5]|8[0256])|6(?:0[1-35-9]|1[024-9]|2[03689]|[34][016]|5[01679]|6[0-279]|78|8[0-29])|7(?:0[1-46-8]|1[2-9]|2[04-7]|3[1247]|4[037]|5[47]|6[02359]|7[0-59]|8[156])|8(?:0[1-68]|1[02-8]|2[068]|3[0-2589]|4[03578]|5[046-9]|6[02-5]|7[028])|9(?:0[1346-9]|1[02-9]|2[0589]|3[0146-8]|4[01357-9]|5[12469]|7[0-389]|8[04-69]))[2-9]\\d{6}"], [""], ["8(?:00|33|44|55|66|77|88)[2-9]\\d{6}"], ["900[2-9]\\d{6}"], ["52(?:3(?:[2-46-9][02-9]\\d|5(?:[02-46-9]\\d|5[0-46-9]))|4(?:[2-478][02-9]\\d|5(?:[034]\\d|2[024-9]|5[0-46-9])|6(?:0[1-9]|[2-9]\\d)|9(?:[05-9]\\d|2[0-5]|49)))\\d{4}|52[34][2-9]1[02-9]\\d{4}|5(?:00|2[125-9]|33|44|66|77|88)[2-9]\\d{6}"]]], UY: ["598", "0(?:0|1[3-9]\\d)", "0004\\d{2,9}|[1249]\\d{7}|(?:[49]\\d|80)\\d{5}", [6, 7, 8, 9, 10, 11, 12, 13], [["(\\d{3})(\\d{3,4})", "$1 $2", ["0"]], ["(\\d{3})(\\d{4})", "$1 $2", ["[49]0|8"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["9"], "0$1"], ["(\\d{4})(\\d{4})", "$1 $2", ["[124]"]], ["(\\d{3})(\\d{3})(\\d{2,4})", "$1 $2 $3", ["0"]], ["(\\d{3})(\\d{3})(\\d{3})(\\d{2,4})", "$1 $2 $3 $4", ["0"]]], "0", 0, 0, 0, 0, 0, 0, "00", " int. "], UZ: ["998", "810", "(?:20|33|[5-79]\\d|88)\\d{7}", [9], [["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["[235-9]"], "8 $1"]], "8", 0, 0, 0, 0, 0, 0, "8~10"], VA: ["39", "00", "0\\d{5,10}|3[0-8]\\d{7,10}|55\\d{8}|8\\d{5}(?:\\d{2,4})?|(?:1\\d|39)\\d{7,8}", [6, 7, 8, 9, 10, 11], 0, 0, 0, 0, 0, 0, "06698"], VC: ["1", "011", "(?:[58]\\d\\d|784|900)\\d{7}", [10], 0, "1", 0, "([2-7]\\d{6})$|1", "784$1", 0, "784"], VE: ["58", "00", "[68]00\\d{7}|(?:[24]\\d|[59]0)\\d{8}", [10], [["(\\d{3})(\\d{7})", "$1-$2", ["[24-689]"], "0$1"]], "0"], VG: ["1", "011", "(?:284|[58]\\d\\d|900)\\d{7}", [10], 0, "1", 0, "([2-578]\\d{6})$|1", "284$1", 0, "284"], VI: ["1", "011", "[58]\\d{9}|(?:34|90)0\\d{7}", [10], 0, "1", 0, "([2-9]\\d{6})$|1", "340$1", 0, "340"], VN: ["84", "00", "[12]\\d{9}|[135-9]\\d{8}|[16]\\d{7}|[16-8]\\d{6}", [7, 8, 9, 10], [["(\\d{2})(\\d{5})", "$1 $2", ["80"], "0$1", 1], ["(\\d{4})(\\d{4,6})", "$1 $2", ["1"], 0, 1], ["(\\d{2})(\\d{3})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["6"], "0$1", 1], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[357-9]"], "0$1", 1], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["2[48]"], "0$1", 1], ["(\\d{3})(\\d{4})(\\d{3})", "$1 $2 $3", ["2"], "0$1", 1]], "0"], VU: ["678", "00", "[57-9]\\d{6}|(?:[238]\\d|48)\\d{3}", [5, 7], [["(\\d{3})(\\d{4})", "$1 $2", ["[57-9]"]]]], WF: ["681", "00", "(?:40|72)\\d{4}|8\\d{5}(?:\\d{3})?", [6, 9], [["(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3", ["[478]"]], ["(\\d{3})(\\d{2})(\\d{2})(\\d{2})", "$1 $2 $3 $4", ["8"]]]], WS: ["685", "0", "(?:[2-6]|8\\d{5})\\d{4}|[78]\\d{6}|[68]\\d{5}", [5, 6, 7, 10], [["(\\d{5})", "$1", ["[2-5]|6[1-9]"]], ["(\\d{3})(\\d{3,7})", "$1 $2", ["[68]"]], ["(\\d{2})(\\d{5})", "$1 $2", ["7"]]]], XK: ["383", "00", "[23]\\d{7,8}|(?:4\\d\\d|[89]00)\\d{5}", [8, 9], [["(\\d{3})(\\d{5})", "$1 $2", ["[89]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3})", "$1 $2 $3", ["[2-4]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[23]"], "0$1"]], "0"], YE: ["967", "00", "(?:1|7\\d)\\d{7}|[1-7]\\d{6}", [7, 8, 9], [["(\\d)(\\d{3})(\\d{3,4})", "$1 $2 $3", ["[1-6]|7(?:[24-6]|8[0-7])"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["7"], "0$1"]], "0"], YT: ["262", "00", "(?:80|9\\d)\\d{7}|(?:26|63)9\\d{6}", [9], 0, "0", 0, 0, 0, 0, 0, [["269(?:0[0-467]|5[0-4]|6\\d|[78]0)\\d{4}"], ["639(?:0[0-79]|1[019]|[267]\\d|3[09]|40|5[05-9]|9[04-79])\\d{4}"], ["80\\d{7}"], 0, 0, 0, 0, 0, ["9(?:(?:39|47)8[01]|769\\d)\\d{4}"]]], ZA: ["27", "00", "[1-79]\\d{8}|8\\d{4,9}", [5, 6, 7, 8, 9, 10], [["(\\d{2})(\\d{3,4})", "$1 $2", ["8[1-4]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{2,3})", "$1 $2 $3", ["8[1-4]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["860"], "0$1"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["[1-9]"], "0$1"], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["8"], "0$1"]], "0"], ZM: ["260", "00", "800\\d{6}|(?:21|63|[79]\\d)\\d{7}", [9], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[28]"], "0$1"], ["(\\d{2})(\\d{7})", "$1 $2", ["[79]"], "0$1"]], "0"], ZW: ["263", "00", "2(?:[0-57-9]\\d{6,8}|6[0-24-9]\\d{6,7})|[38]\\d{9}|[35-8]\\d{8}|[3-6]\\d{7}|[1-689]\\d{6}|[1-3569]\\d{5}|[1356]\\d{4}", [5, 6, 7, 8, 9, 10], [["(\\d{3})(\\d{3,5})", "$1 $2", ["2(?:0[45]|2[278]|[49]8)|3(?:[09]8|17)|6(?:[29]8|37|75)|[23][78]|(?:33|5[15]|6[68])[78]"], "0$1"], ["(\\d)(\\d{3})(\\d{2,4})", "$1 $2 $3", ["[49]"], "0$1"], ["(\\d{3})(\\d{4})", "$1 $2", ["80"], "0$1"], ["(\\d{2})(\\d{7})", "$1 $2", ["24|8[13-59]|(?:2[05-79]|39|5[45]|6[15-8])2", "2(?:02[014]|4|[56]20|[79]2)|392|5(?:42|525)|6(?:[16-8]21|52[013])|8[13-59]"], "(0$1)"], ["(\\d{2})(\\d{3})(\\d{4})", "$1 $2 $3", ["7"], "0$1"], ["(\\d{3})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["2(?:1[39]|2[0157]|[378]|[56][14])|3(?:12|29)", "2(?:1[39]|2[0157]|[378]|[56][14])|3(?:123|29)"], "0$1"], ["(\\d{4})(\\d{6})", "$1 $2", ["8"], "0$1"], ["(\\d{2})(\\d{3,5})", "$1 $2", ["1|2(?:0[0-36-9]|12|29|[56])|3(?:1[0-689]|[24-6])|5(?:[0236-9]|1[2-4])|6(?:[013-59]|7[0-46-9])|(?:33|55|6[68])[0-69]|(?:29|3[09]|62)[0-79]"], "0$1"], ["(\\d{2})(\\d{3})(\\d{3,4})", "$1 $2 $3", ["29[013-9]|39|54"], "0$1"], ["(\\d{4})(\\d{3,5})", "$1 $2", ["(?:25|54)8", "258|5483"], "0$1"]], "0"] }, nonGeographic: { 800: ["800", 0, "(?:00|[1-9]\\d)\\d{6}", [8], [["(\\d{4})(\\d{4})", "$1 $2", ["\\d"]]], 0, 0, 0, 0, 0, 0, [0, 0, ["(?:00|[1-9]\\d)\\d{6}"]]], 808: ["808", 0, "[1-9]\\d{7}", [8], [["(\\d{4})(\\d{4})", "$1 $2", ["[1-9]"]]], 0, 0, 0, 0, 0, 0, [0, 0, 0, 0, 0, 0, 0, 0, 0, ["[1-9]\\d{7}"]]], 870: ["870", 0, "7\\d{11}|[35-7]\\d{8}", [9, 12], [["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["[35-7]"]]], 0, 0, 0, 0, 0, 0, [0, ["(?:[356]|774[45])\\d{8}|7[6-8]\\d{7}"]]], 878: ["878", 0, "10\\d{10}", [12], [["(\\d{2})(\\d{5})(\\d{5})", "$1 $2 $3", ["1"]]], 0, 0, 0, 0, 0, 0, [0, 0, 0, 0, 0, 0, 0, 0, ["10\\d{10}"]]], 881: ["881", 0, "6\\d{9}|[0-36-9]\\d{8}", [9, 10], [["(\\d)(\\d{3})(\\d{5})", "$1 $2 $3", ["[0-37-9]"]], ["(\\d)(\\d{3})(\\d{5,6})", "$1 $2 $3", ["6"]]], 0, 0, 0, 0, 0, 0, [0, ["6\\d{9}|[0-36-9]\\d{8}"]]], 882: ["882", 0, "[13]\\d{6}(?:\\d{2,5})?|[19]\\d{7}|(?:[25]\\d\\d|4)\\d{7}(?:\\d{2})?", [7, 8, 9, 10, 11, 12], [["(\\d{2})(\\d{5})", "$1 $2", ["16|342"]], ["(\\d{2})(\\d{6})", "$1 $2", ["49"]], ["(\\d{2})(\\d{2})(\\d{4})", "$1 $2 $3", ["1[36]|9"]], ["(\\d{2})(\\d{4})(\\d{3})", "$1 $2 $3", ["3[23]"]], ["(\\d{2})(\\d{3,4})(\\d{4})", "$1 $2 $3", ["16"]], ["(\\d{2})(\\d{4})(\\d{4})", "$1 $2 $3", ["10|23|3(?:[15]|4[57])|4|51"]], ["(\\d{3})(\\d{4})(\\d{4})", "$1 $2 $3", ["34"]], ["(\\d{2})(\\d{4,5})(\\d{5})", "$1 $2 $3", ["[1-35]"]]], 0, 0, 0, 0, 0, 0, [0, ["342\\d{4}|(?:337|49)\\d{6}|(?:3(?:2|47|7\\d{3})|50\\d{3})\\d{7}", [7, 8, 9, 10, 12]], 0, 0, 0, 0, 0, 0, ["1(?:3(?:0[0347]|[13][0139]|2[035]|4[013568]|6[0459]|7[06]|8[15-8]|9[0689])\\d{4}|6\\d{5,10})|(?:345\\d|9[89])\\d{6}|(?:10|2(?:3|85\\d)|3(?:[15]|[69]\\d\\d)|4[15-8]|51)\\d{8}"]]], 883: ["883", 0, "(?:[1-4]\\d|51)\\d{6,10}", [8, 9, 10, 11, 12], [["(\\d{3})(\\d{3})(\\d{2,8})", "$1 $2 $3", ["[14]|2[24-689]|3[02-689]|51[24-9]"]], ["(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3", ["510"]], ["(\\d{3})(\\d{3})(\\d{4})", "$1 $2 $3", ["21"]], ["(\\d{4})(\\d{4})(\\d{4})", "$1 $2 $3", ["51[13]"]], ["(\\d{3})(\\d{3})(\\d{3})(\\d{3})", "$1 $2 $3 $4", ["[235]"]]], 0, 0, 0, 0, 0, 0, [0, 0, 0, 0, 0, 0, 0, 0, ["(?:2(?:00\\d\\d|10)|(?:370[1-9]|51\\d0)\\d)\\d{7}|51(?:00\\d{5}|[24-9]0\\d{4,7})|(?:1[0-79]|2[24-689]|3[02-689]|4[0-4])0\\d{5,9}"]]], 888: ["888", 0, "\\d{11}", [11], [["(\\d{3})(\\d{3})(\\d{5})", "$1 $2 $3"]], 0, 0, 0, 0, 0, 0, [0, 0, 0, 0, 0, 0, ["\\d{11}"]]], 979: ["979", 0, "[1359]\\d{8}", [9], [["(\\d)(\\d{4})(\\d{4})", "$1 $2 $3", ["[1359]"]]], 0, 0, 0, 0, 0, 0, [0, 0, 0, ["[1359]\\d{8}"]]] } };
function _t(n, e) {
  var t = Array.prototype.slice.call(e);
  return t.push(St), n.apply(this, t);
}
function ue(n) {
  "@babel/helpers - typeof";
  return ue = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e) {
    return typeof e;
  } : function(e) {
    return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
  }, ue(n);
}
function ke(n, e) {
  for (var t = 0; t < e.length; t++) {
    var r = e[t];
    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(n, r.key, r);
  }
}
function Lt(n, e, t) {
  return e && ke(n.prototype, e), t && ke(n, t), Object.defineProperty(n, "prototype", { writable: !1 }), n;
}
function Nt(n, e) {
  if (!(n instanceof e))
    throw new TypeError("Cannot call a class as a function");
}
function Ot(n, e) {
  if (typeof e != "function" && e !== null)
    throw new TypeError("Super expression must either be null or a function");
  n.prototype = Object.create(e && e.prototype, { constructor: { value: n, writable: !0, configurable: !0 } }), Object.defineProperty(n, "prototype", { writable: !1 }), e && J(n, e);
}
function Ft(n) {
  var e = et();
  return function() {
    var r = Q(n), i;
    if (e) {
      var d = Q(this).constructor;
      i = Reflect.construct(r, arguments, d);
    } else
      i = r.apply(this, arguments);
    return At(this, i);
  };
}
function At(n, e) {
  if (e && (ue(e) === "object" || typeof e == "function"))
    return e;
  if (e !== void 0)
    throw new TypeError("Derived constructors may only return object or undefined");
  return Qe(n);
}
function Qe(n) {
  if (n === void 0)
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  return n;
}
function $e(n) {
  var e = typeof Map == "function" ? /* @__PURE__ */ new Map() : void 0;
  return $e = function(r) {
    if (r === null || !Dt(r))
      return r;
    if (typeof r != "function")
      throw new TypeError("Super expression must either be null or a function");
    if (typeof e < "u") {
      if (e.has(r))
        return e.get(r);
      e.set(r, i);
    }
    function i() {
      return re(r, arguments, Q(this).constructor);
    }
    return i.prototype = Object.create(r.prototype, { constructor: { value: i, enumerable: !1, writable: !0, configurable: !0 } }), J(i, r);
  }, $e(n);
}
function re(n, e, t) {
  return et() ? re = Reflect.construct : re = function(i, d, s) {
    var m = [null];
    m.push.apply(m, d);
    var u = Function.bind.apply(i, m), g = new u();
    return s && J(g, s.prototype), g;
  }, re.apply(null, arguments);
}
function et() {
  if (typeof Reflect > "u" || !Reflect.construct || Reflect.construct.sham)
    return !1;
  if (typeof Proxy == "function")
    return !0;
  try {
    return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function() {
    })), !0;
  } catch {
    return !1;
  }
}
function Dt(n) {
  return Function.toString.call(n).indexOf("[native code]") !== -1;
}
function J(n, e) {
  return J = Object.setPrototypeOf || function(r, i) {
    return r.__proto__ = i, r;
  }, J(n, e);
}
function Q(n) {
  return Q = Object.setPrototypeOf ? Object.getPrototypeOf : function(t) {
    return t.__proto__ || Object.getPrototypeOf(t);
  }, Q(n);
}
var j = /* @__PURE__ */ function(n) {
  Ot(t, n);
  var e = Ft(t);
  function t(r) {
    var i;
    return Nt(this, t), i = e.call(this, r), Object.setPrototypeOf(Qe(i), t.prototype), i.name = i.constructor.name, i;
  }
  return Lt(t);
}(/* @__PURE__ */ $e(Error)), ge = 2, Tt = 17, xt = 3, B = "0-9０-９٠-٩۰-۹", Bt = "-‐-―−ー－", Rt = "／/", Mt = "．.", qt = "  ­​⁠　", Ut = "()（）［］\\[\\]", Gt = "~⁓∼～", de = "".concat(Bt).concat(Rt).concat(Mt).concat(qt).concat(Ut).concat(Gt), ve = "+＋";
function Ie(n, e) {
  n = n.split("-"), e = e.split("-");
  for (var t = n[0].split("."), r = e[0].split("."), i = 0; i < 3; i++) {
    var d = Number(t[i]), s = Number(r[i]);
    if (d > s)
      return 1;
    if (s > d)
      return -1;
    if (!isNaN(d) && isNaN(s))
      return 1;
    if (isNaN(d) && !isNaN(s))
      return -1;
  }
  return n[1] && e[1] ? n[1] > e[1] ? 1 : n[1] < e[1] ? -1 : 0 : !n[1] && e[1] ? 1 : n[1] && !e[1] ? -1 : 0;
}
var jt = {}.constructor;
function ie(n) {
  return n != null && n.constructor === jt;
}
function fe(n) {
  "@babel/helpers - typeof";
  return fe = typeof Symbol == "function" && typeof Symbol.iterator == "symbol" ? function(e) {
    return typeof e;
  } : function(e) {
    return e && typeof Symbol == "function" && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
  }, fe(n);
}
function oe(n, e) {
  if (!(n instanceof e))
    throw new TypeError("Cannot call a class as a function");
}
function Ee(n, e) {
  for (var t = 0; t < e.length; t++) {
    var r = e[t];
    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(n, r.key, r);
  }
}
function se(n, e, t) {
  return e && Ee(n.prototype, e), t && Ee(n, t), Object.defineProperty(n, "prototype", { writable: !1 }), n;
}
var Wt = "1.2.0", zt = "1.7.35", Pe = " ext. ", Ht = /^\d+$/, N = /* @__PURE__ */ function() {
  function n(e) {
    oe(this, n), Xt(e), this.metadata = e, tt.call(this, e);
  }
  return se(n, [{
    key: "getCountries",
    value: function() {
      return Object.keys(this.metadata.countries).filter(function(t) {
        return t !== "001";
      });
    }
  }, {
    key: "getCountryMetadata",
    value: function(t) {
      return this.metadata.countries[t];
    }
  }, {
    key: "nonGeographic",
    value: function() {
      if (!(this.v1 || this.v2 || this.v3))
        return this.metadata.nonGeographic || this.metadata.nonGeographical;
    }
  }, {
    key: "hasCountry",
    value: function(t) {
      return this.getCountryMetadata(t) !== void 0;
    }
  }, {
    key: "hasCallingCode",
    value: function(t) {
      if (this.getCountryCodesForCallingCode(t))
        return !0;
      if (this.nonGeographic()) {
        if (this.nonGeographic()[t])
          return !0;
      } else {
        var r = this.countryCallingCodes()[t];
        if (r && r.length === 1 && r[0] === "001")
          return !0;
      }
    }
  }, {
    key: "isNonGeographicCallingCode",
    value: function(t) {
      return this.nonGeographic() ? !!this.nonGeographic()[t] : !this.getCountryCodesForCallingCode(t);
    }
    // Deprecated.
  }, {
    key: "country",
    value: function(t) {
      return this.selectNumberingPlan(t);
    }
  }, {
    key: "selectNumberingPlan",
    value: function(t, r) {
      if (t && Ht.test(t) && (r = t, t = null), t && t !== "001") {
        if (!this.hasCountry(t))
          throw new Error("Unknown country: ".concat(t));
        this.numberingPlan = new Se(this.getCountryMetadata(t), this);
      } else if (r) {
        if (!this.hasCallingCode(r))
          throw new Error("Unknown calling code: ".concat(r));
        this.numberingPlan = new Se(this.getNumberingPlanMetadata(r), this);
      } else
        this.numberingPlan = void 0;
      return this;
    }
  }, {
    key: "getCountryCodesForCallingCode",
    value: function(t) {
      var r = this.countryCallingCodes()[t];
      if (r)
        return r.length === 1 && r[0].length === 3 ? void 0 : r;
    }
  }, {
    key: "getCountryCodeForCallingCode",
    value: function(t) {
      var r = this.getCountryCodesForCallingCode(t);
      if (r)
        return r[0];
    }
  }, {
    key: "getNumberingPlanMetadata",
    value: function(t) {
      var r = this.getCountryCodeForCallingCode(t);
      if (r)
        return this.getCountryMetadata(r);
      if (this.nonGeographic()) {
        var i = this.nonGeographic()[t];
        if (i)
          return i;
      } else {
        var d = this.countryCallingCodes()[t];
        if (d && d.length === 1 && d[0] === "001")
          return this.metadata.countries["001"];
      }
    }
    // Deprecated.
  }, {
    key: "countryCallingCode",
    value: function() {
      return this.numberingPlan.callingCode();
    }
    // Deprecated.
  }, {
    key: "IDDPrefix",
    value: function() {
      return this.numberingPlan.IDDPrefix();
    }
    // Deprecated.
  }, {
    key: "defaultIDDPrefix",
    value: function() {
      return this.numberingPlan.defaultIDDPrefix();
    }
    // Deprecated.
  }, {
    key: "nationalNumberPattern",
    value: function() {
      return this.numberingPlan.nationalNumberPattern();
    }
    // Deprecated.
  }, {
    key: "possibleLengths",
    value: function() {
      return this.numberingPlan.possibleLengths();
    }
    // Deprecated.
  }, {
    key: "formats",
    value: function() {
      return this.numberingPlan.formats();
    }
    // Deprecated.
  }, {
    key: "nationalPrefixForParsing",
    value: function() {
      return this.numberingPlan.nationalPrefixForParsing();
    }
    // Deprecated.
  }, {
    key: "nationalPrefixTransformRule",
    value: function() {
      return this.numberingPlan.nationalPrefixTransformRule();
    }
    // Deprecated.
  }, {
    key: "leadingDigits",
    value: function() {
      return this.numberingPlan.leadingDigits();
    }
    // Deprecated.
  }, {
    key: "hasTypes",
    value: function() {
      return this.numberingPlan.hasTypes();
    }
    // Deprecated.
  }, {
    key: "type",
    value: function(t) {
      return this.numberingPlan.type(t);
    }
    // Deprecated.
  }, {
    key: "ext",
    value: function() {
      return this.numberingPlan.ext();
    }
  }, {
    key: "countryCallingCodes",
    value: function() {
      return this.v1 ? this.metadata.country_phone_code_to_countries : this.metadata.country_calling_codes;
    }
    // Deprecated.
  }, {
    key: "chooseCountryByCountryCallingCode",
    value: function(t) {
      return this.selectNumberingPlan(t);
    }
  }, {
    key: "hasSelectedNumberingPlan",
    value: function() {
      return this.numberingPlan !== void 0;
    }
  }]), n;
}(), Se = /* @__PURE__ */ function() {
  function n(e, t) {
    oe(this, n), this.globalMetadataObject = t, this.metadata = e, tt.call(this, t.metadata);
  }
  return se(n, [{
    key: "callingCode",
    value: function() {
      return this.metadata[0];
    }
    // Formatting information for regions which share
    // a country calling code is contained by only one region
    // for performance reasons. For example, for NANPA region
    // ("North American Numbering Plan Administration",
    //  which includes USA, Canada, Cayman Islands, Bahamas, etc)
    // it will be contained in the metadata for `US`.
  }, {
    key: "getDefaultCountryMetadataForRegion",
    value: function() {
      return this.globalMetadataObject.getNumberingPlanMetadata(this.callingCode());
    }
    // Is always present.
  }, {
    key: "IDDPrefix",
    value: function() {
      if (!(this.v1 || this.v2))
        return this.metadata[1];
    }
    // Is only present when a country supports multiple IDD prefixes.
  }, {
    key: "defaultIDDPrefix",
    value: function() {
      if (!(this.v1 || this.v2))
        return this.metadata[12];
    }
  }, {
    key: "nationalNumberPattern",
    value: function() {
      return this.v1 || this.v2 ? this.metadata[1] : this.metadata[2];
    }
    // "possible length" data is always present in Google's metadata.
  }, {
    key: "possibleLengths",
    value: function() {
      if (!this.v1)
        return this.metadata[this.v2 ? 2 : 3];
    }
  }, {
    key: "_getFormats",
    value: function(t) {
      return t[this.v1 ? 2 : this.v2 ? 3 : 4];
    }
    // For countries of the same region (e.g. NANPA)
    // formats are all stored in the "main" country for that region.
    // E.g. "RU" and "KZ", "US" and "CA".
  }, {
    key: "formats",
    value: function() {
      var t = this, r = this._getFormats(this.metadata) || this._getFormats(this.getDefaultCountryMetadataForRegion()) || [];
      return r.map(function(i) {
        return new Vt(i, t);
      });
    }
  }, {
    key: "nationalPrefix",
    value: function() {
      return this.metadata[this.v1 ? 3 : this.v2 ? 4 : 5];
    }
  }, {
    key: "_getNationalPrefixFormattingRule",
    value: function(t) {
      return t[this.v1 ? 4 : this.v2 ? 5 : 6];
    }
    // For countries of the same region (e.g. NANPA)
    // national prefix formatting rule is stored in the "main" country for that region.
    // E.g. "RU" and "KZ", "US" and "CA".
  }, {
    key: "nationalPrefixFormattingRule",
    value: function() {
      return this._getNationalPrefixFormattingRule(this.metadata) || this._getNationalPrefixFormattingRule(this.getDefaultCountryMetadataForRegion());
    }
  }, {
    key: "_nationalPrefixForParsing",
    value: function() {
      return this.metadata[this.v1 ? 5 : this.v2 ? 6 : 7];
    }
  }, {
    key: "nationalPrefixForParsing",
    value: function() {
      return this._nationalPrefixForParsing() || this.nationalPrefix();
    }
  }, {
    key: "nationalPrefixTransformRule",
    value: function() {
      return this.metadata[this.v1 ? 6 : this.v2 ? 7 : 8];
    }
  }, {
    key: "_getNationalPrefixIsOptionalWhenFormatting",
    value: function() {
      return !!this.metadata[this.v1 ? 7 : this.v2 ? 8 : 9];
    }
    // For countries of the same region (e.g. NANPA)
    // "national prefix is optional when formatting" flag is
    // stored in the "main" country for that region.
    // E.g. "RU" and "KZ", "US" and "CA".
  }, {
    key: "nationalPrefixIsOptionalWhenFormattingInNationalFormat",
    value: function() {
      return this._getNationalPrefixIsOptionalWhenFormatting(this.metadata) || this._getNationalPrefixIsOptionalWhenFormatting(this.getDefaultCountryMetadataForRegion());
    }
  }, {
    key: "leadingDigits",
    value: function() {
      return this.metadata[this.v1 ? 8 : this.v2 ? 9 : 10];
    }
  }, {
    key: "types",
    value: function() {
      return this.metadata[this.v1 ? 9 : this.v2 ? 10 : 11];
    }
  }, {
    key: "hasTypes",
    value: function() {
      return this.types() && this.types().length === 0 ? !1 : !!this.types();
    }
  }, {
    key: "type",
    value: function(t) {
      if (this.hasTypes() && _e(this.types(), t))
        return new Yt(_e(this.types(), t), this);
    }
  }, {
    key: "ext",
    value: function() {
      return this.v1 || this.v2 ? Pe : this.metadata[13] || Pe;
    }
  }]), n;
}(), Vt = /* @__PURE__ */ function() {
  function n(e, t) {
    oe(this, n), this._format = e, this.metadata = t;
  }
  return se(n, [{
    key: "pattern",
    value: function() {
      return this._format[0];
    }
  }, {
    key: "format",
    value: function() {
      return this._format[1];
    }
  }, {
    key: "leadingDigitsPatterns",
    value: function() {
      return this._format[2] || [];
    }
  }, {
    key: "nationalPrefixFormattingRule",
    value: function() {
      return this._format[3] || this.metadata.nationalPrefixFormattingRule();
    }
  }, {
    key: "nationalPrefixIsOptionalWhenFormattingInNationalFormat",
    value: function() {
      return !!this._format[4] || this.metadata.nationalPrefixIsOptionalWhenFormattingInNationalFormat();
    }
  }, {
    key: "nationalPrefixIsMandatoryWhenFormattingInNationalFormat",
    value: function() {
      return this.usesNationalPrefix() && !this.nationalPrefixIsOptionalWhenFormattingInNationalFormat();
    }
    // Checks whether national prefix formatting rule contains national prefix.
  }, {
    key: "usesNationalPrefix",
    value: function() {
      return !!(this.nationalPrefixFormattingRule() && // Check that national prefix formatting rule is not a "dummy" one.
      !Kt.test(this.nationalPrefixFormattingRule()));
    }
  }, {
    key: "internationalFormat",
    value: function() {
      return this._format[5] || this.format();
    }
  }]), n;
}(), Kt = /^\(?\$1\)?$/, Yt = /* @__PURE__ */ function() {
  function n(e, t) {
    oe(this, n), this.type = e, this.metadata = t;
  }
  return se(n, [{
    key: "pattern",
    value: function() {
      return this.metadata.v1 ? this.type : this.type[0];
    }
  }, {
    key: "possibleLengths",
    value: function() {
      if (!this.metadata.v1)
        return this.type[1] || this.metadata.possibleLengths();
    }
  }]), n;
}();
function _e(n, e) {
  switch (e) {
    case "FIXED_LINE":
      return n[0];
    case "MOBILE":
      return n[1];
    case "TOLL_FREE":
      return n[2];
    case "PREMIUM_RATE":
      return n[3];
    case "PERSONAL_NUMBER":
      return n[4];
    case "VOICEMAIL":
      return n[5];
    case "UAN":
      return n[6];
    case "PAGER":
      return n[7];
    case "VOIP":
      return n[8];
    case "SHARED_COST":
      return n[9];
  }
}
function Xt(n) {
  if (!n)
    throw new Error("[libphonenumber-js] `metadata` argument not passed. Check your arguments.");
  if (!ie(n) || !ie(n.countries))
    throw new Error("[libphonenumber-js] `metadata` argument was passed but it's not a valid metadata. Must be an object having `.countries` child object property. Got ".concat(ie(n) ? "an object of shape: { " + Object.keys(n).join(", ") + " }" : "a " + Zt(n) + ": " + n, "."));
}
var Zt = function(e) {
  return fe(e);
};
function be(n, e) {
  if (e = new N(e), e.hasCountry(n))
    return e.country(n).countryCallingCode();
  throw new Error("Unknown country: ".concat(n));
}
function Jt(n, e) {
  return e.countries.hasOwnProperty(n);
}
function tt(n) {
  var e = n.version;
  typeof e == "number" ? (this.v1 = e === 1, this.v2 = e === 2, this.v3 = e === 3, this.v4 = e === 4) : e ? Ie(e, Wt) === -1 ? this.v2 = !0 : Ie(e, zt) === -1 ? this.v3 = !0 : this.v4 = !0 : this.v1 = !0;
}
var Qt = ";ext=", K = function(e) {
  return "([".concat(B, "]{1,").concat(e, "})");
};
function nt(n) {
  var e = "20", t = "15", r = "9", i = "6", d = "[  \\t,]*", s = "[:\\.．]?[  \\t,-]*", m = "#?", u = "(?:e?xt(?:ensi(?:ó?|ó))?n?|ｅ?ｘｔｎ?|доб|anexo)", g = "(?:[xｘ#＃~～]|int|ｉｎｔ)", w = "[- ]+", O = "[  \\t]*", S = "(?:,{2}|;)", F = Qt + K(e), D = d + u + s + K(e) + m, v = d + g + s + K(r) + m, P = w + K(i) + "#", _ = O + S + s + K(t) + m, T = O + "(?:,)+" + s + K(r) + m;
  return F + "|" + D + "|" + v + "|" + P + "|" + _ + "|" + T;
}
var en = "[" + B + "]{" + ge + "}", tn = "[" + ve + "]{0,1}(?:[" + de + "]*[" + B + "]){3,}[" + de + B + "]*", nn = new RegExp("^[" + ve + "]{0,1}(?:[" + de + "]*[" + B + "]){1,2}$", "i"), rn = tn + // Phone number extensions
"(?:" + nt() + ")?", dn = new RegExp(
  // Either a short two-digit-only phone number
  "^" + en + "$|^" + rn + "$",
  "i"
);
function an(n) {
  return n.length >= ge && dn.test(n);
}
function on(n) {
  return nn.test(n);
}
var Le = new RegExp("(?:" + nt() + ")$", "i");
function sn(n) {
  var e = n.search(Le);
  if (e < 0)
    return {};
  for (var t = n.slice(0, e), r = n.match(Le), i = 1; i < r.length; ) {
    if (r[i])
      return {
        number: t,
        ext: r[i]
      };
    i++;
  }
}
var ln = {
  0: "0",
  1: "1",
  2: "2",
  3: "3",
  4: "4",
  5: "5",
  6: "6",
  7: "7",
  8: "8",
  9: "9",
  "０": "0",
  // Fullwidth digit 0
  "１": "1",
  // Fullwidth digit 1
  "２": "2",
  // Fullwidth digit 2
  "３": "3",
  // Fullwidth digit 3
  "４": "4",
  // Fullwidth digit 4
  "５": "5",
  // Fullwidth digit 5
  "６": "6",
  // Fullwidth digit 6
  "７": "7",
  // Fullwidth digit 7
  "８": "8",
  // Fullwidth digit 8
  "９": "9",
  // Fullwidth digit 9
  "٠": "0",
  // Arabic-indic digit 0
  "١": "1",
  // Arabic-indic digit 1
  "٢": "2",
  // Arabic-indic digit 2
  "٣": "3",
  // Arabic-indic digit 3
  "٤": "4",
  // Arabic-indic digit 4
  "٥": "5",
  // Arabic-indic digit 5
  "٦": "6",
  // Arabic-indic digit 6
  "٧": "7",
  // Arabic-indic digit 7
  "٨": "8",
  // Arabic-indic digit 8
  "٩": "9",
  // Arabic-indic digit 9
  "۰": "0",
  // Eastern-Arabic digit 0
  "۱": "1",
  // Eastern-Arabic digit 1
  "۲": "2",
  // Eastern-Arabic digit 2
  "۳": "3",
  // Eastern-Arabic digit 3
  "۴": "4",
  // Eastern-Arabic digit 4
  "۵": "5",
  // Eastern-Arabic digit 5
  "۶": "6",
  // Eastern-Arabic digit 6
  "۷": "7",
  // Eastern-Arabic digit 7
  "۸": "8",
  // Eastern-Arabic digit 8
  "۹": "9"
  // Eastern-Arabic digit 9
};
function cn(n) {
  return ln[n];
}
function un(n, e) {
  var t = typeof Symbol < "u" && n[Symbol.iterator] || n["@@iterator"];
  if (t)
    return (t = t.call(n)).next.bind(t);
  if (Array.isArray(n) || (t = $n(n)) || e && n && typeof n.length == "number") {
    t && (n = t);
    var r = 0;
    return function() {
      return r >= n.length ? { done: !0 } : { done: !1, value: n[r++] };
    };
  }
  throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function $n(n, e) {
  if (n) {
    if (typeof n == "string")
      return Ne(n, e);
    var t = Object.prototype.toString.call(n).slice(8, -1);
    if (t === "Object" && n.constructor && (t = n.constructor.name), t === "Map" || t === "Set")
      return Array.from(n);
    if (t === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t))
      return Ne(n, e);
  }
}
function Ne(n, e) {
  (e == null || e > n.length) && (e = n.length);
  for (var t = 0, r = new Array(e); t < e; t++)
    r[t] = n[t];
  return r;
}
function Oe(n) {
  for (var e = "", t = un(n.split("")), r; !(r = t()).done; ) {
    var i = r.value;
    e += fn(i, e) || "";
  }
  return e;
}
function fn(n, e) {
  return n === "+" ? e ? void 0 : "+" : cn(n);
}
function mn(n, e) {
  var t = typeof Symbol < "u" && n[Symbol.iterator] || n["@@iterator"];
  if (t)
    return (t = t.call(n)).next.bind(t);
  if (Array.isArray(n) || (t = pn(n)) || e && n && typeof n.length == "number") {
    t && (n = t);
    var r = 0;
    return function() {
      return r >= n.length ? { done: !0 } : { done: !1, value: n[r++] };
    };
  }
  throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function pn(n, e) {
  if (n) {
    if (typeof n == "string")
      return Fe(n, e);
    var t = Object.prototype.toString.call(n).slice(8, -1);
    if (t === "Object" && n.constructor && (t = n.constructor.name), t === "Map" || t === "Set")
      return Array.from(n);
    if (t === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t))
      return Fe(n, e);
  }
}
function Fe(n, e) {
  (e == null || e > n.length) && (e = n.length);
  for (var t = 0, r = new Array(e); t < e; t++)
    r[t] = n[t];
  return r;
}
function hn(n, e) {
  for (var t = n.slice(), r = mn(e), i; !(i = r()).done; ) {
    var d = i.value;
    n.indexOf(d) < 0 && t.push(d);
  }
  return t.sort(function(s, m) {
    return s - m;
  });
}
function Ce(n, e) {
  return rt(n, void 0, e);
}
function rt(n, e, t) {
  var r = t.type(e), i = r && r.possibleLengths() || t.possibleLengths();
  if (!i)
    return "IS_POSSIBLE";
  if (e === "FIXED_LINE_OR_MOBILE") {
    if (!t.type("FIXED_LINE"))
      return rt(n, "MOBILE", t);
    var d = t.type("MOBILE");
    d && (i = hn(i, d.possibleLengths()));
  } else if (e && !r)
    return "INVALID_LENGTH";
  var s = n.length, m = i[0];
  return m === s ? "IS_POSSIBLE" : m > s ? "TOO_SHORT" : i[i.length - 1] < s ? "TOO_LONG" : i.indexOf(s, 1) >= 0 ? "IS_POSSIBLE" : "INVALID_LENGTH";
}
function yn(n, e, t) {
  if (e === void 0 && (e = {}), t = new N(t), e.v2) {
    if (!n.countryCallingCode)
      throw new Error("Invalid phone number object passed");
    t.selectNumberingPlan(n.countryCallingCode);
  } else {
    if (!n.phone)
      return !1;
    if (n.country) {
      if (!t.hasCountry(n.country))
        throw new Error("Unknown country: ".concat(n.country));
      t.country(n.country);
    } else {
      if (!n.countryCallingCode)
        throw new Error("Invalid phone number object passed");
      t.selectNumberingPlan(n.countryCallingCode);
    }
  }
  if (t.possibleLengths())
    return it(n.phone || n.nationalNumber, t);
  if (n.countryCallingCode && t.isNonGeographicCallingCode(n.countryCallingCode))
    return !0;
  throw new Error('Missing "possibleLengths" in metadata. Perhaps the metadata has been generated before v1.0.18.');
}
function it(n, e) {
  switch (Ce(n, e)) {
    case "IS_POSSIBLE":
      return !0;
    default:
      return !1;
  }
}
function W(n, e) {
  return n = n || "", new RegExp("^(?:" + e + ")$").test(n);
}
function gn(n, e) {
  var t = typeof Symbol < "u" && n[Symbol.iterator] || n["@@iterator"];
  if (t)
    return (t = t.call(n)).next.bind(t);
  if (Array.isArray(n) || (t = vn(n)) || e && n && typeof n.length == "number") {
    t && (n = t);
    var r = 0;
    return function() {
      return r >= n.length ? { done: !0 } : { done: !1, value: n[r++] };
    };
  }
  throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function vn(n, e) {
  if (n) {
    if (typeof n == "string")
      return Ae(n, e);
    var t = Object.prototype.toString.call(n).slice(8, -1);
    if (t === "Object" && n.constructor && (t = n.constructor.name), t === "Map" || t === "Set")
      return Array.from(n);
    if (t === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t))
      return Ae(n, e);
  }
}
function Ae(n, e) {
  (e == null || e > n.length) && (e = n.length);
  for (var t = 0, r = new Array(e); t < e; t++)
    r[t] = n[t];
  return r;
}
var bn = ["MOBILE", "PREMIUM_RATE", "TOLL_FREE", "SHARED_COST", "VOIP", "PERSONAL_NUMBER", "PAGER", "UAN", "VOICEMAIL"];
function we(n, e, t) {
  if (e = e || {}, !(!n.country && !n.countryCallingCode)) {
    t = new N(t), t.selectNumberingPlan(n.country, n.countryCallingCode);
    var r = e.v2 ? n.nationalNumber : n.phone;
    if (W(r, t.nationalNumberPattern())) {
      if (le(r, "FIXED_LINE", t))
        return t.type("MOBILE") && t.type("MOBILE").pattern() === "" || !t.type("MOBILE") || le(r, "MOBILE", t) ? "FIXED_LINE_OR_MOBILE" : "FIXED_LINE";
      for (var i = gn(bn), d; !(d = i()).done; ) {
        var s = d.value;
        if (le(r, s, t))
          return s;
      }
    }
  }
}
function le(n, e, t) {
  return e = t.type(e), !e || !e.pattern() || e.possibleLengths() && e.possibleLengths().indexOf(n.length) < 0 ? !1 : W(n, e.pattern());
}
function Cn(n, e, t) {
  if (e = e || {}, t = new N(t), t.selectNumberingPlan(n.country, n.countryCallingCode), t.hasTypes())
    return we(n, e, t.metadata) !== void 0;
  var r = e.v2 ? n.nationalNumber : n.phone;
  return W(r, t.nationalNumberPattern());
}
function wn(n, e, t) {
  var r = new N(t), i = r.getCountryCodesForCallingCode(n);
  return i ? i.filter(function(d) {
    return kn(e, d, t);
  }) : [];
}
function kn(n, e, t) {
  var r = new N(t);
  return r.selectNumberingPlan(e), r.numberingPlan.possibleLengths().indexOf(n.length) >= 0;
}
function In(n) {
  return n.replace(new RegExp("[".concat(de, "]+"), "g"), " ").trim();
}
var En = /(\$\d)/;
function Pn(n, e, t) {
  var r = t.useInternationalFormat, i = t.withNationalPrefix;
  t.carrierCode, t.metadata;
  var d = n.replace(new RegExp(e.pattern()), r ? e.internationalFormat() : (
    // This library doesn't use `domestic_carrier_code_formatting_rule`,
    // because that one is only used when formatting phone numbers
    // for dialing from a mobile phone, and this is not a dialing library.
    // carrierCode && format.domesticCarrierCodeFormattingRule()
    // 	// First, replace the $CC in the formatting rule with the desired carrier code.
    // 	// Then, replace the $FG in the formatting rule with the first group
    // 	// and the carrier code combined in the appropriate way.
    // 	? format.format().replace(FIRST_GROUP_PATTERN, format.domesticCarrierCodeFormattingRule().replace('$CC', carrierCode))
    // 	: (
    // 		withNationalPrefix && format.nationalPrefixFormattingRule()
    // 			? format.format().replace(FIRST_GROUP_PATTERN, format.nationalPrefixFormattingRule())
    // 			: format.format()
    // 	)
    i && e.nationalPrefixFormattingRule() ? e.format().replace(En, e.nationalPrefixFormattingRule()) : e.format()
  ));
  return r ? In(d) : d;
}
var Sn = /^[\d]+(?:[~\u2053\u223C\uFF5E][\d]+)?$/;
function _n(n, e, t) {
  var r = new N(t);
  if (r.selectNumberingPlan(n, e), r.defaultIDDPrefix())
    return r.defaultIDDPrefix();
  if (Sn.test(r.IDDPrefix()))
    return r.IDDPrefix();
}
function Ln(n) {
  var e = n.number, t = n.ext;
  if (!e)
    return "";
  if (e[0] !== "+")
    throw new Error('"formatRFC3966()" expects "number" to be in E.164 format.');
  return "tel:".concat(e).concat(t ? ";ext=" + t : "");
}
function Nn(n, e) {
  var t = typeof Symbol < "u" && n[Symbol.iterator] || n["@@iterator"];
  if (t)
    return (t = t.call(n)).next.bind(t);
  if (Array.isArray(n) || (t = On(n)) || e && n && typeof n.length == "number") {
    t && (n = t);
    var r = 0;
    return function() {
      return r >= n.length ? { done: !0 } : { done: !1, value: n[r++] };
    };
  }
  throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function On(n, e) {
  if (n) {
    if (typeof n == "string")
      return De(n, e);
    var t = Object.prototype.toString.call(n).slice(8, -1);
    if (t === "Object" && n.constructor && (t = n.constructor.name), t === "Map" || t === "Set")
      return Array.from(n);
    if (t === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t))
      return De(n, e);
  }
}
function De(n, e) {
  (e == null || e > n.length) && (e = n.length);
  for (var t = 0, r = new Array(e); t < e; t++)
    r[t] = n[t];
  return r;
}
function Te(n, e) {
  var t = Object.keys(n);
  if (Object.getOwnPropertySymbols) {
    var r = Object.getOwnPropertySymbols(n);
    e && (r = r.filter(function(i) {
      return Object.getOwnPropertyDescriptor(n, i).enumerable;
    })), t.push.apply(t, r);
  }
  return t;
}
function xe(n) {
  for (var e = 1; e < arguments.length; e++) {
    var t = arguments[e] != null ? arguments[e] : {};
    e % 2 ? Te(Object(t), !0).forEach(function(r) {
      Fn(n, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(n, Object.getOwnPropertyDescriptors(t)) : Te(Object(t)).forEach(function(r) {
      Object.defineProperty(n, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return n;
}
function Fn(n, e, t) {
  return e in n ? Object.defineProperty(n, e, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : n[e] = t, n;
}
var Be = {
  formatExtension: function(e, t, r) {
    return "".concat(e).concat(r.ext()).concat(t);
  }
};
function An(n, e, t, r) {
  if (t ? t = xe(xe({}, Be), t) : t = Be, r = new N(r), n.country && n.country !== "001") {
    if (!r.hasCountry(n.country))
      throw new Error("Unknown country: ".concat(n.country));
    r.country(n.country);
  } else if (n.countryCallingCode)
    r.selectNumberingPlan(n.countryCallingCode);
  else
    return n.phone || "";
  var i = r.countryCallingCode(), d = t.v2 ? n.nationalNumber : n.phone, s;
  switch (e) {
    case "NATIONAL":
      return d ? (s = ae(d, n.carrierCode, "NATIONAL", r, t), ce(s, n.ext, r, t.formatExtension)) : "";
    case "INTERNATIONAL":
      return d ? (s = ae(d, null, "INTERNATIONAL", r, t), s = "+".concat(i, " ").concat(s), ce(s, n.ext, r, t.formatExtension)) : "+".concat(i);
    case "E.164":
      return "+".concat(i).concat(d);
    case "RFC3966":
      return Ln({
        number: "+".concat(i).concat(d),
        ext: n.ext
      });
    case "IDD":
      if (!t.fromCountry)
        return;
      var m = Tn(d, n.carrierCode, i, t.fromCountry, r);
      return ce(m, n.ext, r, t.formatExtension);
    default:
      throw new Error('Unknown "format" argument passed to "formatNumber()": "'.concat(e, '"'));
  }
}
function ae(n, e, t, r, i) {
  var d = Dn(r.formats(), n);
  return d ? Pn(n, d, {
    useInternationalFormat: t === "INTERNATIONAL",
    withNationalPrefix: !(d.nationalPrefixIsOptionalWhenFormattingInNationalFormat() && i && i.nationalPrefix === !1),
    carrierCode: e,
    metadata: r
  }) : n;
}
function Dn(n, e) {
  for (var t = Nn(n), r; !(r = t()).done; ) {
    var i = r.value;
    if (i.leadingDigitsPatterns().length > 0) {
      var d = i.leadingDigitsPatterns()[i.leadingDigitsPatterns().length - 1];
      if (e.search(d) !== 0)
        continue;
    }
    if (W(e, i.pattern()))
      return i;
  }
}
function ce(n, e, t, r) {
  return e ? r(n, e, t) : n;
}
function Tn(n, e, t, r, i) {
  var d = be(r, i.metadata);
  if (d === t) {
    var s = ae(n, e, "NATIONAL", i);
    return t === "1" ? t + " " + s : s;
  }
  var m = _n(r, void 0, i.metadata);
  if (m)
    return "".concat(m, " ").concat(t, " ").concat(ae(n, null, "INTERNATIONAL", i));
}
function Re(n, e) {
  var t = Object.keys(n);
  if (Object.getOwnPropertySymbols) {
    var r = Object.getOwnPropertySymbols(n);
    e && (r = r.filter(function(i) {
      return Object.getOwnPropertyDescriptor(n, i).enumerable;
    })), t.push.apply(t, r);
  }
  return t;
}
function Me(n) {
  for (var e = 1; e < arguments.length; e++) {
    var t = arguments[e] != null ? arguments[e] : {};
    e % 2 ? Re(Object(t), !0).forEach(function(r) {
      xn(n, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(n, Object.getOwnPropertyDescriptors(t)) : Re(Object(t)).forEach(function(r) {
      Object.defineProperty(n, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return n;
}
function xn(n, e, t) {
  return e in n ? Object.defineProperty(n, e, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : n[e] = t, n;
}
function Bn(n, e) {
  if (!(n instanceof e))
    throw new TypeError("Cannot call a class as a function");
}
function qe(n, e) {
  for (var t = 0; t < e.length; t++) {
    var r = e[t];
    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(n, r.key, r);
  }
}
function Rn(n, e, t) {
  return e && qe(n.prototype, e), t && qe(n, t), Object.defineProperty(n, "prototype", { writable: !1 }), n;
}
var Mn = /* @__PURE__ */ function() {
  function n(e, t, r) {
    if (Bn(this, n), !e)
      throw new TypeError("`country` or `countryCallingCode` not passed");
    if (!t)
      throw new TypeError("`nationalNumber` not passed");
    if (!r)
      throw new TypeError("`metadata` not passed");
    var i = Un(e, r), d = i.country, s = i.countryCallingCode;
    this.country = d, this.countryCallingCode = s, this.nationalNumber = t, this.number = "+" + this.countryCallingCode + this.nationalNumber, this.getMetadata = function() {
      return r;
    };
  }
  return Rn(n, [{
    key: "setExt",
    value: function(t) {
      this.ext = t;
    }
  }, {
    key: "getPossibleCountries",
    value: function() {
      return this.country ? [this.country] : wn(this.countryCallingCode, this.nationalNumber, this.getMetadata());
    }
  }, {
    key: "isPossible",
    value: function() {
      return yn(this, {
        v2: !0
      }, this.getMetadata());
    }
  }, {
    key: "isValid",
    value: function() {
      return Cn(this, {
        v2: !0
      }, this.getMetadata());
    }
  }, {
    key: "isNonGeographic",
    value: function() {
      var t = new N(this.getMetadata());
      return t.isNonGeographicCallingCode(this.countryCallingCode);
    }
  }, {
    key: "isEqual",
    value: function(t) {
      return this.number === t.number && this.ext === t.ext;
    }
    // This function was originally meant to be an equivalent for `validatePhoneNumberLength()`,
    // but later it was found out that it doesn't include the possible `TOO_SHORT` result
    // returned from `parsePhoneNumberWithError()` in the original `validatePhoneNumberLength()`,
    // so eventually I simply commented out this method from the `PhoneNumber` class
    // and just left the `validatePhoneNumberLength()` function, even though that one would require
    // and additional step to also validate the actual country / calling code of the phone number.
    // validateLength() {
    // 	const metadata = new Metadata(this.getMetadata())
    // 	metadata.selectNumberingPlan(this.countryCallingCode)
    // 	const result = checkNumberLength(this.nationalNumber, metadata)
    // 	if (result !== 'IS_POSSIBLE') {
    // 		return result
    // 	}
    // }
  }, {
    key: "getType",
    value: function() {
      return we(this, {
        v2: !0
      }, this.getMetadata());
    }
  }, {
    key: "format",
    value: function(t, r) {
      return An(this, t, r ? Me(Me({}, r), {}, {
        v2: !0
      }) : {
        v2: !0
      }, this.getMetadata());
    }
  }, {
    key: "formatNational",
    value: function(t) {
      return this.format("NATIONAL", t);
    }
  }, {
    key: "formatInternational",
    value: function(t) {
      return this.format("INTERNATIONAL", t);
    }
  }, {
    key: "getURI",
    value: function(t) {
      return this.format("RFC3966", t);
    }
  }]), n;
}(), qn = function(e) {
  return /^[A-Z]{2}$/.test(e);
};
function Un(n, e) {
  var t, r, i = new N(e);
  return qn(n) ? (t = n, i.selectNumberingPlan(t), r = i.countryCallingCode()) : r = n, {
    country: t,
    countryCallingCode: r
  };
}
var Gn = new RegExp("([" + B + "])");
function jn(n, e, t, r) {
  if (e) {
    var i = new N(r);
    i.selectNumberingPlan(e, t);
    var d = new RegExp(i.IDDPrefix());
    if (n.search(d) === 0) {
      n = n.slice(n.match(d)[0].length);
      var s = n.match(Gn);
      if (!(s && s[1] != null && s[1].length > 0 && s[1] === "0"))
        return n;
    }
  }
}
function Wn(n, e) {
  if (n && e.numberingPlan.nationalPrefixForParsing()) {
    var t = new RegExp("^(?:" + e.numberingPlan.nationalPrefixForParsing() + ")"), r = t.exec(n);
    if (r) {
      var i, d, s = r.length - 1, m = s > 0 && r[s];
      if (e.nationalPrefixTransformRule() && m)
        i = n.replace(t, e.nationalPrefixTransformRule()), s > 1 && (d = r[1]);
      else {
        var u = r[0];
        i = n.slice(u.length), m && (d = r[1]);
      }
      var g;
      if (m) {
        var w = n.indexOf(r[1]), O = n.slice(0, w);
        O === e.numberingPlan.nationalPrefix() && (g = e.numberingPlan.nationalPrefix());
      } else
        g = r[0];
      return {
        nationalNumber: i,
        nationalPrefix: g,
        carrierCode: d
      };
    }
  }
  return {
    nationalNumber: n
  };
}
function me(n, e) {
  var t = Wn(n, e), r = t.carrierCode, i = t.nationalNumber;
  if (i !== n) {
    if (!zn(n, i, e))
      return {
        nationalNumber: n
      };
    if (e.possibleLengths() && !Hn(i, e))
      return {
        nationalNumber: n
      };
  }
  return {
    nationalNumber: i,
    carrierCode: r
  };
}
function zn(n, e, t) {
  return !(W(n, t.nationalNumberPattern()) && !W(e, t.nationalNumberPattern()));
}
function Hn(n, e) {
  switch (Ce(n, e)) {
    case "TOO_SHORT":
    case "INVALID_LENGTH":
      return !1;
    default:
      return !0;
  }
}
function Vn(n, e, t, r) {
  var i = e ? be(e, r) : t;
  if (n.indexOf(i) === 0) {
    r = new N(r), r.selectNumberingPlan(e, t);
    var d = n.slice(i.length), s = me(d, r), m = s.nationalNumber, u = me(n, r), g = u.nationalNumber;
    if (!W(g, r.nationalNumberPattern()) && W(m, r.nationalNumberPattern()) || Ce(g, r) === "TOO_LONG")
      return {
        countryCallingCode: i,
        number: d
      };
  }
  return {
    number: n
  };
}
function Kn(n, e, t, r) {
  if (!n)
    return {};
  var i;
  if (n[0] !== "+") {
    var d = jn(n, e, t, r);
    if (d && d !== n)
      i = !0, n = "+" + d;
    else {
      if (e || t) {
        var s = Vn(n, e, t, r), m = s.countryCallingCode, u = s.number;
        if (m)
          return {
            countryCallingCodeSource: "FROM_NUMBER_WITHOUT_PLUS_SIGN",
            countryCallingCode: m,
            number: u
          };
      }
      return {
        // No need to set it to `UNSPECIFIED`. It can be just `undefined`.
        // countryCallingCodeSource: 'UNSPECIFIED',
        number: n
      };
    }
  }
  if (n[1] === "0")
    return {};
  r = new N(r);
  for (var g = 2; g - 1 <= xt && g <= n.length; ) {
    var w = n.slice(1, g);
    if (r.hasCallingCode(w))
      return r.selectNumberingPlan(w), {
        countryCallingCodeSource: i ? "FROM_NUMBER_WITH_IDD" : "FROM_NUMBER_WITH_PLUS_SIGN",
        countryCallingCode: w,
        number: n.slice(g)
      };
    g++;
  }
  return {};
}
function Yn(n, e) {
  var t = typeof Symbol < "u" && n[Symbol.iterator] || n["@@iterator"];
  if (t)
    return (t = t.call(n)).next.bind(t);
  if (Array.isArray(n) || (t = Xn(n)) || e && n && typeof n.length == "number") {
    t && (n = t);
    var r = 0;
    return function() {
      return r >= n.length ? { done: !0 } : { done: !1, value: n[r++] };
    };
  }
  throw new TypeError(`Invalid attempt to iterate non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function Xn(n, e) {
  if (n) {
    if (typeof n == "string")
      return Ue(n, e);
    var t = Object.prototype.toString.call(n).slice(8, -1);
    if (t === "Object" && n.constructor && (t = n.constructor.name), t === "Map" || t === "Set")
      return Array.from(n);
    if (t === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t))
      return Ue(n, e);
  }
}
function Ue(n, e) {
  (e == null || e > n.length) && (e = n.length);
  for (var t = 0, r = new Array(e); t < e; t++)
    r[t] = n[t];
  return r;
}
function Zn(n, e) {
  var t = e.countries, r = e.defaultCountry, i = e.metadata;
  i = new N(i);
  for (var d = [], s = Yn(t), m; !(m = s()).done; ) {
    var u = m.value;
    if (i.country(u), i.leadingDigits()) {
      if (n && n.search(i.leadingDigits()) === 0)
        return u;
    } else if (we({
      phone: n,
      country: u
    }, void 0, i.metadata))
      if (r) {
        if (u === r)
          return u;
        d.push(u);
      } else
        return u;
  }
  if (d.length > 0)
    return d[0];
}
var Jn = !1;
function Qn(n, e) {
  var t = e.nationalNumber, r = e.defaultCountry, i = e.metadata;
  if (Jn && i.isNonGeographicCallingCode(n))
    return "001";
  var d = i.getCountryCodesForCallingCode(n);
  if (d)
    return d.length === 1 ? d[0] : Zn(t, {
      countries: d,
      defaultCountry: r,
      metadata: i.metadata
    });
}
var dt = "+", er = "[\\-\\.\\(\\)]?", Ge = "([" + B + "]|" + er + ")", tr = "^\\" + dt + Ge + "*[" + B + "]" + Ge + "*$", nr = new RegExp(tr, "g"), pe = B, rr = "[" + pe + "]+((\\-)*[" + pe + "])*", ir = "a-zA-Z", dr = "[" + ir + "]+((\\-)*[" + pe + "])*", ar = "^(" + rr + "\\.)*" + dr + "\\.?$", or = new RegExp(ar, "g"), je = "tel:", he = ";phone-context=", sr = ";isub=";
function lr(n) {
  var e = n.indexOf(he);
  if (e < 0)
    return null;
  var t = e + he.length;
  if (t >= n.length)
    return "";
  var r = n.indexOf(";", t);
  return r >= 0 ? n.substring(t, r) : n.substring(t);
}
function cr(n) {
  return n === null ? !0 : n.length === 0 ? !1 : nr.test(n) || or.test(n);
}
function ur(n, e) {
  var t = e.extractFormattedPhoneNumber, r = lr(n);
  if (!cr(r))
    throw new j("NOT_A_NUMBER");
  var i;
  if (r === null)
    i = t(n) || "";
  else {
    i = "", r.charAt(0) === dt && (i += r);
    var d = n.indexOf(je), s;
    d >= 0 ? s = d + je.length : s = 0;
    var m = n.indexOf(he);
    i += n.substring(s, m);
  }
  var u = i.indexOf(sr);
  if (u > 0 && (i = i.substring(0, u)), i !== "")
    return i;
}
var $r = 250, fr = new RegExp("[" + ve + B + "]"), mr = new RegExp("[^" + B + "#]+$");
function pr(n, e, t) {
  if (e = e || {}, t = new N(t), e.defaultCountry && !t.hasCountry(e.defaultCountry))
    throw e.v2 ? new j("INVALID_COUNTRY") : new Error("Unknown country: ".concat(e.defaultCountry));
  var r = yr(n, e.v2, e.extract), i = r.number, d = r.ext, s = r.error;
  if (!i) {
    if (e.v2)
      throw s === "TOO_SHORT" ? new j("TOO_SHORT") : new j("NOT_A_NUMBER");
    return {};
  }
  var m = vr(i, e.defaultCountry, e.defaultCallingCode, t), u = m.country, g = m.nationalNumber, w = m.countryCallingCode, O = m.countryCallingCodeSource, S = m.carrierCode;
  if (!t.hasSelectedNumberingPlan()) {
    if (e.v2)
      throw new j("INVALID_COUNTRY");
    return {};
  }
  if (!g || g.length < ge) {
    if (e.v2)
      throw new j("TOO_SHORT");
    return {};
  }
  if (g.length > Tt) {
    if (e.v2)
      throw new j("TOO_LONG");
    return {};
  }
  if (e.v2) {
    var F = new Mn(w, g, t.metadata);
    return u && (F.country = u), S && (F.carrierCode = S), d && (F.ext = d), F.__countryCallingCodeSource = O, F;
  }
  var D = (e.extended ? t.hasSelectedNumberingPlan() : u) ? W(g, t.nationalNumberPattern()) : !1;
  return e.extended ? {
    country: u,
    countryCallingCode: w,
    carrierCode: S,
    valid: D,
    possible: D ? !0 : !!(e.extended === !0 && t.possibleLengths() && it(g, t)),
    phone: g,
    ext: d
  } : D ? gr(u, g, d) : {};
}
function hr(n, e, t) {
  if (n) {
    if (n.length > $r) {
      if (t)
        throw new j("TOO_LONG");
      return;
    }
    if (e === !1)
      return n;
    var r = n.search(fr);
    if (!(r < 0))
      return n.slice(r).replace(mr, "");
  }
}
function yr(n, e, t) {
  var r = ur(n, {
    extractFormattedPhoneNumber: function(s) {
      return hr(s, t, e);
    }
  });
  if (!r)
    return {};
  if (!an(r))
    return on(r) ? {
      error: "TOO_SHORT"
    } : {};
  var i = sn(r);
  return i.ext ? i : {
    number: r
  };
}
function gr(n, e, t) {
  var r = {
    country: n,
    phone: e
  };
  return t && (r.ext = t), r;
}
function vr(n, e, t, r) {
  var i = Kn(Oe(n), e, t, r.metadata), d = i.countryCallingCodeSource, s = i.countryCallingCode, m = i.number, u;
  if (s)
    r.selectNumberingPlan(s);
  else if (m && (e || t))
    r.selectNumberingPlan(e, t), e && (u = e), s = t || be(e, r.metadata);
  else
    return {};
  if (!m)
    return {
      countryCallingCodeSource: d,
      countryCallingCode: s
    };
  var g = me(Oe(m), r), w = g.nationalNumber, O = g.carrierCode, S = Qn(s, {
    nationalNumber: w,
    defaultCountry: e,
    metadata: r
  });
  return S && (u = S, S === "001" || r.country(u)), {
    country: u,
    countryCallingCode: s,
    countryCallingCodeSource: d,
    nationalNumber: w,
    carrierCode: O
  };
}
function We(n, e) {
  var t = Object.keys(n);
  if (Object.getOwnPropertySymbols) {
    var r = Object.getOwnPropertySymbols(n);
    e && (r = r.filter(function(i) {
      return Object.getOwnPropertyDescriptor(n, i).enumerable;
    })), t.push.apply(t, r);
  }
  return t;
}
function ze(n) {
  for (var e = 1; e < arguments.length; e++) {
    var t = arguments[e] != null ? arguments[e] : {};
    e % 2 ? We(Object(t), !0).forEach(function(r) {
      br(n, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(n, Object.getOwnPropertyDescriptors(t)) : We(Object(t)).forEach(function(r) {
      Object.defineProperty(n, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return n;
}
function br(n, e, t) {
  return e in n ? Object.defineProperty(n, e, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : n[e] = t, n;
}
function Cr(n, e, t) {
  return pr(n, ze(ze({}, e), {}, {
    v2: !0
  }), t);
}
function He(n, e) {
  var t = Object.keys(n);
  if (Object.getOwnPropertySymbols) {
    var r = Object.getOwnPropertySymbols(n);
    e && (r = r.filter(function(i) {
      return Object.getOwnPropertyDescriptor(n, i).enumerable;
    })), t.push.apply(t, r);
  }
  return t;
}
function wr(n) {
  for (var e = 1; e < arguments.length; e++) {
    var t = arguments[e] != null ? arguments[e] : {};
    e % 2 ? He(Object(t), !0).forEach(function(r) {
      kr(n, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(n, Object.getOwnPropertyDescriptors(t)) : He(Object(t)).forEach(function(r) {
      Object.defineProperty(n, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return n;
}
function kr(n, e, t) {
  return e in n ? Object.defineProperty(n, e, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : n[e] = t, n;
}
function Ir(n, e) {
  return _r(n) || Sr(n, e) || Pr(n, e) || Er();
}
function Er() {
  throw new TypeError(`Invalid attempt to destructure non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`);
}
function Pr(n, e) {
  if (n) {
    if (typeof n == "string")
      return Ve(n, e);
    var t = Object.prototype.toString.call(n).slice(8, -1);
    if (t === "Object" && n.constructor && (t = n.constructor.name), t === "Map" || t === "Set")
      return Array.from(n);
    if (t === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t))
      return Ve(n, e);
  }
}
function Ve(n, e) {
  (e == null || e > n.length) && (e = n.length);
  for (var t = 0, r = new Array(e); t < e; t++)
    r[t] = n[t];
  return r;
}
function Sr(n, e) {
  var t = n == null ? null : typeof Symbol < "u" && n[Symbol.iterator] || n["@@iterator"];
  if (t != null) {
    var r = [], i = !0, d = !1, s, m;
    try {
      for (t = t.call(n); !(i = (s = t.next()).done) && (r.push(s.value), !(e && r.length === e)); i = !0)
        ;
    } catch (u) {
      d = !0, m = u;
    } finally {
      try {
        !i && t.return != null && t.return();
      } finally {
        if (d)
          throw m;
      }
    }
    return r;
  }
}
function _r(n) {
  if (Array.isArray(n))
    return n;
}
function Lr(n) {
  var e = Array.prototype.slice.call(n), t = Ir(e, 4), r = t[0], i = t[1], d = t[2], s = t[3], m, u, g;
  if (typeof r == "string")
    m = r;
  else
    throw new TypeError("A text for parsing must be a string.");
  if (!i || typeof i == "string")
    s ? (u = d, g = s) : (u = void 0, g = d), i && (u = wr({
      defaultCountry: i
    }, u));
  else if (ie(i))
    d ? (u = i, g = d) : g = i;
  else
    throw new Error("Invalid second argument: ".concat(i));
  return {
    text: m,
    options: u,
    metadata: g
  };
}
function Ke(n, e) {
  var t = Object.keys(n);
  if (Object.getOwnPropertySymbols) {
    var r = Object.getOwnPropertySymbols(n);
    e && (r = r.filter(function(i) {
      return Object.getOwnPropertyDescriptor(n, i).enumerable;
    })), t.push.apply(t, r);
  }
  return t;
}
function Ye(n) {
  for (var e = 1; e < arguments.length; e++) {
    var t = arguments[e] != null ? arguments[e] : {};
    e % 2 ? Ke(Object(t), !0).forEach(function(r) {
      Nr(n, r, t[r]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(n, Object.getOwnPropertyDescriptors(t)) : Ke(Object(t)).forEach(function(r) {
      Object.defineProperty(n, r, Object.getOwnPropertyDescriptor(t, r));
    });
  }
  return n;
}
function Nr(n, e, t) {
  return e in n ? Object.defineProperty(n, e, { value: t, enumerable: !0, configurable: !0, writable: !0 }) : n[e] = t, n;
}
function Or(n, e, t) {
  e && e.defaultCountry && !Jt(e.defaultCountry, t) && (e = Ye(Ye({}, e), {}, {
    defaultCountry: void 0
  }));
  try {
    return Cr(n, e, t);
  } catch (r) {
    if (!(r instanceof j))
      throw r;
  }
}
function Fr() {
  var n = Lr(arguments), e = n.text, t = n.options, r = n.metadata;
  return Or(e, t, r);
}
function ee() {
  return _t(Fr, arguments);
}
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const Xe = new ye(), Ar = async (n, e, t, r) => {
  const i = await at(), d = await xr(
    n,
    e,
    i.amount,
    i.currency
  ), s = document.querySelector(".dcf-iframe").contentWindow, m = {
    transactionAmount: i.amount,
    transactionCurrencyCode: i.currency
  }, u = await Tr();
  return console.debug("Click to Pay - started paying with card"), r ? await Xe.payWithCard(
    d,
    m,
    r,
    s,
    t,
    u,
    {
      transactionAmount: {
        transactionAmount: Number(i.amount),
        transactionCurrencyCode: i.currency
      },
      dpaBillingPreference: "NONE",
      threeDsPreference: "NONE",
      confirmPayment: !1
    }
  ) : await Xe.payWithNewCard(
    d,
    m,
    s,
    t,
    u,
    {
      transactionAmount: {
        transactionAmount: Number(i.amount),
        transactionCurrencyCode: i.currency
      },
      dpaBillingPreference: "FULL",
      threeDsPreference: "NONE",
      confirmPayment: !1
    }
  );
}, Dr = () => new Promise((n) => {
  const e = document.querySelector(".dcf-content iframe"), t = document.querySelector(".loader");
  e.onload = () => {
    t.style.display = "none", $(".dcf-iframe")[0].style.display = "block", n();
  };
}), Tr = async () => {
  let n;
  if (clicktopay.isOnePageCheckout)
    return await $.ajax({
      type: "GET",
      url: clicktopay.customer_information_url,
      data: {
        action: "GetCustomerInformation",
        ajax: !0
      }
    }).success(function(r) {
      var i = $.parseJSON(r);
      const d = ee(i.shippingAddress.phoneNumber), s = d && d.isValid();
      n = {
        firstName: i.customer.firstName,
        lastName: i.customer.lastName,
        email: i.customer.email,
        consumerMobileNumber: s ? {
          countryCode: d.countryCallingCode,
          phoneNumber: d.nationalNumber
        } : null,
        billingAddress: {
          line1: i.billingAddress.line1,
          line2: i.billingAddress.line2,
          city: i.billingAddress.city,
          state: i.billingAddress.state,
          countryCode: i.billingAddress.countryCode,
          zip: i.billingAddress.zip
        },
        shippingAddress: {
          line1: i.shippingAddress.line1,
          line2: i.shippingAddress.line2,
          city: i.shippingAddress.city,
          state: i.shippingAddress.state,
          countryCode: i.shippingAddress.countryCode,
          zip: i.shippingAddress.zip
        }
      };
    }).error(function(r) {
      console.error(r), C.displayError(
        clicktopay.errors.somethingWentWrong.title,
        clicktopay.errors.somethingWentWrong.message,
        clicktopay.errors.somethingWentWrong.btn,
        () => {
          clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
        }
      );
    }), n;
  const e = ee(clicktopay.customer.phone_number), t = e && e.isValid();
  return {
    firstName: clicktopay.customer.firstName,
    lastName: clicktopay.customer.lastName,
    email: clicktopay.customer.email,
    consumerMobileNumber: t ? {
      countryCode: e.countryCallingCode,
      phoneNumber: e.nationalNumber
    } : null,
    billingAddress: {
      line1: clicktopay.customer.billingAddress.line1,
      line2: clicktopay.customer.billingAddress.line2,
      city: clicktopay.customer.billingAddress.city,
      state: clicktopay.customer.billingAddress.state,
      countryCode: clicktopay.customer.billingAddress.countryCode,
      zip: clicktopay.customer.billingAddress.zip
    },
    shippingAddress: {
      line1: clicktopay.customer.shippingAddress.line1,
      line2: clicktopay.customer.shippingAddress.line2,
      city: clicktopay.customer.shippingAddress.city,
      state: clicktopay.customer.shippingAddress.state,
      countryCode: clicktopay.customer.shippingAddress.countryCode,
      zip: clicktopay.customer.shippingAddress.zip
    }
  };
}, xr = async (n, e, t, r) => {
  let i;
  return await $.ajax({
    type: "POST",
    url: clicktopay.signUrl,
    data: {
      partner_id: clicktopay.partnerId,
      correlation_id: e,
      amount: t,
      currency_code: r,
      nonce: n
    }
  }).done(function(d) {
    var s = $.parseJSON(d);
    i = s.data.signedData;
  }).error(function(d) {
    console.log(d);
  }), i;
}, at = async () => {
  let n;
  return await $.ajax({
    type: "GET",
    url: clicktopay.get_order_details_url,
    async: !1,
    success: function(e) {
      n = JSON.parse(e);
    },
    error: function(e) {
      console.log(e);
    }
  }), n.data.order_details;
}, z = { pay: Ar, getOrderDetails: at, handleIframeLoad: Dr };
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const b = {
  None: "None",
  CardList: "CardList",
  CardForm: "CardForm",
  IdLookupForm: "IdLookupForm",
  OtpForm: "OtpForm"
};
let G = null;
const Y = new ye(), ne = {
  [b.IdLookupForm]: {
    onEnter: async function(n) {
      document.getElementById("clicktopay-card-input-form").classList.remove("active"), document.getElementById("clicktopay-id-lookup-form").classList.add("active");
    },
    onExit: async function(n) {
      document.getElementById("clicktopay-id-lookup-form").classList.remove("active"), document.querySelector(".id-lookup-form-group").classList.remove("error"), document.getElementsByName("id-lookup-input")[0].value = "";
    }
  },
  [b.CardForm]: {
    onEnter: async function(n) {
      document.getElementById("otp-form").classList.remove("active"), document.getElementById("clicktopay-card-input-form").classList.add("active"), document.querySelector('[data-module-name*="clicktopay"]:checked') && document.getElementById("mc_isv_payment_form").childNodes.length === 0 && await Y.createCardEntryForm(), n.cards && n.cards.length > 0 ? (document.getElementById("card-input-access-your-saved-cards-button").classList.remove("d-hidden"), document.getElementById("card-input-access-your-cards-button").classList.add("d-hidden")) : (document.getElementById("card-input-access-your-cards-button").classList.remove("d-hidden"), document.getElementById("card-input-access-your-saved-cards-button").classList.add("d-hidden")), document.getElementById("card-input-access-your-cards-step").classList.remove("ps-hidden");
    },
    onExit: async function(n) {
      document.getElementById("clicktopay-card-input-form").classList.remove("active"), document.getElementById("mc_isv_payment_form").innerHTML = "", await Y.clearCardForm();
    }
  },
  [b.OtpForm]: {
    onEnter: async function(n) {
      var t, r;
      if (n.isRecognizedUser ? document.getElementById("otp-form").classList.add("active") : await C.toggleLoader(!0), window.allow_otp = !0, !document.querySelector('[data-module-name*="clicktopay"]:checked'))
        return;
      const e = await Y.initiateValidationForOTP(
        "",
        !0,
        n.otpConfig
      );
      if ((t = document.getElementById("mc-isv-src-otp-input")) == null || t.style.setProperty(
        "--src-otp-input-content-container-margin-bottom",
        "0px"
      ), (r = document.getElementById("mc-isv-src-otp-input")) == null || r.style.setProperty("--src-main-margin-bottom-md", "0px"), n.isRecognizedUser || setTimeout(async () => {
        await C.toggleLoader(!1), document.getElementById("otp-form").classList.add("active");
      }, 1e3), e && e.Errors) {
        C.displayError(
          clicktopay.errors.somethingWentWrong.title,
          clicktopay.errors.somethingWentWrong.message,
          clicktopay.errors.somethingWentWrong.btn
        ), clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
        return;
      }
      document.querySelector("src-otp-input").setAttribute("display-cancel-option", "false"), document.querySelector("src-otp-input").setAttribute("auto-submit", "false");
    },
    onExit: async function(n) {
      document.getElementById("otp-form").classList.remove("active");
    }
  },
  [b.CardList]: {
    onEnter: async function(n) {
      var t;
      document.getElementById("otp-form").classList.remove("active"), document.getElementById("clicktopay-card-list").classList.add("active"), n.cards.length > 1 && (document.getElementById("card-list-not-you-button").innerHTML = clicktopay.translations.notYourCards), n.cards.length === 1 && (document.getElementById("card-list-not-you-button").innerHTML = clicktopay.translations.notYourCard), document.querySelector(".card-list-not-you-button-container").classList.remove("d-hidden");
      const e = async function() {
        const r = document.querySelector(
          ".card-list-dropdown-content-card-option.selected"
        );
        if (r) {
          const i = r.getAttribute("data-id"), d = await z.getOrderDetails();
          await Y.selectCardForRecognizedUser(
            i,
            d.amount,
            d.currency
          );
        }
      };
      parseInt(
        document.getElementById("card-list-dropdown").getAttribute("data-initialized")
      ) || await Z.create(n.cards, null, e), E.get("customer-entered-address-manually") || (t = document.getElementById("clicktopay-card-list-shipping-address")) == null || t.classList.remove("ps-hidden"), n.cvvRequired && await Y.createCVVEntryForm(clicktopay.locale), await e();
    },
    onExit: async function(n) {
      document.getElementById("clicktopay-card-list").classList.remove("active"), document.querySelector(".card-list-not-you-button-container").classList.add("d-hidden"), document.getElementById("card-list-not-you-button").innerHTML = "", n.cvvRequired && await Y.clearCVVForm();
    }
  }
}, Br = async (n, e) => {
  G && ne[G] && (await C.toggleLoader(!0), await ne[G].onExit(e[G])), G = n, ne[G] && (await C.toggleLoader(!1), await ne[G].onEnter(e[G]));
}, Rr = () => G, Ze = { setState: Br, getState: Rr };
function Mr(n) {
  return n && n.__esModule && Object.prototype.hasOwnProperty.call(n, "default") ? n.default : n;
}
var ot = { exports: {} };
(function(n) {
  (function(e) {
    n.exports ? n.exports = e() : window.intlTelInput = e();
  })(function(e) {
    return function() {
      for (var t = [["Afghanistan (‫افغانستان‬‎)", "af", "93"], ["Albania (Shqipëri)", "al", "355"], ["Algeria (‫الجزائر‬‎)", "dz", "213"], ["American Samoa", "as", "1", 5, ["684"]], ["Andorra", "ad", "376"], ["Angola", "ao", "244"], ["Anguilla", "ai", "1", 6, ["264"]], ["Antigua and Barbuda", "ag", "1", 7, ["268"]], ["Argentina", "ar", "54"], ["Armenia (Հայաստան)", "am", "374"], ["Aruba", "aw", "297"], ["Ascension Island", "ac", "247"], ["Australia", "au", "61", 0], ["Austria (Österreich)", "at", "43"], ["Azerbaijan (Azərbaycan)", "az", "994"], ["Bahamas", "bs", "1", 8, ["242"]], ["Bahrain (‫البحرين‬‎)", "bh", "973"], ["Bangladesh (বাংলাদেশ)", "bd", "880"], ["Barbados", "bb", "1", 9, ["246"]], ["Belarus (Беларусь)", "by", "375"], ["Belgium (België)", "be", "32"], ["Belize", "bz", "501"], ["Benin (Bénin)", "bj", "229"], ["Bermuda", "bm", "1", 10, ["441"]], ["Bhutan (འབྲུག)", "bt", "975"], ["Bolivia", "bo", "591"], ["Bosnia and Herzegovina (Босна и Херцеговина)", "ba", "387"], ["Botswana", "bw", "267"], ["Brazil (Brasil)", "br", "55"], ["British Indian Ocean Territory", "io", "246"], ["British Virgin Islands", "vg", "1", 11, ["284"]], ["Brunei", "bn", "673"], ["Bulgaria (България)", "bg", "359"], ["Burkina Faso", "bf", "226"], ["Burundi (Uburundi)", "bi", "257"], ["Cambodia (កម្ពុជា)", "kh", "855"], ["Cameroon (Cameroun)", "cm", "237"], ["Canada", "ca", "1", 1, ["204", "226", "236", "249", "250", "263", "289", "306", "343", "354", "365", "367", "368", "382", "387", "403", "416", "418", "428", "431", "437", "438", "450", "584", "468", "474", "506", "514", "519", "548", "579", "581", "584", "587", "604", "613", "639", "647", "672", "683", "705", "709", "742", "753", "778", "780", "782", "807", "819", "825", "867", "873", "902", "905"]], ["Cape Verde (Kabu Verdi)", "cv", "238"], ["Caribbean Netherlands", "bq", "599", 1, ["3", "4", "7"]], ["Cayman Islands", "ky", "1", 12, ["345"]], ["Central African Republic (République centrafricaine)", "cf", "236"], ["Chad (Tchad)", "td", "235"], ["Chile", "cl", "56"], ["China (中国)", "cn", "86"], ["Christmas Island", "cx", "61", 2, ["89164"]], ["Cocos (Keeling) Islands", "cc", "61", 1, ["89162"]], ["Colombia", "co", "57"], ["Comoros (‫جزر القمر‬‎)", "km", "269"], ["Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)", "cd", "243"], ["Congo (Republic) (Congo-Brazzaville)", "cg", "242"], ["Cook Islands", "ck", "682"], ["Costa Rica", "cr", "506"], ["Côte d’Ivoire", "ci", "225"], ["Croatia (Hrvatska)", "hr", "385"], ["Cuba", "cu", "53"], ["Curaçao", "cw", "599", 0], ["Cyprus (Κύπρος)", "cy", "357"], ["Czech Republic (Česká republika)", "cz", "420"], ["Denmark (Danmark)", "dk", "45"], ["Djibouti", "dj", "253"], ["Dominica", "dm", "1", 13, ["767"]], ["Dominican Republic (República Dominicana)", "do", "1", 2, ["809", "829", "849"]], ["Ecuador", "ec", "593"], ["Egypt (‫مصر‬‎)", "eg", "20"], ["El Salvador", "sv", "503"], ["Equatorial Guinea (Guinea Ecuatorial)", "gq", "240"], ["Eritrea", "er", "291"], ["Estonia (Eesti)", "ee", "372"], ["Eswatini", "sz", "268"], ["Ethiopia", "et", "251"], ["Falkland Islands (Islas Malvinas)", "fk", "500"], ["Faroe Islands (Føroyar)", "fo", "298"], ["Fiji", "fj", "679"], ["Finland (Suomi)", "fi", "358", 0], ["France", "fr", "33"], ["French Guiana (Guyane française)", "gf", "594"], ["French Polynesia (Polynésie française)", "pf", "689"], ["Gabon", "ga", "241"], ["Gambia", "gm", "220"], ["Georgia (საქართველო)", "ge", "995"], ["Germany (Deutschland)", "de", "49"], ["Ghana (Gaana)", "gh", "233"], ["Gibraltar", "gi", "350"], ["Greece (Ελλάδα)", "gr", "30"], ["Greenland (Kalaallit Nunaat)", "gl", "299"], ["Grenada", "gd", "1", 14, ["473"]], ["Guadeloupe", "gp", "590", 0], ["Guam", "gu", "1", 15, ["671"]], ["Guatemala", "gt", "502"], ["Guernsey", "gg", "44", 1, ["1481", "7781", "7839", "7911"]], ["Guinea (Guinée)", "gn", "224"], ["Guinea-Bissau (Guiné Bissau)", "gw", "245"], ["Guyana", "gy", "592"], ["Haiti", "ht", "509"], ["Honduras", "hn", "504"], ["Hong Kong (香港)", "hk", "852"], ["Hungary (Magyarország)", "hu", "36"], ["Iceland (Ísland)", "is", "354"], ["India (भारत)", "in", "91"], ["Indonesia", "id", "62"], ["Iran (‫ایران‬‎)", "ir", "98"], ["Iraq (‫العراق‬‎)", "iq", "964"], ["Ireland", "ie", "353"], ["Isle of Man", "im", "44", 2, ["1624", "74576", "7524", "7924", "7624"]], ["Israel (‫ישראל‬‎)", "il", "972"], ["Italy (Italia)", "it", "39", 0], ["Jamaica", "jm", "1", 4, ["876", "658"]], ["Japan (日本)", "jp", "81"], ["Jersey", "je", "44", 3, ["1534", "7509", "7700", "7797", "7829", "7937"]], ["Jordan (‫الأردن‬‎)", "jo", "962"], ["Kazakhstan (Казахстан)", "kz", "7", 1, ["33", "7"]], ["Kenya", "ke", "254"], ["Kiribati", "ki", "686"], ["Kosovo", "xk", "383"], ["Kuwait (‫الكويت‬‎)", "kw", "965"], ["Kyrgyzstan (Кыргызстан)", "kg", "996"], ["Laos (ລາວ)", "la", "856"], ["Latvia (Latvija)", "lv", "371"], ["Lebanon (‫لبنان‬‎)", "lb", "961"], ["Lesotho", "ls", "266"], ["Liberia", "lr", "231"], ["Libya (‫ليبيا‬‎)", "ly", "218"], ["Liechtenstein", "li", "423"], ["Lithuania (Lietuva)", "lt", "370"], ["Luxembourg", "lu", "352"], ["Macau (澳門)", "mo", "853"], ["Madagascar (Madagasikara)", "mg", "261"], ["Malawi", "mw", "265"], ["Malaysia", "my", "60"], ["Maldives", "mv", "960"], ["Mali", "ml", "223"], ["Malta", "mt", "356"], ["Marshall Islands", "mh", "692"], ["Martinique", "mq", "596"], ["Mauritania (‫موريتانيا‬‎)", "mr", "222"], ["Mauritius (Moris)", "mu", "230"], ["Mayotte", "yt", "262", 1, ["269", "639"]], ["Mexico (México)", "mx", "52"], ["Micronesia", "fm", "691"], ["Moldova (Republica Moldova)", "md", "373"], ["Monaco", "mc", "377"], ["Mongolia (Монгол)", "mn", "976"], ["Montenegro (Crna Gora)", "me", "382"], ["Montserrat", "ms", "1", 16, ["664"]], ["Morocco (‫المغرب‬‎)", "ma", "212", 0], ["Mozambique (Moçambique)", "mz", "258"], ["Myanmar (Burma) (မြန်မာ)", "mm", "95"], ["Namibia (Namibië)", "na", "264"], ["Nauru", "nr", "674"], ["Nepal (नेपाल)", "np", "977"], ["Netherlands (Nederland)", "nl", "31"], ["New Caledonia (Nouvelle-Calédonie)", "nc", "687"], ["New Zealand", "nz", "64"], ["Nicaragua", "ni", "505"], ["Niger (Nijar)", "ne", "227"], ["Nigeria", "ng", "234"], ["Niue", "nu", "683"], ["Norfolk Island", "nf", "672"], ["North Korea (조선 민주주의 인민 공화국)", "kp", "850"], ["North Macedonia (Северна Македонија)", "mk", "389"], ["Northern Mariana Islands", "mp", "1", 17, ["670"]], ["Norway (Norge)", "no", "47", 0], ["Oman (‫عُمان‬‎)", "om", "968"], ["Pakistan (‫پاکستان‬‎)", "pk", "92"], ["Palau", "pw", "680"], ["Palestine (‫فلسطين‬‎)", "ps", "970"], ["Panama (Panamá)", "pa", "507"], ["Papua New Guinea", "pg", "675"], ["Paraguay", "py", "595"], ["Peru (Perú)", "pe", "51"], ["Philippines", "ph", "63"], ["Poland (Polska)", "pl", "48"], ["Portugal", "pt", "351"], ["Puerto Rico", "pr", "1", 3, ["787", "939"]], ["Qatar (‫قطر‬‎)", "qa", "974"], ["Réunion (La Réunion)", "re", "262", 0], ["Romania (România)", "ro", "40"], ["Russia (Россия)", "ru", "7", 0], ["Rwanda", "rw", "250"], ["Saint Barthélemy", "bl", "590", 1], ["Saint Helena", "sh", "290"], ["Saint Kitts and Nevis", "kn", "1", 18, ["869"]], ["Saint Lucia", "lc", "1", 19, ["758"]], ["Saint Martin (Saint-Martin (partie française))", "mf", "590", 2], ["Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)", "pm", "508"], ["Saint Vincent and the Grenadines", "vc", "1", 20, ["784"]], ["Samoa", "ws", "685"], ["San Marino", "sm", "378"], ["São Tomé and Príncipe (São Tomé e Príncipe)", "st", "239"], ["Saudi Arabia (‫المملكة العربية السعودية‬‎)", "sa", "966"], ["Senegal (Sénégal)", "sn", "221"], ["Serbia (Србија)", "rs", "381"], ["Seychelles", "sc", "248"], ["Sierra Leone", "sl", "232"], ["Singapore", "sg", "65"], ["Sint Maarten", "sx", "1", 21, ["721"]], ["Slovakia (Slovensko)", "sk", "421"], ["Slovenia (Slovenija)", "si", "386"], ["Solomon Islands", "sb", "677"], ["Somalia (Soomaaliya)", "so", "252"], ["South Africa", "za", "27"], ["South Korea (대한민국)", "kr", "82"], ["South Sudan (‫جنوب السودان‬‎)", "ss", "211"], ["Spain (España)", "es", "34"], ["Sri Lanka (ශ්‍රී ලංකාව)", "lk", "94"], ["Sudan (‫السودان‬‎)", "sd", "249"], ["Suriname", "sr", "597"], ["Svalbard and Jan Mayen", "sj", "47", 1, ["79"]], ["Sweden (Sverige)", "se", "46"], ["Switzerland (Schweiz)", "ch", "41"], ["Syria (‫سوريا‬‎)", "sy", "963"], ["Taiwan (台灣)", "tw", "886"], ["Tajikistan", "tj", "992"], ["Tanzania", "tz", "255"], ["Thailand (ไทย)", "th", "66"], ["Timor-Leste", "tl", "670"], ["Togo", "tg", "228"], ["Tokelau", "tk", "690"], ["Tonga", "to", "676"], ["Trinidad and Tobago", "tt", "1", 22, ["868"]], ["Tunisia (‫تونس‬‎)", "tn", "216"], ["Turkey (Türkiye)", "tr", "90"], ["Turkmenistan", "tm", "993"], ["Turks and Caicos Islands", "tc", "1", 23, ["649"]], ["Tuvalu", "tv", "688"], ["U.S. Virgin Islands", "vi", "1", 24, ["340"]], ["Uganda", "ug", "256"], ["Ukraine (Україна)", "ua", "380"], ["United Arab Emirates (‫الإمارات العربية المتحدة‬‎)", "ae", "971"], ["United Kingdom", "gb", "44", 0], ["United States", "us", "1", 0], ["Uruguay", "uy", "598"], ["Uzbekistan (Oʻzbekiston)", "uz", "998"], ["Vanuatu", "vu", "678"], ["Vatican City (Città del Vaticano)", "va", "39", 1, ["06698"]], ["Venezuela", "ve", "58"], ["Vietnam (Việt Nam)", "vn", "84"], ["Wallis and Futuna (Wallis-et-Futuna)", "wf", "681"], ["Western Sahara (‫الصحراء الغربية‬‎)", "eh", "212", 1, ["5288", "5289"]], ["Yemen (‫اليمن‬‎)", "ye", "967"], ["Zambia", "zm", "260"], ["Zimbabwe", "zw", "263"], ["Åland Islands", "ax", "358", 1, ["18"]]], r = 0; r < t.length; r++) {
        var i = t[r];
        t[r] = {
          name: i[0],
          iso2: i[1],
          dialCode: i[2],
          priority: i[3] || 0,
          areaCodes: i[4] || null
        };
      }
      function d(h) {
        for (var c = 1; c < arguments.length; c++) {
          var a = arguments[c] != null ? Object(arguments[c]) : {}, o = Object.keys(a);
          typeof Object.getOwnPropertySymbols == "function" && o.push.apply(o, Object.getOwnPropertySymbols(a).filter(function(l) {
            return Object.getOwnPropertyDescriptor(a, l).enumerable;
          })), o.forEach(function(l) {
            s(h, l, a[l]);
          });
        }
        return h;
      }
      function s(h, c, a) {
        return c = w(c), c in h ? Object.defineProperty(h, c, {
          value: a,
          enumerable: !0,
          configurable: !0,
          writable: !0
        }) : h[c] = a, h;
      }
      function m(h, c) {
        if (!(h instanceof c))
          throw new TypeError("Cannot call a class as a function");
      }
      function u(h, c) {
        for (var a = 0; a < c.length; a++) {
          var o = c[a];
          o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(h, w(o.key), o);
        }
      }
      function g(h, c, a) {
        return c && u(h.prototype, c), a && u(h, a), Object.defineProperty(h, "prototype", {
          writable: !1
        }), h;
      }
      function w(h) {
        var c = O(h, "string");
        return typeof c == "symbol" ? c : String(c);
      }
      function O(h, c) {
        if (typeof h != "object" || h === null)
          return h;
        var a = h[Symbol.toPrimitive];
        if (a !== e) {
          var o = a.call(h, c || "default");
          if (typeof o != "object")
            return o;
          throw new TypeError("@@toPrimitive must return a primitive value.");
        }
        return (c === "string" ? String : Number)(h);
      }
      var S = {
        getInstance: function(c) {
          var a = c.getAttribute("data-intl-tel-input-id");
          return window.intlTelInputGlobals.instances[a];
        },
        instances: {},
        // using a global like this allows us to mock it in the tests
        documentReady: function() {
          return document.readyState === "complete";
        }
      };
      typeof window == "object" && (window.intlTelInputGlobals = S);
      var F = 0, D = {
        // whether or not to allow the dropdown
        allowDropdown: !0,
        // auto insert dial code (A) on init, (B) on user selecting a country, (C) on calling setCountry
        // also listen for blur/submit and auto remove dial code if that's all there is
        autoInsertDialCode: !1,
        // add a placeholder in the input with an example number for the selected country
        autoPlaceholder: "polite",
        // modify the parentClass
        customContainer: "",
        // modify the auto placeholder
        customPlaceholder: null,
        // append menu to specified element
        dropdownContainer: null,
        // don't display these countries
        excludeCountries: [],
        // format the input value during initialisation and on setNumber
        formatOnDisplay: !0,
        // geoIp lookup function
        geoIpLookup: null,
        // inject a hidden input with this name, and on submit, populate it with the result of getNumber
        hiddenInput: "",
        // initial country
        initialCountry: "",
        // localized country names e.g. { 'de': 'Deutschland' }
        localizedCountries: null,
        // national vs international formatting for numbers e.g. placeholders and displaying existing numbers
        nationalMode: !0,
        // display only these countries
        onlyCountries: [],
        // number type to use for placeholders
        placeholderNumberType: "MOBILE",
        // the countries at the top of the list. defaults to united states and united kingdom
        preferredCountries: ["us", "gb"],
        // display the country dial code next to the selected flag
        separateDialCode: !1,
        // option to hide the flags - must be used with separateDialCode, or allowDropdown=false
        showFlags: !0,
        // use full screen popup instead of dropdown for country list
        useFullscreenPopup: (
          // we cannot just test screen size as some smartphones/website meta tags will report desktop
          // resolutions
          // Note: to target Android Mobiles (and not Tablets), we must find 'Android' and 'Mobile'
          /Android.+Mobile|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth <= 500
        ),
        // specify the path to the libphonenumber script to enable validation/formatting
        utilsScript: ""
      }, v = ["800", "822", "833", "844", "855", "866", "877", "880", "881", "882", "883", "884", "885", "886", "887", "888", "889"], P = function(c, a) {
        for (var o = Object.keys(c), l = 0; l < o.length; l++)
          a(o[l], c[o[l]]);
      }, _ = function(c) {
        P(window.intlTelInputGlobals.instances, function(a) {
          window.intlTelInputGlobals.instances[a][c]();
        });
      }, T = /* @__PURE__ */ function() {
        function h(c, a) {
          var o = this;
          m(this, h), this.id = F++, this.telInput = c, this.activeItem = null, this.highlightedItem = null;
          var l = a || {};
          this.options = {}, P(D, function(f, p) {
            o.options[f] = l.hasOwnProperty(f) ? l[f] : p;
          }), this.hadInitialPlaceholder = !!c.getAttribute("placeholder");
        }
        return g(h, [{
          key: "_init",
          value: function() {
            var a = this;
            this.options.nationalMode && (this.options.autoInsertDialCode = !1), this.options.separateDialCode && (this.options.autoInsertDialCode = !1);
            var o = this.options.allowDropdown && !this.options.separateDialCode;
            if (!this.options.showFlags && o && (this.options.showFlags = !0), this.options.useFullscreenPopup && (document.body.classList.add("iti-fullscreen-popup"), this.options.dropdownContainer || (this.options.dropdownContainer = document.body)), this.isRTL = !!this.telInput.closest("[dir=rtl]"), typeof Promise < "u") {
              var l = new Promise(function(p, y) {
                a.resolveAutoCountryPromise = p, a.rejectAutoCountryPromise = y;
              }), f = new Promise(function(p, y) {
                a.resolveUtilsScriptPromise = p, a.rejectUtilsScriptPromise = y;
              });
              this.promise = Promise.all([l, f]);
            } else
              this.resolveAutoCountryPromise = this.rejectAutoCountryPromise = function() {
              }, this.resolveUtilsScriptPromise = this.rejectUtilsScriptPromise = function() {
              };
            this.selectedCountryData = {}, this._processCountryData(), this._generateMarkup(), this._setInitialState(), this._initListeners(), this._initRequests();
          }
        }, {
          key: "_processCountryData",
          value: function() {
            this._processAllCountries(), this._processCountryCodes(), this._processPreferredCountries(), this.options.localizedCountries && this._translateCountriesByLocale(), (this.options.onlyCountries.length || this.options.localizedCountries) && this.countries.sort(this._countryNameSort);
          }
        }, {
          key: "_addCountryCode",
          value: function(a, o, l) {
            o.length > this.countryCodeMaxLen && (this.countryCodeMaxLen = o.length), this.countryCodes.hasOwnProperty(o) || (this.countryCodes[o] = []);
            for (var f = 0; f < this.countryCodes[o].length; f++)
              if (this.countryCodes[o][f] === a)
                return;
            var p = l !== e ? l : this.countryCodes[o].length;
            this.countryCodes[o][p] = a;
          }
        }, {
          key: "_processAllCountries",
          value: function() {
            if (this.options.onlyCountries.length) {
              var a = this.options.onlyCountries.map(function(l) {
                return l.toLowerCase();
              });
              this.countries = t.filter(function(l) {
                return a.indexOf(l.iso2) > -1;
              });
            } else if (this.options.excludeCountries.length) {
              var o = this.options.excludeCountries.map(function(l) {
                return l.toLowerCase();
              });
              this.countries = t.filter(function(l) {
                return o.indexOf(l.iso2) === -1;
              });
            } else
              this.countries = t;
          }
        }, {
          key: "_translateCountriesByLocale",
          value: function() {
            for (var a = 0; a < this.countries.length; a++) {
              var o = this.countries[a].iso2.toLowerCase();
              this.options.localizedCountries.hasOwnProperty(o) && (this.countries[a].name = this.options.localizedCountries[o]);
            }
          }
        }, {
          key: "_countryNameSort",
          value: function(a, o) {
            return a.name < o.name ? -1 : a.name > o.name ? 1 : 0;
          }
        }, {
          key: "_processCountryCodes",
          value: function() {
            this.countryCodeMaxLen = 0, this.dialCodes = {}, this.countryCodes = {};
            for (var a = 0; a < this.countries.length; a++) {
              var o = this.countries[a];
              this.dialCodes[o.dialCode] || (this.dialCodes[o.dialCode] = !0), this._addCountryCode(o.iso2, o.dialCode, o.priority);
            }
            for (var l = 0; l < this.countries.length; l++) {
              var f = this.countries[l];
              if (f.areaCodes)
                for (var p = this.countryCodes[f.dialCode][0], y = 0; y < f.areaCodes.length; y++) {
                  for (var I = f.areaCodes[y], k = 1; k < I.length; k++) {
                    var L = f.dialCode + I.substr(0, k);
                    this._addCountryCode(p, L), this._addCountryCode(f.iso2, L);
                  }
                  this._addCountryCode(f.iso2, f.dialCode + I);
                }
            }
          }
        }, {
          key: "_processPreferredCountries",
          value: function() {
            this.preferredCountries = [];
            for (var a = 0; a < this.options.preferredCountries.length; a++) {
              var o = this.options.preferredCountries[a].toLowerCase(), l = this._getCountryData(o, !1, !0);
              l && this.preferredCountries.push(l);
            }
          }
        }, {
          key: "_createEl",
          value: function(a, o, l) {
            var f = document.createElement(a);
            return o && P(o, function(p, y) {
              return f.setAttribute(p, y);
            }), l && l.appendChild(f), f;
          }
        }, {
          key: "_generateMarkup",
          value: function() {
            !this.telInput.hasAttribute("autocomplete") && !(this.telInput.form && this.telInput.form.hasAttribute("autocomplete")) && this.telInput.setAttribute("autocomplete", "off");
            var a = this.options, o = a.allowDropdown, l = a.separateDialCode, f = a.showFlags, p = a.customContainer, y = a.hiddenInput, I = a.dropdownContainer, k = "iti";
            o && (k += " iti--allow-dropdown"), l && (k += " iti--separate-dial-code"), f && (k += " iti--show-flags"), p && (k += " ".concat(p));
            var L = this._createEl("div", {
              class: k
            });
            this.telInput.parentNode.insertBefore(L, this.telInput);
            var M = o || f || l;
            if (M && (this.flagsContainer = this._createEl("div", {
              class: "iti__flag-container"
            }, L)), L.appendChild(this.telInput), M && (this.selectedFlag = this._createEl("div", d({
              class: "iti__selected-flag"
            }, o && {
              role: "combobox",
              "aria-haspopup": "listbox",
              "aria-controls": "iti-".concat(this.id, "__country-listbox"),
              "aria-expanded": "false",
              "aria-label": "Telephone country code"
            }), this.flagsContainer)), f && (this.selectedFlagInner = this._createEl("div", {
              class: "iti__flag"
            }, this.selectedFlag)), this.selectedFlag && this.telInput.disabled && this.selectedFlag.setAttribute("aria-disabled", "true"), l && (this.selectedDialCode = this._createEl("div", {
              class: "iti__selected-dial-code"
            }, this.selectedFlag)), o && (this.telInput.disabled || this.selectedFlag.setAttribute("tabindex", "0"), this.dropdownArrow = this._createEl("div", {
              class: "iti__arrow"
            }, this.selectedFlag), this.countryList = this._createEl("ul", {
              class: "iti__country-list iti__hide",
              id: "iti-".concat(this.id, "__country-listbox"),
              role: "listbox",
              "aria-label": "List of countries"
            }), this.preferredCountries.length && (this._appendListItems(this.preferredCountries, "iti__preferred", !0), this._createEl("li", {
              class: "iti__divider",
              "aria-hidden": "true"
            }, this.countryList)), this._appendListItems(this.countries, "iti__standard"), I ? (this.dropdown = this._createEl("div", {
              class: "iti iti--container"
            }), this.dropdown.appendChild(this.countryList)) : this.flagsContainer.appendChild(this.countryList)), y) {
              var A = y, V = this.telInput.getAttribute("name");
              if (V) {
                var te = V.lastIndexOf("[");
                te !== -1 && (A = "".concat(V.substr(0, te), "[").concat(A, "]"));
              }
              this.hiddenInput = this._createEl("input", {
                type: "hidden",
                name: A
              }), L.appendChild(this.hiddenInput);
            }
          }
        }, {
          key: "_appendListItems",
          value: function(a, o, l) {
            for (var f = "", p = 0; p < a.length; p++) {
              var y = a[p], I = l ? "-preferred" : "";
              f += "<li class='iti__country ".concat(o, "' tabIndex='-1' id='iti-").concat(this.id, "__item-").concat(y.iso2).concat(I, "' role='option' data-dial-code='").concat(y.dialCode, "' data-country-code='").concat(y.iso2, "' aria-selected='false'>"), this.options.showFlags && (f += "<div class='iti__flag-box'><div class='iti__flag iti__".concat(y.iso2, "'></div></div>")), f += "<span class='iti__country-name'>".concat(y.name, "</span>"), f += "<span class='iti__dial-code'>+".concat(y.dialCode, "</span>"), f += "</li>";
            }
            this.countryList.insertAdjacentHTML("beforeend", f);
          }
        }, {
          key: "_setInitialState",
          value: function() {
            var a = this.telInput.getAttribute("value"), o = this.telInput.value, l = a && a.charAt(0) === "+" && (!o || o.charAt(0) !== "+"), f = l ? a : o, p = this._getDialCode(f), y = this._isRegionlessNanp(f), I = this.options, k = I.initialCountry, L = I.autoInsertDialCode;
            p && !y ? this._updateFlagFromNumber(f) : k !== "auto" && (k ? this._setFlag(k.toLowerCase()) : p && y ? this._setFlag("us") : (this.defaultCountry = this.preferredCountries.length ? this.preferredCountries[0].iso2 : this.countries[0].iso2, f || this._setFlag(this.defaultCountry)), !f && L && (this.telInput.value = "+".concat(this.selectedCountryData.dialCode))), f && this._updateValFromNumber(f);
          }
        }, {
          key: "_initListeners",
          value: function() {
            this._initKeyListeners(), this.options.autoInsertDialCode && this._initBlurListeners(), this.options.allowDropdown && this._initDropdownListeners(), this.hiddenInput && this._initHiddenInputListener();
          }
        }, {
          key: "_initHiddenInputListener",
          value: function() {
            var a = this;
            this._handleHiddenInputSubmit = function() {
              a.hiddenInput.value = a.getNumber();
            }, this.telInput.form && this.telInput.form.addEventListener("submit", this._handleHiddenInputSubmit);
          }
        }, {
          key: "_getClosestLabel",
          value: function() {
            for (var a = this.telInput; a && a.tagName !== "LABEL"; )
              a = a.parentNode;
            return a;
          }
        }, {
          key: "_initDropdownListeners",
          value: function() {
            var a = this;
            this._handleLabelClick = function(l) {
              a.countryList.classList.contains("iti__hide") ? a.telInput.focus() : l.preventDefault();
            };
            var o = this._getClosestLabel();
            o && o.addEventListener("click", this._handleLabelClick), this._handleClickSelectedFlag = function() {
              a.countryList.classList.contains("iti__hide") && !a.telInput.disabled && !a.telInput.readOnly && a._showDropdown();
            }, this.selectedFlag.addEventListener("click", this._handleClickSelectedFlag), this._handleFlagsContainerKeydown = function(l) {
              var f = a.countryList.classList.contains("iti__hide");
              f && ["ArrowUp", "Up", "ArrowDown", "Down", " ", "Enter"].indexOf(l.key) !== -1 && (l.preventDefault(), l.stopPropagation(), a._showDropdown()), l.key === "Tab" && a._closeDropdown();
            }, this.flagsContainer.addEventListener("keydown", this._handleFlagsContainerKeydown);
          }
        }, {
          key: "_initRequests",
          value: function() {
            var a = this;
            this.options.utilsScript && !window.intlTelInputUtils ? window.intlTelInputGlobals.documentReady() ? window.intlTelInputGlobals.loadUtils(this.options.utilsScript) : window.addEventListener("load", function() {
              window.intlTelInputGlobals.loadUtils(a.options.utilsScript);
            }) : this.resolveUtilsScriptPromise(), this.options.initialCountry === "auto" ? this._loadAutoCountry() : this.resolveAutoCountryPromise();
          }
        }, {
          key: "_loadAutoCountry",
          value: function() {
            window.intlTelInputGlobals.autoCountry ? this.handleAutoCountry() : window.intlTelInputGlobals.startedLoadingAutoCountry || (window.intlTelInputGlobals.startedLoadingAutoCountry = !0, typeof this.options.geoIpLookup == "function" && this.options.geoIpLookup(function(a) {
              window.intlTelInputGlobals.autoCountry = a.toLowerCase(), setTimeout(function() {
                return _("handleAutoCountry");
              });
            }, function() {
              return _("rejectAutoCountryPromise");
            }));
          }
        }, {
          key: "_initKeyListeners",
          value: function() {
            var a = this;
            this._handleKeyupEvent = function() {
              a._updateFlagFromNumber(a.telInput.value) && a._triggerCountryChange();
            }, this.telInput.addEventListener("keyup", this._handleKeyupEvent), this._handleClipboardEvent = function() {
              setTimeout(a._handleKeyupEvent);
            }, this.telInput.addEventListener("cut", this._handleClipboardEvent), this.telInput.addEventListener("paste", this._handleClipboardEvent);
          }
        }, {
          key: "_cap",
          value: function(a) {
            var o = this.telInput.getAttribute("maxlength");
            return o && a.length > o ? a.substr(0, o) : a;
          }
        }, {
          key: "_initBlurListeners",
          value: function() {
            var a = this;
            this._handleSubmitOrBlurEvent = function() {
              a._removeEmptyDialCode();
            }, this.telInput.form && this.telInput.form.addEventListener("submit", this._handleSubmitOrBlurEvent), this.telInput.addEventListener("blur", this._handleSubmitOrBlurEvent);
          }
        }, {
          key: "_removeEmptyDialCode",
          value: function() {
            if (this.telInput.value.charAt(0) === "+") {
              var a = this._getNumeric(this.telInput.value);
              (!a || this.selectedCountryData.dialCode === a) && (this.telInput.value = "");
            }
          }
        }, {
          key: "_getNumeric",
          value: function(a) {
            return a.replace(/\D/g, "");
          }
        }, {
          key: "_trigger",
          value: function(a) {
            var o = document.createEvent("Event");
            o.initEvent(a, !0, !0), this.telInput.dispatchEvent(o);
          }
        }, {
          key: "_showDropdown",
          value: function() {
            this.countryList.classList.remove("iti__hide"), this.selectedFlag.setAttribute("aria-expanded", "true"), this._setDropdownPosition(), this.activeItem && (this._highlightListItem(this.activeItem, !1), this._scrollTo(this.activeItem, !0)), this._bindDropdownListeners(), this.dropdownArrow.classList.add("iti__arrow--up"), this._trigger("open:countrydropdown");
          }
        }, {
          key: "_toggleClass",
          value: function(a, o, l) {
            l && !a.classList.contains(o) ? a.classList.add(o) : !l && a.classList.contains(o) && a.classList.remove(o);
          }
        }, {
          key: "_setDropdownPosition",
          value: function() {
            var a = this;
            if (this.options.dropdownContainer && this.options.dropdownContainer.appendChild(this.dropdown), !this.options.useFullscreenPopup) {
              var o = this.telInput.getBoundingClientRect(), l = window.pageYOffset || document.documentElement.scrollTop, f = o.top + l, p = this.countryList.offsetHeight, y = f + this.telInput.offsetHeight + p < l + window.innerHeight, I = f - p > l;
              if (this._toggleClass(this.countryList, "iti__country-list--dropup", !y && I), this.options.dropdownContainer) {
                var k = !y && I ? 0 : this.telInput.offsetHeight;
                this.dropdown.style.top = "".concat(f + k, "px"), this.dropdown.style.left = "".concat(o.left + document.body.scrollLeft, "px"), this._handleWindowScroll = function() {
                  return a._closeDropdown();
                }, window.addEventListener("scroll", this._handleWindowScroll);
              }
            }
          }
        }, {
          key: "_getClosestListItem",
          value: function(a) {
            for (var o = a; o && o !== this.countryList && !o.classList.contains("iti__country"); )
              o = o.parentNode;
            return o === this.countryList ? null : o;
          }
        }, {
          key: "_bindDropdownListeners",
          value: function() {
            var a = this;
            this._handleMouseoverCountryList = function(p) {
              var y = a._getClosestListItem(p.target);
              y && a._highlightListItem(y, !1);
            }, this.countryList.addEventListener("mouseover", this._handleMouseoverCountryList), this._handleClickCountryList = function(p) {
              var y = a._getClosestListItem(p.target);
              y && a._selectListItem(y);
            }, this.countryList.addEventListener("click", this._handleClickCountryList);
            var o = !0;
            this._handleClickOffToClose = function() {
              o || a._closeDropdown(), o = !1;
            }, document.documentElement.addEventListener("click", this._handleClickOffToClose);
            var l = "", f = null;
            this._handleKeydownOnDropdown = function(p) {
              p.preventDefault(), p.key === "ArrowUp" || p.key === "Up" || p.key === "ArrowDown" || p.key === "Down" ? a._handleUpDownKey(p.key) : p.key === "Enter" ? a._handleEnterKey() : p.key === "Escape" ? a._closeDropdown() : /^[a-zA-ZÀ-ÿа-яА-Я ]$/.test(p.key) && (f && clearTimeout(f), l += p.key.toLowerCase(), a._searchForCountry(l), f = setTimeout(function() {
                l = "";
              }, 1e3));
            }, document.addEventListener("keydown", this._handleKeydownOnDropdown);
          }
        }, {
          key: "_handleUpDownKey",
          value: function(a) {
            var o = a === "ArrowUp" || a === "Up" ? this.highlightedItem.previousElementSibling : this.highlightedItem.nextElementSibling;
            o && (o.classList.contains("iti__divider") && (o = a === "ArrowUp" || a === "Up" ? o.previousElementSibling : o.nextElementSibling), this._highlightListItem(o, !0));
          }
        }, {
          key: "_handleEnterKey",
          value: function() {
            this.highlightedItem && this._selectListItem(this.highlightedItem);
          }
        }, {
          key: "_searchForCountry",
          value: function(a) {
            for (var o = 0; o < this.countries.length; o++)
              if (this._startsWith(this.countries[o].name, a)) {
                var l = this.countryList.querySelector("#iti-".concat(this.id, "__item-").concat(this.countries[o].iso2));
                this._highlightListItem(l, !1), this._scrollTo(l, !0);
                break;
              }
          }
        }, {
          key: "_startsWith",
          value: function(a, o) {
            return a.substr(0, o.length).toLowerCase() === o;
          }
        }, {
          key: "_updateValFromNumber",
          value: function(a) {
            var o = a;
            if (this.options.formatOnDisplay && window.intlTelInputUtils && this.selectedCountryData) {
              var l = this.options.nationalMode || o.charAt(0) !== "+" && !this.options.separateDialCode, f = intlTelInputUtils.numberFormat, p = f.NATIONAL, y = f.INTERNATIONAL, I = l ? p : y;
              o = intlTelInputUtils.formatNumber(o, this.selectedCountryData.iso2, I);
            }
            o = this._beforeSetNumber(o), this.telInput.value = o;
          }
        }, {
          key: "_updateFlagFromNumber",
          value: function(a) {
            var o = a, l = this.selectedCountryData.dialCode, f = l === "1";
            o && f && o.charAt(0) !== "+" && (o.charAt(0) !== "1" && (o = "1".concat(o)), o = "+".concat(o)), this.options.separateDialCode && l && o.charAt(0) !== "+" && (o = "+".concat(l).concat(o));
            var p = this._getDialCode(o, !0), y = this._getNumeric(o), I = null;
            if (p) {
              var k = this.countryCodes[this._getNumeric(p)], L = k.indexOf(this.selectedCountryData.iso2) !== -1 && y.length <= p.length - 1, M = l === "1" && this._isRegionlessNanp(y);
              if (!M && !L) {
                for (var A = 0; A < k.length; A++)
                  if (k[A]) {
                    I = k[A];
                    break;
                  }
              }
            } else
              o.charAt(0) === "+" && y.length ? I = "" : (!o || o === "+") && (I = this.defaultCountry);
            return I !== null ? this._setFlag(I) : !1;
          }
        }, {
          key: "_isRegionlessNanp",
          value: function(a) {
            var o = this._getNumeric(a);
            if (o.charAt(0) === "1") {
              var l = o.substr(1, 3);
              return v.indexOf(l) !== -1;
            }
            return !1;
          }
        }, {
          key: "_highlightListItem",
          value: function(a, o) {
            var l = this.highlightedItem;
            l && l.classList.remove("iti__highlight"), this.highlightedItem = a, this.highlightedItem.classList.add("iti__highlight"), this.selectedFlag.setAttribute("aria-activedescendant", a.getAttribute("id")), o && this.highlightedItem.focus();
          }
        }, {
          key: "_getCountryData",
          value: function(a, o, l) {
            for (var f = o ? t : this.countries, p = 0; p < f.length; p++)
              if (f[p].iso2 === a)
                return f[p];
            if (l)
              return null;
            throw new Error("No country data for '".concat(a, "'"));
          }
        }, {
          key: "_setFlag",
          value: function(a) {
            var o = this.options, l = o.allowDropdown, f = o.separateDialCode, p = o.showFlags, y = this.selectedCountryData.iso2 ? this.selectedCountryData : {};
            if (this.selectedCountryData = a ? this._getCountryData(a, !1, !1) : {}, this.selectedCountryData.iso2 && (this.defaultCountry = this.selectedCountryData.iso2), p && this.selectedFlagInner.setAttribute("class", "iti__flag iti__".concat(a)), this._setSelectedCountryFlagTitleAttribute(a, f), f) {
              var I = this.selectedCountryData.dialCode ? "+".concat(this.selectedCountryData.dialCode) : "";
              this.selectedDialCode.innerHTML = I;
              var k = this.selectedFlag.offsetWidth || this._getHiddenSelectedFlagWidth();
              this.isRTL ? this.telInput.style.paddingRight = "".concat(k + 6, "px") : this.telInput.style.paddingLeft = "".concat(k + 6, "px");
            }
            if (this._updatePlaceholder(), l) {
              var L = this.activeItem;
              if (L && (L.classList.remove("iti__active"), L.setAttribute("aria-selected", "false")), a) {
                var M = this.countryList.querySelector("#iti-".concat(this.id, "__item-").concat(a, "-preferred")) || this.countryList.querySelector("#iti-".concat(this.id, "__item-").concat(a));
                M.setAttribute("aria-selected", "true"), M.classList.add("iti__active"), this.activeItem = M;
              }
            }
            return y.iso2 !== a;
          }
        }, {
          key: "_setSelectedCountryFlagTitleAttribute",
          value: function(a, o) {
            if (this.selectedFlag) {
              var l;
              a && !o ? l = "".concat(this.selectedCountryData.name, ": +").concat(this.selectedCountryData.dialCode) : a ? l = this.selectedCountryData.name : l = "Unknown", this.selectedFlag.setAttribute("title", l);
            }
          }
        }, {
          key: "_getHiddenSelectedFlagWidth",
          value: function() {
            var a = this.telInput.parentNode.cloneNode();
            a.style.visibility = "hidden", document.body.appendChild(a);
            var o = this.flagsContainer.cloneNode();
            a.appendChild(o);
            var l = this.selectedFlag.cloneNode(!0);
            o.appendChild(l);
            var f = l.offsetWidth;
            return a.parentNode.removeChild(a), f;
          }
        }, {
          key: "_updatePlaceholder",
          value: function() {
            var a = this.options.autoPlaceholder === "aggressive" || !this.hadInitialPlaceholder && this.options.autoPlaceholder === "polite";
            if (window.intlTelInputUtils && a) {
              var o = intlTelInputUtils.numberType[this.options.placeholderNumberType], l = this.selectedCountryData.iso2 ? intlTelInputUtils.getExampleNumber(this.selectedCountryData.iso2, this.options.nationalMode, o) : "";
              l = this._beforeSetNumber(l), typeof this.options.customPlaceholder == "function" && (l = this.options.customPlaceholder(l, this.selectedCountryData)), this.telInput.setAttribute("placeholder", l);
            }
          }
        }, {
          key: "_selectListItem",
          value: function(a) {
            var o = this._setFlag(a.getAttribute("data-country-code"));
            this._closeDropdown(), this._updateDialCode(a.getAttribute("data-dial-code")), this.telInput.focus();
            var l = this.telInput.value.length;
            this.telInput.setSelectionRange(l, l), o && this._triggerCountryChange();
          }
        }, {
          key: "_closeDropdown",
          value: function() {
            this.countryList.classList.add("iti__hide"), this.selectedFlag.setAttribute("aria-expanded", "false"), this.selectedFlag.removeAttribute("aria-activedescendant"), this.dropdownArrow.classList.remove("iti__arrow--up"), document.removeEventListener("keydown", this._handleKeydownOnDropdown), document.documentElement.removeEventListener("click", this._handleClickOffToClose), this.countryList.removeEventListener("mouseover", this._handleMouseoverCountryList), this.countryList.removeEventListener("click", this._handleClickCountryList), this.options.dropdownContainer && (this.options.useFullscreenPopup || window.removeEventListener("scroll", this._handleWindowScroll), this.dropdown.parentNode && this.dropdown.parentNode.removeChild(this.dropdown)), this._trigger("close:countrydropdown");
          }
        }, {
          key: "_scrollTo",
          value: function(a, o) {
            var l = this.countryList, f = window.pageYOffset || document.documentElement.scrollTop, p = l.offsetHeight, y = l.getBoundingClientRect().top + f, I = y + p, k = a.offsetHeight, L = a.getBoundingClientRect().top + f, M = L + k, A = L - y + l.scrollTop, V = p / 2 - k / 2;
            if (L < y)
              o && (A -= V), l.scrollTop = A;
            else if (M > I) {
              o && (A += V);
              var te = p - k;
              l.scrollTop = A - te;
            }
          }
        }, {
          key: "_updateDialCode",
          value: function(a) {
            var o = this.telInput.value, l = "+".concat(a), f;
            if (o.charAt(0) === "+") {
              var p = this._getDialCode(o);
              p ? f = o.replace(p, l) : f = l, this.telInput.value = f;
            } else
              this.options.autoInsertDialCode && (o ? f = l + o : f = l, this.telInput.value = f);
          }
        }, {
          key: "_getDialCode",
          value: function(a, o) {
            var l = "";
            if (a.charAt(0) === "+")
              for (var f = "", p = 0; p < a.length; p++) {
                var y = a.charAt(p);
                if (!isNaN(parseInt(y, 10))) {
                  if (f += y, o)
                    this.countryCodes[f] && (l = a.substr(0, p + 1));
                  else if (this.dialCodes[f]) {
                    l = a.substr(0, p + 1);
                    break;
                  }
                  if (f.length === this.countryCodeMaxLen)
                    break;
                }
              }
            return l;
          }
        }, {
          key: "_getFullNumber",
          value: function() {
            var a = this.telInput.value.trim(), o = this.selectedCountryData.dialCode, l, f = this._getNumeric(a);
            return this.options.separateDialCode && a.charAt(0) !== "+" && o && f ? l = "+".concat(o) : l = "", l + a;
          }
        }, {
          key: "_beforeSetNumber",
          value: function(a) {
            var o = a;
            if (this.options.separateDialCode) {
              var l = this._getDialCode(o);
              if (l) {
                l = "+".concat(this.selectedCountryData.dialCode);
                var f = o[l.length] === " " || o[l.length] === "-" ? l.length + 1 : l.length;
                o = o.substr(f);
              }
            }
            return this._cap(o);
          }
        }, {
          key: "_triggerCountryChange",
          value: function() {
            this._trigger("countrychange");
          }
        }, {
          key: "handleAutoCountry",
          value: function() {
            this.options.initialCountry === "auto" && (this.defaultCountry = window.intlTelInputGlobals.autoCountry, this.telInput.value || this.setCountry(this.defaultCountry), this.resolveAutoCountryPromise());
          }
        }, {
          key: "handleUtils",
          value: function() {
            window.intlTelInputUtils && (this.telInput.value && this._updateValFromNumber(this.telInput.value), this._updatePlaceholder()), this.resolveUtilsScriptPromise();
          }
        }, {
          key: "destroy",
          value: function() {
            var a = this.telInput.form;
            if (this.options.allowDropdown) {
              this._closeDropdown(), this.selectedFlag.removeEventListener("click", this._handleClickSelectedFlag), this.flagsContainer.removeEventListener("keydown", this._handleFlagsContainerKeydown);
              var o = this._getClosestLabel();
              o && o.removeEventListener("click", this._handleLabelClick);
            }
            this.hiddenInput && a && a.removeEventListener("submit", this._handleHiddenInputSubmit), this.options.autoInsertDialCode && (a && a.removeEventListener("submit", this._handleSubmitOrBlurEvent), this.telInput.removeEventListener("blur", this._handleSubmitOrBlurEvent)), this.telInput.removeEventListener("keyup", this._handleKeyupEvent), this.telInput.removeEventListener("cut", this._handleClipboardEvent), this.telInput.removeEventListener("paste", this._handleClipboardEvent), this.telInput.removeAttribute("data-intl-tel-input-id");
            var l = this.telInput.parentNode;
            l.parentNode.insertBefore(this.telInput, l), l.parentNode.removeChild(l), delete window.intlTelInputGlobals.instances[this.id];
          }
        }, {
          key: "getExtension",
          value: function() {
            return window.intlTelInputUtils ? intlTelInputUtils.getExtension(this._getFullNumber(), this.selectedCountryData.iso2) : "";
          }
        }, {
          key: "getNumber",
          value: function(a) {
            if (window.intlTelInputUtils) {
              var o = this.selectedCountryData.iso2;
              return intlTelInputUtils.formatNumber(this._getFullNumber(), o, a);
            }
            return "";
          }
        }, {
          key: "getNumberType",
          value: function() {
            return window.intlTelInputUtils ? intlTelInputUtils.getNumberType(this._getFullNumber(), this.selectedCountryData.iso2) : -99;
          }
        }, {
          key: "getSelectedCountryData",
          value: function() {
            return this.selectedCountryData;
          }
        }, {
          key: "getValidationError",
          value: function() {
            if (window.intlTelInputUtils) {
              var a = this.selectedCountryData.iso2;
              return intlTelInputUtils.getValidationError(this._getFullNumber(), a);
            }
            return -99;
          }
        }, {
          key: "isValidNumber",
          value: function() {
            var a = this._getFullNumber().trim();
            return window.intlTelInputUtils ? intlTelInputUtils.isValidNumber(a, this.selectedCountryData.iso2) : null;
          }
        }, {
          key: "isPossibleNumber",
          value: function() {
            var a = this._getFullNumber().trim();
            return window.intlTelInputUtils ? intlTelInputUtils.isPossibleNumber(a, this.selectedCountryData.iso2) : null;
          }
        }, {
          key: "setCountry",
          value: function(a) {
            var o = a.toLowerCase();
            this.selectedCountryData.iso2 !== o && (this._setFlag(o), this._updateDialCode(this.selectedCountryData.dialCode), this._triggerCountryChange());
          }
        }, {
          key: "setNumber",
          value: function(a) {
            var o = this._updateFlagFromNumber(a);
            this._updateValFromNumber(a), o && this._triggerCountryChange();
          }
        }, {
          key: "setPlaceholderNumberType",
          value: function(a) {
            this.options.placeholderNumberType = a, this._updatePlaceholder();
          }
        }]), h;
      }();
      S.getCountryData = function() {
        return t;
      };
      var R = function(c, a, o) {
        var l = document.createElement("script");
        l.onload = function() {
          _("handleUtils"), a && a();
        }, l.onerror = function() {
          _("rejectUtilsScriptPromise"), o && o();
        }, l.className = "iti-load-utils", l.async = !0, l.src = c, document.body.appendChild(l);
      };
      return S.loadUtils = function(h) {
        if (!window.intlTelInputUtils && !window.intlTelInputGlobals.startedLoadingUtilsScript) {
          if (window.intlTelInputGlobals.startedLoadingUtilsScript = !0, typeof Promise < "u")
            return new Promise(function(c, a) {
              return R(h, c, a);
            });
          R(h);
        }
        return null;
      }, S.defaults = D, S.version = "18.3.3", function(h, c) {
        var a = new T(h, c);
        return a._init(), h.setAttribute("data-intl-tel-input-id", a.id), window.intlTelInputGlobals.instances[a.id] = a, a;
      };
    }();
  });
})(ot);
var qr = ot.exports, Ur = qr;
const Gr = /* @__PURE__ */ Mr(Ur);
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
const jr = async (n, e) => {
  if (document.getElementById("clicktopay-express-checkout-button").classList.remove("ps-hidden"), !e) {
    document.getElementById("express-checkout-button-c2p").classList.remove("ps-hidden"), document.querySelector(".express-checkout-button-c2p-icons").classList.remove("ps-hidden");
    return;
  }
  if (n.length > 0) {
    const t = document.createElement("span");
    t.innerHTML = " •••• " + n[0].panLastFour, document.querySelector(".express-checkout-button-c2p-icons").classList.add("ps-hidden"), document.getElementById("express-checkout-button-c2p").appendChild(t), document.getElementById("express-checkout-button-c2p").classList.remove("ps-hidden"), document.getElementById("c2p-card-icon").classList.remove("ps-hidden"), document.getElementById("c2p-card-icon").src = Wr(
      n[0].paymentCardDescriptor
    );
  }
  n.length > 1 && (document.getElementById("express-checkout-additional-description").classList.remove("ps-hidden"), document.getElementById("express-checkout-card-count").innerHTML = n.length - 1);
}, Wr = (n) => {
  switch (n) {
    case "mastercard":
      return clicktopay.mastercardLogoPath;
    case "visa":
      return clicktopay.expressCheckoutButtonTheme === "classic" ? clicktopay.visaClassicLogoPath : clicktopay.visaDarkLogoPath;
    case "discover":
      return clicktopay.discoverLogoPath;
    case "amex":
      return clicktopay.amexLogoPath;
    default:
      console.error("Card provider logo does not exist");
  }
}, X = { create: jr };
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
class zr {
  constructor() {
    H(this, "showExpressCheckoutButton", async () => {
      const e = !!clicktopay.customer.shippingAddress && !!clicktopay.customer.billingAddress, t = !clicktopay.customer.is_guest, r = this.cards, i = r.length > 0 || this.isConsumerPresent, d = r.length > 0, s = E.get("guest_visited_shipping_step");
      if (console.debug("Click to Pay - Express button variables", {
        is_registered_user: t,
        existing_c2p_user: i,
        browser_cookies_present: d,
        is_address_present: e,
        guest_visited_shipping_step: s
      }), !t && e && s)
        return await X.create(r, !1);
      if (t && !i && !d && e)
        return await X.create(r, !1);
      if (t && i && !d && e)
        return await X.create(r, !1);
      if (t && i && d && e)
        return await X.create(r, !0);
      if (t && i && d && !e)
        return await X.create(r, !1);
    });
    H(this, "updateExpressCheckoutButton", async () => {
      const e = {
        visa: document.querySelector(".c2p-visa-logo"),
        mastercard: document.querySelector(".c2p-mastercard-logo"),
        amex: document.querySelector(".c2p-amex-logo"),
        discover: document.querySelector(".c2p-discover-logo")
      };
      Object.keys(e).forEach((t) => {
        const r = e[t];
        r && (this.availableCardBrands.includes(t) ? r.style.display = "inline" : r.style.display = "none");
      });
    });
    H(this, "showDcfScreen", async () => {
      this.isDcfScreenCancelled = !1, await z.handleIframeLoad(), !this.isDcfScreenCancelled && (document.querySelector(".card-input-main").classList.remove("card-entered"), document.body.style.overflowY = "hidden", document.getElementById("dcf-screen").classList.add("open"), document.getElementById("dcf-screen").classList.add("dcf-open"), this.isDcfScreenOpen = !0);
    });
    this.initialized = !1, this.cards = [], this.nonce = null, this.nonceId = null, this.cvv_required = !1, this.cvv_status = !1, this.retriedCheckout = !1, this.isConsumerPresent = !1, this.hasFinishedInitialization = !1, this.isDcfScreenOpen = !1, this.hasEnteredCardNumber = !1, this.currentCountryCode = clicktopay.currentCountryCode, this.sdk = new ye(), this.disabledCards = [], this.hasConsent = !1, this.isThreeDs = !1, this.isCardEntryFormValid = !1, this.availableCardBrands = [], this.isDcfScreenCancelled = !1, this.isConsumerPresentFieldId = "";
  }
  async initializeCTP(e = void 0) {
    return new Promise(async (t) => {
      const r = setInterval(async () => {
        var i, d;
        this.sdk.canInitialize() && (await this.sdk.initialize(
          clicktopay.merchantReferenceId,
          clicktopay.jwtToken,
          clicktopay.env,
          clicktopay.locale,
          (d = (i = clicktopay.customer) == null ? void 0 : i.billingAddress) == null ? void 0 : d.countryCode,
          e,
          clicktopay.customAttributes
        ), C.toggleLoader(!0), clearInterval(r), t());
      }, 10);
    });
  }
  async isInitialized() {
    return new Promise((e) => {
      const t = setInterval(() => {
        this.initialized && (clearInterval(t), e(this.initialized));
      }, 10);
    });
  }
  async hasPerformedLookup() {
    return new Promise((e) => {
      const t = setInterval(() => {
        this.hasFinishedInitialization && (clearInterval(t), e(this.hasFinishedInitialization));
      }, 10);
    });
  }
  async getCards() {
    return this.cards = await this.sdk.getCards(), this.cards;
  }
  async signOut() {
    return this.cards = [], this.sdk.signOut();
  }
  async displayState(e, t = void 0) {
    this.hasEnteredCardNumber = !1, await Ze.setState(e, {
      [b.OtpForm]: {
        isRecognizedUser: t,
        otpConfig: {
          "auto-submit": !1,
          "--src-btn-border-radius": "5px",
          "display-header": !1,
          locale: clicktopay.locale,
          "--src-root-container-border-color": "none",
          "--src-root-container-border-radius": "5px 5px 0 0"
        }
      },
      [b.CardForm]: {
        cards: this.cards
      },
      [b.CardList]: {
        cards: this.cards,
        cvvRequired: this.cvv_required
      }
    }), await this.refetchPlaceOrderState();
  }
  getPhoneInstance(e) {
    return e && e.getAttribute("data-intl-tel-input-id") ? window.intlTelInputGlobals.getInstance(e) : Gr(e, {
      allowDropdown: !0,
      initialCountry: this.currentCountryCode,
      separateDialCode: !0,
      formatOnDisplay: !1,
      showFlags: !1,
      useFullscreenPopup: !1
    });
  }
  destroyPhoneInstance(e) {
    if (e && e.getAttribute("data-intl-tel-input-id"))
      return e.style.paddingLeft = "0.5rem", window.intlTelInputGlobals.getInstance(e).destroy();
  }
  async checkIsConsumerPresent(e) {
    if (C.isEmail(e)) {
      const r = await this.sdk.idLookupWithEmail(e);
      return r && r.consumerPresent;
    }
    const t = ee(e);
    if (t && t.isValid()) {
      const r = await this.sdk.idLookupWithPhoneNumber(
        t.countryCallingCode,
        t.nationalNumber
      );
      return r && r.consumerPresent;
    }
    return !1;
  }
  areBillingAddressValid(e) {
    return e.length !== 0 && e.every((t) => {
      const { city: r, countryCode: i, zip: d, state: s } = t.maskedBillingAddress, m = !(r != null && r.includes("*")), u = !(i != null && i.includes("*")), g = !(d != null && d.includes("*")), w = !s || !s.includes("*");
      return m && u && g && w;
    });
  }
  async handleCustomerFormSubmit(e) {
    e.preventDefault();
    const t = document.querySelector(
      ".js-customer-form input[name=email]"
    );
    if (!t) {
      console.error("Email field not found");
      return;
    }
    if (!C.isEmail(t.value)) {
      C.displayError(
        clicktopay.errors.invalidEmail.title,
        clicktopay.errors.invalidEmail.message,
        clicktopay.errors.invalidEmail.btn
      ), setTimeout(function() {
        document.getElementById("customer-form").querySelector('button[type="submit"]').classList.remove("disabled");
      }, 20);
      return;
    }
    document.getElementById("customer-form").submit();
  }
  async handleAddressFormSubmit(e, t) {
    if (e.preventDefault(), !t) {
      document.querySelector(".js-address-form form").submit();
      return;
    }
    E.set("customer-entered-address-manually", !0, 3600);
    const r = this.getPhoneInstance(t)._getFullNumber(), i = ee(r);
    if (t.value.trim().length === 0) {
      document.querySelector(".js-address-form form").submit();
      return;
    }
    if (!i || !i.isValid()) {
      C.displayError(
        clicktopay.errors.invalidPhoneNumber.title,
        clicktopay.errors.invalidPhoneNumber.message,
        clicktopay.errors.invalidPhoneNumber.btn
      ), setTimeout(function() {
        document.getElementsByName("confirm-addresses")[0].form.querySelector('button[type="submit"]').classList.remove("disabled");
      }, 20);
      return;
    }
    document.querySelector(".iti__selected-flag").style.display = "none", t.style.paddingLeft = "0.5rem", t.value = this.getPhoneInstance(t)._getFullNumber(), document.querySelector(".js-address-form form").submit();
  }
  submitPaymentForm(e, t, r) {
    var d;
    if (!this.canEnableOrderButton()) {
      console.error(
        "Click To Pay - place order button was not enabled by validation."
      );
      return;
    }
    (d = document.querySelector('#payment-confirmation button[type="submit"]')) == null || d.setAttribute("disabled", "disabled");
    const i = new URL(clicktopay.payment_url);
    i.searchParams.append("transaction_token", e), i.searchParams.append("gateway_transaction_id", r), i.searchParams.append("transaction_amount", t), window.location.href = i.href;
  }
  async handleExpressButtonClick(e) {
    var r, i;
    e.preventDefault();
    let t = [{}];
    this.areBillingAddressValid(this.cards ?? []) && (t = [
      {
        zip_code: this.cards[0].maskedBillingAddress.zip,
        state: (r = this.cards[0].maskedBillingAddress) == null ? void 0 : r.state,
        city: this.cards[0].maskedBillingAddress.city,
        country_code: this.cards[0].maskedBillingAddress.countryCode,
        line1: (i = this.cards[0].maskedBillingAddress) == null ? void 0 : i.line1
      }
    ]), await $.ajax({
      type: "POST",
      url: clicktopay.expressCheckoutUrl,
      data: {
        ajax: !0,
        address: t
      },
      success: function(d) {
        window.location.href = document.getElementById("express-checkout-button").getAttribute("href");
      },
      error: function(d) {
        console.error(d);
      }
    });
  }
  async handleInitialState(e = void 0) {
    if (!this.getCurrentState()) {
      if (this.cards && this.cards.length > 0) {
        await this.displayState(b.CardList);
        return;
      }
      await this.displayState(
        this.isConsumerPresent ? b.OtpForm : b.CardForm,
        e
      );
    }
  }
  async refetchNonce(e = !1) {
    var r, i, d, s;
    let t = await this.sdk.getNonce(clicktopay.jwtToken);
    if (t != null && t.Errors) {
      if (((i = (r = t == null ? void 0 : t.Errors) == null ? void 0 : r.Error[0]) == null ? void 0 : i.ReasonCode) === "CSDK021") {
        if (e) {
          await this.handleError((d = t == null ? void 0 : t.Errors) == null ? void 0 : d.Error[0]);
          return;
        }
        await this.refetchNonce(!0);
      }
      await this.handleError((s = t == null ? void 0 : t.Errors) == null ? void 0 : s.Error[0]);
    }
    this.nonce = t.nonce, this.nonceId = t.nonceId;
  }
  async registerCardInputEventListeners() {
    document.getElementById("card-input-access-your-saved-cards-button").addEventListener("click", async (e) => {
      e.preventDefault(), await this.displayState(b.CardList);
    }), document.getElementById("card-input-access-your-cards-button").addEventListener("click", async (e) => {
      e.preventDefault(), await this.displayState(b.IdLookupForm);
    });
  }
  async registerCardListEventListeners() {
    document.getElementById("card-list-manual-card-entry-button").addEventListener("click", async (e) => {
      e.preventDefault(), await this.displayState(b.CardForm);
    }), document.querySelectorAll(".card-list-not-you-button").forEach((e) => {
      e.addEventListener("click", async (t) => {
        t.preventDefault(), await this.signOut(), await this.displayState(b.IdLookupForm);
      });
    });
  }
  async registerLookupEventListeners() {
    document.querySelectorAll(".id-lookup-manual-card-entry-button").forEach((e) => {
      e.addEventListener("click", async (t) => {
        t.preventDefault(), await this.displayState(b.CardForm);
      });
    }), document.getElementById("id-lookup-continue-with-click-to-pay-button").addEventListener("click", async (e) => {
      document.querySelector(".id-lookup-form-group").classList.remove("error"), e.preventDefault(), document.getElementById(
        "id-lookup-continue-with-click-to-pay-button"
      ).disabled = !0;
      const t = document.getElementsByName("id-lookup-input")[0].value;
      this.isConsumerPresent = await this.checkIsConsumerPresent(t), this.isConsumerPresent ? await this.displayState(b.OtpForm) : (document.getElementById(
        "id-lookup-continue-with-click-to-pay-button"
      ).disabled = !1, document.querySelector(".id-lookup-form-group").classList.add("error"));
    }), document.getElementsByName("id-lookup-input")[0].addEventListener("keyup", async (e) => {
      e.preventDefault(), document.getElementsByName("id-lookup-input")[0].value.length > 0 ? document.getElementById(
        "id-lookup-continue-with-click-to-pay-button"
      ).disabled = !1 : document.getElementById(
        "id-lookup-continue-with-click-to-pay-button"
      ).disabled = !0;
    });
  }
  async registerPlaceOrderEventListeners() {
    if (!document.querySelector(
      '#conditions-to-approve input[type="checkbox"], .js-conditions-to-approve input[type="checkbox"]'
    ))
      return;
    document.querySelector(
      '#conditions-to-approve input[type="checkbox"], .js-conditions-to-approve input[type="checkbox"]'
    ).addEventListener("change", (t) => {
      this.refetchPlaceOrderState();
    });
    const e = this;
    document.querySelectorAll('input[name="payment-option"]').forEach(function(t) {
      t.addEventListener("change", async function(r) {
        e.refetchPlaceOrderState();
      });
    });
  }
  initializePaymentOption() {
    if (document.getElementById("js-clicktopay-payment-form") && !clicktopay.isFallbackPage) {
      this.initializePaymentOptionLabel(), this.initializePlaygroundLoader(), this.createDisabledButtonClass(), this.refetchPlaceOrderState();
      return;
    }
    clicktopay.isOnePageCheckout && C.isPaymentStep() && !clicktopay.isFallbackPage && new Promise(async (e) => {
      const t = setInterval(async () => {
        document.querySelector('[data-module-name*="clicktopay"]') && (clearInterval(t), e());
      }, 10);
    }).then(() => {
      this.initializePaymentOptionLabel(), this.initializePlaygroundLoader(), this.updateSrcMarkLogos(this.availableCardBrands);
    });
  }
  initializePaymentOptionLabel() {
    const e = document.querySelector(
      '[data-module-name*="clicktopay"]'
    );
    if (!e)
      return;
    const t = e.closest(".payment-option");
    if (clicktopay.themeName !== "classic" && !clicktopay.isOnePageCheckout || (t.style.display = "flex", t.style.alignItems = "center", t.style.marginBottom = "0.25rem"), clicktopay.isOnePageCheckout)
      t.querySelector(".payment_content") ? (t.querySelector(".payment_content").innerHTML += clicktopay.srcMark, t.querySelector(".payment_content").style = "display: flex; align-items: center; gap: 8px; margin-bottom: 0;", t.querySelector(".payment_content span").style = "flex-shrink: 0;") : (t.querySelector("label src-mark") || (t.querySelector("label").innerHTML += clicktopay.srcMark), t.querySelector("label").style = "display: flex; align-items: center; gap: 8px; margin-bottom: 0;", t.querySelector(
        "label .payment-call-to-action-and-logo"
      ).style = "flex-shrink: 0;");
    else if (e.labels.length > 0) {
      e.labels[0].innerHTML += clicktopay.srcMark, e.labels[0].style = "display: flex; align-items: center; gap: 8px; margin-bottom: 0; text-align: left;";
      let r = e.labels[0].querySelector("span");
      r && (r.style = "flex-shrink: 0;");
    }
    clicktopay.isOnePageCheckout && this.createPaymentFormIfMissing();
  }
  initializePlaygroundLoader() {
    const e = document.createElement("src-loader");
    e.setAttribute("locale", clicktopay.locale), clicktopay.isDarkTheme && e.setAttribute("dark", "");
    const t = document.querySelector(
      "#clicktopay-card-loading .card-loading-main"
    );
    !t || t.querySelector("src-loader") || t.append(e);
  }
  createPaymentFormIfMissing() {
    const e = document.querySelector(
      '[data-module-name*="clicktopay"]'
    );
    e.dataset.forceDisplay = 0;
    const t = e.id.match(/payment-option-(\d+)/)[1];
    if (!document.querySelector(
      `#pay-with-payment-option-${t}-form`
    )) {
      let d = document.createElement("div");
      d.id = `pay-with-payment-option-${t}-form`, d.classList.add("js-payment-option-form"), e.parentNode.parentNode.insertAdjacentElement(
        "afterend",
        d
      );
    }
    if (!document.querySelector(
      `#pay-with-payment-option-${t}-form form`
    )) {
      let d = document.createElement("form");
      d.id = "payment-form", d.method = "POST", d.action = clicktopay.payment_url;
      const s = document.createElement("button");
      s.style.display = "none", s.id = `pay-with-payment-option-${t}`, s.type = "submit", d.appendChild(s), document.querySelector(`#pay-with-payment-option-${t}-form`).appendChild(d);
    }
  }
  selectPaymentOption() {
    if (C.isPaymentStep() && document.querySelector('input[data-module-name*="clicktopay"]')) {
      document.querySelector('input[data-module-name*="clicktopay"]').setAttribute("checked", "checked");
      const r = `pay-with-payment-option-${document.querySelector(
        '[data-module-name="clicktopay"]'
      ).id.match(/payment-option-(\d+)/)[1]}-form`, i = document.getElementById(r), d = { attributes: !0 }, s = (u, g) => {
        for (const w of u)
          document.getElementById(r).style.display === "none" && document.querySelector('input[name="payment-option"]:checked').dataset.moduleName === clicktopay.name && (document.getElementById(r).style.display = "block", g.disconnect());
      };
      new MutationObserver(s).observe(i, d);
    }
  }
  selectOPCPaymentOption() {
    document.getElementById("checkout") && new Promise(async (e) => {
      const t = setInterval(async () => {
        document.querySelector('[data-module-name*="clicktopay"]') && (clearInterval(t), e());
      }, 10);
    }).then(() => {
      document.querySelector('input[data-module-name*="clicktopay"]').click();
    });
  }
  async clearCardForm() {
    await this.sdk.clearCardForm();
  }
  updateSrcMarkLogos(e) {
    if (this.availableCardBrands = e, this.availableCardBrands.length === 0)
      return;
    const t = clicktopay.cards || [];
    this.availableCardBrands = t.filter(
      (r) => this.availableCardBrands.includes(r)
    ), document.querySelector(".cart-summary #express-checkout-button") && clicktopay.isFasterCheckoutButtonActive && this.updateExpressCheckoutButton(), C.isPaymentStep() && document.querySelector('input[data-module-name*="clicktopay"]') && this.updatePaymentOptionLabel();
  }
  updatePaymentOptionLabel() {
    if (document.querySelectorAll("src-mark").length > 0 && this.availableCardBrands.length > 0) {
      const e = this.availableCardBrands.join(",");
      document.querySelectorAll("src-mark").forEach((t) => {
        t.setAttribute("card-brands", e);
      });
    }
  }
  getCurrentState() {
    return Ze.getState();
  }
  hideDcfScreen() {
    this.isDcfScreenCancelled = !0, document.body.style.overflowY = "", document.getElementById("dcf-overlay").classList.remove("open"), document.getElementById("dcf-screen").classList.remove("open"), document.getElementById("dcf-screen").classList.remove("dcf-open"), this.isDcfScreenOpen = !1;
  }
  initializePhoneInstances() {
    clicktopay.isOnePageCheckout && clicktopay.usePhoneNumberPrefix && !clicktopay.isFallbackPage && (document.querySelector("#thecheckout-address-delivery") && (this.getPhoneInstance(
      document.querySelector('#delivery-address input[name="phone"]')
    ), document.querySelector(
      '#delivery-address input[name="phone"]'
    ).parentElement.style.width = "100%", document.querySelector(
      '#delivery-address input[name="phone"]'
    ).parentElement.style.display = "flex"), document.querySelectorAll("#delivery_phone_mobile").forEach((e) => {
      this.getPhoneInstance(e);
    }));
  }
  isCardFormEntriesValid() {
    return this.getCurrentState() === b.CardForm && this.hasEnteredCardNumber && this.hasConsent && this.isCardEntryFormValid;
  }
  canEnableOrderButton() {
    if (!clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage) {
      if (!document.querySelector('input[name="payment-option"]:checked'))
        return !1;
      if (document.querySelector('input[name="payment-option"]:checked').dataset.moduleName !== clicktopay.name)
        return !0;
      const e = document.querySelector(
        '#conditions-to-approve input[type="checkbox"], .js-conditions-to-approve input[type="checkbox"]'
      );
      if (e && !(e != null && e.checked))
        return !1;
    }
    return this.getCurrentState() === b.CardList && this.cvv_required && !this.cvv_status || this.getCurrentState() === null ? !1 : !!(this.isCardFormEntriesValid() || this.getCurrentState() === b.CardList);
  }
  refetchPlaceOrderState() {
    if (clicktopay.isOnePageCheckout || clicktopay.isFallbackPage)
      this.canEnableOrderButton() ? (document.querySelector(".pay-clicktopay").classList.remove("disabled"), document.querySelector(".pay-clicktopay").disabled = !1) : (document.querySelector(".pay-clicktopay").classList.add("disabled"), document.querySelector(".pay-clicktopay").disabled = !0);
    else {
      if (!document.getElementById("js-clicktopay-payment-form") || !document.querySelector("#payment-confirmation .ps-shown-by-js button"))
        return;
      this.canEnableOrderButton() ? this.enableOrderButton() : this.disableOrderButton();
    }
  }
  getPhoneElement() {
    return document.querySelector(".js-address-form input[name=phone]") && document.querySelector(".js-address-form input[name=phone_mobile]") ? document.querySelector(
      ".js-address-form input[name=phone_mobile]"
    ) : document.querySelector(".js-address-form input[name=phone]") ? document.querySelector(".js-address-form input[name=phone]") : document.querySelector(".js-address-form input[name=phone_mobile]") ? document.querySelector(
      ".js-address-form input[name=phone_mobile]"
    ) : document.querySelector(".js-address-form input[name=phone]");
  }
  createDisabledButtonClass() {
    if (!document.getElementById("js-clicktopay-payment-form"))
      return;
    const e = document.querySelector("#payment-confirmation button");
    if (!e)
      return;
    const t = window.getComputedStyle(e), r = Array.from(t).map((d) => `${d}: ${t.getPropertyValue(d)}`).join(" !important; "), i = document.createElement("style");
    i.type = "text/css", i.innerHTML = `
  .clicktopay-disabled {
    ${r};
    pointer-events: none !important;
  }
`, document.head.appendChild(i);
  }
  async handleError(e) {
    var t, r, i;
    switch (document.querySelector(".dcf-iframe").src = "", this.isThreeDs = !1, e.ReasonCode) {
      case "CSDK003":
        this.hideDcfScreen(), C.displayError(
          clicktopay.errors.somethingWentWrong.title,
          clicktopay.errors.somethingWentWrong.message,
          clicktopay.errors.somethingWentWrong.btn,
          () => {
            clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
          }
        );
        break;
      case "CSDK008":
        if (clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage ? ($(".clicktopay-form")[0].style.display = "block", $(".dcf-iframe")[0].style.display = "none", $("#checkout")[0].style.overflowY = "auto", document.getElementById("dcf-screen").classList.remove("dcf-open")) : this.hideDcfScreen(), C.displayError(
          clicktopay.errors.somethingWentWrongWithThisCard.title,
          clicktopay.errors.somethingWentWrongWithThisCard.message,
          clicktopay.errors.somethingWentWrongWithThisCard.btn
        ), this.getCurrentState() === b.CardList) {
          await this.getCards();
          const d = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
          this.disabledCards.push(d), this.cards.forEach((s) => {
            this.disabledCards.includes(s.srcDigitalCardId) && (s.digitalCardData.status = "DISABLED");
          }), await Z.create(this.cards, null), (t = document.querySelector("#payment-confirmation button")) == null || t.classList.remove("disabled");
        }
        break;
      case "CSDK017":
        if (await this.getCards(), this.getCurrentState() === b.CardList) {
          this.cards.forEach((s) => {
            this.disabledCards.includes(s.srcDigitalCardId) && (s.digitalCardData.status = "DISABLED");
          });
          const d = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
          await Z.create(this.cards, d);
        }
        clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage ? ($(".clicktopay-form")[0].style.display = "block", $(".dcf-iframe")[0].hide(), $("#checkout")[0].style.overflowY = "auto", document.getElementById("dcf-screen").classList.remove("dcf-open")) : this.hideDcfScreen(), (r = document.querySelector("#payment-confirmation button")) == null || r.classList.remove("disabled");
        break;
      case "CSDK018":
        if (clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage ? ($(".clicktopay-form")[0].style.display = "block", $(".dcf-iframe")[0].style.display = "none", $("#checkout")[0].style.overflowY = "auto", document.getElementById("dcf-screen").classList.remove("dcf-open")) : this.hideDcfScreen(), C.displayError(
          clicktopay.errors.somethingWentWrongUseDifferentCard.title,
          clicktopay.errors.somethingWentWrongUseDifferentCard.message,
          clicktopay.errors.somethingWentWrongUseDifferentCard.btn
        ), this.getCurrentState() === b.CardList) {
          await this.getCards(), this.cards.forEach((s) => {
            this.disabledCards.includes(s.srcDigitalCardId) && (s.digitalCardData.status = "DISABLED");
          });
          const d = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
          await Z.create(this.cards, d), (i = document.querySelector("#payment-confirmation button")) == null || i.classList.remove("disabled");
        }
        break;
      case "CSDK020":
        this.hideDcfScreen(), C.displayError(
          clicktopay.errors.threeDsFailed.title,
          clicktopay.errors.threeDsFailed.message,
          clicktopay.errors.threeDsFailed.btn,
          () => {
            location.reload();
          }
        ), E.set("clicktopay-3ds-error-occurred", !0);
        break;
      case "CSDK021":
        this.hideDcfScreen(), C.displayError(
          clicktopay.errors.somethingWentWrong.title,
          clicktopay.errors.somethingWentWrong.message,
          clicktopay.errors.somethingWentWrong.btn,
          () => {
            clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
          }
        );
        break;
      case "CSDK024":
        clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage ? ($(".clicktopay-form")[0].style.display = "block", $(".dcf-iframe")[0].style.display = "none", $("#checkout")[0].style.overflowY = "auto", document.getElementById("dcf-screen").classList.remove("dcf-open")) : this.hideDcfScreen(), await this.displayState(b.CardList);
        break;
      case "CSDK025":
        clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage ? ($(".clicktopay-form")[0].style.display = "block", $(".dcf-iframe")[0].style.display = "none", $("#checkout")[0].style.overflowY = "auto", document.getElementById("dcf-screen").classList.remove("dcf-open")) : this.hideDcfScreen(), await this.displayState(b.CardForm);
        break;
      case "CSDK026":
        clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage ? ($(".clicktopay-form")[0].style.display = "block", $(".dcf-iframe")[0].style.display = "none", $("#checkout")[0].style.overflowY = "auto", document.getElementById("dcf-screen").classList.remove("dcf-open")) : this.hideDcfScreen(), await this.signOut(), await this.displayState(b.IdLookupForm);
        break;
      default:
        this.hideDcfScreen(), C.displayError(
          clicktopay.errors.somethingWentWrong.title,
          clicktopay.errors.somethingWentWrong.message,
          clicktopay.errors.somethingWentWrong.btn,
          () => {
            clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
          }
        );
        break;
    }
    !this.isDcfScreenOpen && clicktopay.isOnePageCheckout && !clicktopay.isFallbackPage && this.initializePhoneInstances();
  }
  enableOrderButton() {
    document.querySelectorAll(".clicktopay-disabled").forEach(function(e) {
      e.classList.remove("clicktopay-disabled"), e.disabled = !1;
    });
  }
  disableOrderButton() {
    const e = document.querySelector(
      "#payment-confirmation .ps-shown-by-js button"
    );
    e.classList.add("clicktopay-disabled"), e.disabled = !0;
  }
}
class Hr {
  constructor(e) {
    this.client = e;
  }
  async prerender() {
    document.querySelector(".dcf-content").style.display = "flex";
    try {
      this.client.initializeCTP();
    } catch {
      window.initRejectedHandler();
    }
    this.client.isInitialized().then(async () => {
      console.debug("Click to Pay - initialized CTP"), console.debug("Click to Pay - running getCards"), this.client.getCards().then(async (e) => {
        if (console.debug(
          "Click to Pay - getCards returned " + e.length + " cards"
        ), e.length === 0) {
          let t = !1;
          clicktopay.customer.email && (console.debug(
            "Click to Pay - running isConsumerPresent with email"
          ), t = await this.client.checkIsConsumerPresent(
            clicktopay.customer.email,
            !1
          )), clicktopay.customer.phone_number && !t && (console.debug(
            "Click to Pay - running isConsumerPresent with phone number"
          ), t = await this.client.checkIsConsumerPresent(
            clicktopay.customer.phone_number,
            !1
          )), this.client.isConsumerPresent = t;
        }
        console.debug("Click to Pay - initialization finished"), this.client.hasFinishedInitialization = !0;
      });
    });
  }
  async render() {
    window.innerWidth > 768 ? (document.getElementById("dcf-screen").classList.remove("action-sheet"), document.getElementById("dcf-screen").classList.add("modal-sheet")) : (document.getElementById("dcf-screen").classList.remove("modal-sheet"), document.getElementById("dcf-screen").classList.add("action-sheet")), window.addEventListener("resize", (t) => {
      const r = document.getElementById(
        "card-list-dropdown-content"
      ), i = document.getElementById(
        "card-list-dropdown-button"
      );
      r.style.width = i.offsetWidth + "px", window.innerWidth > 768 ? (document.getElementById("dcf-screen").classList.remove("action-sheet"), document.getElementById("dcf-screen").classList.add("modal-sheet")) : (document.getElementById("dcf-screen").classList.remove("modal-sheet"), document.getElementById("dcf-screen").classList.add("action-sheet"));
    }), await this.client.registerCardInputEventListeners(), await this.client.registerCardListEventListeners(), await this.client.registerLookupEventListeners(), await this.client.isInitialized(), await this.client.hasPerformedLookup(), await this.client.handleInitialState();
    const e = this;
    $(".pay-clicktopay").on("click", async function(t) {
      if (t.preventDefault(), e.client.getCurrentState() === b.CardForm) {
        await z.pay(
          e.client.nonce,
          e.client.nonceId,
          e.client.cvv_required
        );
        return;
      }
      if (e.client.getCurrentState() === b.CardList) {
        await window.onDCF();
        const r = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
        await z.pay(
          e.client.nonce,
          e.client.nonceId,
          e.client.cvv_required,
          r
        );
        return;
      }
    });
  }
  // TODO add handlers for SDK.
}
class Vr {
  constructor(e) {
    this.client = e, this.emailQuerySelectors = [
      '#checkout form[id="form_customer"] input[id="customer_email"]',
      '#checkout form[id="customer-form"] input[name="email"]',
      '#checkout #thecheckout-account input[name="email"]'
    ], this.phoneQuerySelectors = [
      '#checkout #delivery-address [name="phone"]',
      '#checkout [name="delivery_phone_mobile"]'
    ];
  }
  async prerender() {
    const e = this;
    document.querySelector("#checkout") && (document.querySelector(".dcf-content").style.display = "flex"), e.client.initializePaymentOption(), clicktopay.isDefaultPaymentOption && (e.client.selectOPCPaymentOption(), $(document).on("opc-load-review:completed", {}, () => {
      e.client.selectOPCPaymentOption();
    }));
    try {
      e.client.initializeCTP();
    } catch {
      window.initRejectedHandler();
    }
    e.client.isInitialized().then(async () => {
      console.debug("Click to Pay - initialized CTP"), console.debug("Click to Pay - running getCards"), e.client.getCards().then(async (t) => {
        if (console.debug(
          "Click to Pay - getCards returned " + t.length + " cards"
        ), t.length === 0) {
          let r = !1;
          clicktopay.customer.email && (console.debug(
            "Click to Pay - running isConsumerPresent with email"
          ), r = await e.client.checkIsConsumerPresent(
            clicktopay.customer.email,
            !1
          ), r && (e.client.isConsumerPresentFieldId = "customer-email")), clicktopay.customer.phone_number && !r && (console.debug(
            "Click to Pay - running isConsumerPresent with phone number"
          ), r = await e.client.checkIsConsumerPresent(
            clicktopay.customer.phone_number,
            !1
          ), r && (e.client.isConsumerPresentFieldId = "customer-phone-number")), e.client.isConsumerPresent = r;
        }
        console.debug("Click to Pay - initialization finished"), e.client.hasFinishedInitialization = !0;
      });
    });
  }
  async render() {
    const e = this;
    document.querySelector("#checkout") && (window.innerWidth > 768 ? (document.getElementById("dcf-screen").classList.remove("action-sheet"), document.getElementById("dcf-screen").classList.add("modal-sheet")) : (document.getElementById("dcf-screen").classList.remove("modal-sheet"), document.getElementById("dcf-screen").classList.add("action-sheet")), window.addEventListener("resize", (t) => {
      const r = document.getElementById(
        "card-list-dropdown-content"
      ), i = document.getElementById(
        "card-list-dropdown-button"
      );
      r.style.width = i.offsetWidth + "px", window.innerWidth > 768 ? (document.getElementById("dcf-screen").classList.remove("action-sheet"), document.getElementById("dcf-screen").classList.add("modal-sheet")) : (document.getElementById("dcf-screen").classList.remove("modal-sheet"), document.getElementById("dcf-screen").classList.add("action-sheet"));
    })), (E.get("clicktopay-express-checkout") || E.get("clicktopay-is-default-option")) && e.client.selectOPCPaymentOption(), E.get("clicktopay-3ds-error-occurred") && (e.client.selectOPCPaymentOption(), clicktopay.isOnePageCheckout && (e.client.showDcfScreen(), clicktopay.usePhoneNumberPrefix && e.destroyPhoneInstances(), await e.client.isInitialized(), await e.client.hasPerformedLookup(), await e.client.handleInitialState()), E.remove("clicktopay-3ds-error-occurred")), document.querySelector("#checkout") && (await e.client.registerCardInputEventListeners(), await e.client.registerCardListEventListeners(), await e.client.registerLookupEventListeners(), await e.handleModalPayment());
  }
  async handleModalPayment() {
    const e = this;
    if (clicktopay.usePhoneNumberPrefix && document.querySelector("#thecheckout-address-delivery") && document.querySelector('#delivery-address input[name="phone"]')) {
      e.client.getPhoneInstance(
        document.querySelector('#delivery-address input[name="phone"]')
      );
      const t = $('#delivery-address input[name="phone"]').parents(
        "label"
      )[0];
      t.style.display = "flex", t.style.flexDirection = "column", t.style.width = "100%";
    }
    [...e.emailQuerySelectors, ...e.phoneQuerySelectors].forEach(
      (t) => {
        e.registerInputLookupListeners(t);
      }
    ), document.addEventListener(
      "click",
      function(t) {
        var r, i, d, s;
        if (clicktopay.usePhoneNumberPrefix) {
          let m = !1;
          (t.target.matches("button[id=btn_place_order]") || t.target.matches("button[id=btn-place_order]") || t.target.matches("button[id=confirm_order]")) && (m = !0), (i = (r = prestashop == null ? void 0 : prestashop.selectors) == null ? void 0 : r.checkout) != null && i.confirmationSelector && $(
            prestashop.selectors.checkout.confirmationSelector + " button"
          )[0] === t.target && (m = !0), (s = (d = prestashop == null ? void 0 : prestashop.selectors) == null ? void 0 : d.checkout) != null && s.paymentBinary && $(prestashop.selectors.checkout.paymentBinary + " button")[0] === t.target && (m = !0), m && e.destroyPhoneInstances();
        }
        t.target.id === "mc-ctp-src-mark" && document.querySelector('input[data-module-name*="clicktopay"]').click();
      },
      !0
    ), $("body").on(
      "submit",
      "[id^=pay-with-][id$=-form] form",
      async function(t) {
        if ($(
          '[data-module-name*="clicktopay"]:checked'
        ).length > 0) {
          if (t.preventDefault(), t.stopImmediatePropagation(), $('[data-module-name*="clicktopay"]:disabled').length)
            return;
          if (await e.client.displayState(null), await C.toggleLoader(!0), await e.client.showDcfScreen(), await e.client.isInitialized(), await e.client.hasPerformedLookup(), e.client.getCurrentState() === b.CardList) {
            await e.client.getCards();
            const i = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
            e.client.disabledCards.push(i), e.client.cards.forEach((d) => {
              e.client.disabledCards.includes(d.srcDigitalCardId) && (d.digitalCardData.status = "DISABLED");
            }), await Z.create(e.client.cards, null);
          }
          await e.client.handleInitialState();
        }
      }
    ), $(".pay-clicktopay").on("click", async function(t) {
      await e.handlePaymentFormSubmit(t);
    }), $(".clicktopay-form-close-button").on("click", async function(t) {
      await e.client.hideDcfScreen(), e.client.initializePhoneInstances();
    });
  }
  async handlePaymentFormSubmit(e) {
    const t = this;
    if (e.preventDefault(), !!document.querySelector('[data-module-name*="clicktopay"]:checked')) {
      if (t.client.getCurrentState() === b.CardForm) {
        $(".clicktopay-form")[0].style.display = "none", await z.pay(
          t.client.nonce,
          t.client.nonceId,
          t.client.cvv_required
        );
        return;
      }
      if (t.client.getCurrentState() === b.CardList) {
        $(".clicktopay-form")[0].style.display = "none", await window.onDCF();
        const r = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
        await z.pay(
          t.client.nonce,
          t.client.nonceId,
          t.client.cvv_required,
          r
        );
        return;
      }
    }
  }
  registerInputLookupListeners(e) {
    const t = this;
    document.querySelector(e) && document.querySelector(e).addEventListener("change", async function(r) {
      if (!document.querySelector(e) || $('[data-module-name*="clicktopay"]:disabled').length)
        return;
      let i = !t.client.isConsumerPresent || t.client.isConsumerPresent && t.client.isConsumerPresentFieldId === e;
      t.client.isConsumerPresent && t.emailQuerySelectors.includes(e) && t.client.isConsumerPresentFieldId === "customer-email" && r.target.value !== clicktopay.customer.email && (console.debug("Click to Pay - running isConsumerPresent with email"), i = !0);
      let d = "";
      t.phoneQuerySelectors.includes(e) && (clicktopay.usePhoneNumberPrefix ? d = t.client.getPhoneInstance(r.target)._getFullNumber() : d = $(r.target).siblings(".country-call-prefix").text() + r.target.value), t.client.isConsumerPresent && t.phoneQuerySelectors.includes(e) && t.client.isConsumerPresentFieldId === "customer-phone-number" && d !== clicktopay.customer.phone_number && (console.debug(
        "Click to Pay - running isConsumerPresent with phone number"
      ), i = !0), i && (await t.client.isInitialized(), await t.client.hasPerformedLookup(), await t.client.displayState(null), await C.toggleLoader(!0), t.phoneQuerySelectors.includes(e) ? t.client.isConsumerPresent = await t.client.checkIsConsumerPresent(d) : t.client.isConsumerPresent = await t.client.checkIsConsumerPresent(r.target.value), t.client.isConsumerPresent && (t.client.isConsumerPresentFieldId = e));
    });
  }
  destroyPhoneInstances() {
    const e = this;
    e.phoneQuerySelectors.forEach(function(t) {
      if (!document.querySelector(t))
        return;
      const r = document.querySelector(t);
      if (!r.value) {
        if ($("#thecheckout-address-delivery").length) {
          const i = e.client.getPhoneInstance(r);
          i.flagsContainer.style.height = document.querySelector('#delivery-address input[name="phone"]').offsetHeight + "px";
        }
        return;
      }
      r.value = e.client.getPhoneInstance(r)._getFullNumber(), e.client.destroyPhoneInstance(r);
    });
  }
  // TODO add handlers for SDK.
}
class Kr {
  constructor(e) {
    H(this, "idLookupStorageKey", "idLookup_" + clicktopay.customer.email);
    H(this, "customerRecognisedByEmail", "customer-email");
    H(this, "customerRecognisedByPhone", "customer-phone-number");
    H(this, "customerIsNew", "customer-new");
    this.client = e;
  }
  async prerender() {
    const e = this;
    document.querySelector("#checkout") && (document.querySelector(".dcf-content").style.display = "flex"), e.client.initializePaymentOption(), (clicktopay.isDefaultPaymentOption || E.get("clicktopay-express-checkout")) && e.client.selectPaymentOption(), e.initializeAction();
  }
  initializeAction() {
    var m;
    const e = this, t = e.getSessionStorageIdLookup(), { email: r, phone_number: i } = clicktopay.customer, d = t ? e.isRecognizedUser(t) : void 0, s = (u) => {
      u && (e.client.isConsumerPresentFieldId = t), e.client.isConsumerPresent = u;
    };
    switch (!0) {
      case (((m = document.body) == null ? void 0 : m.id) === "cart" && !!r && !!i):
        t ? s(d) : e.initializeClickToPay(r, i);
        break;
      case (e.isElementExistsAndVisible(
        "#checkout-addresses-step > .content"
      ) && !!r):
        t === this.customerRecognisedByEmail ? s(d) : e.initializeClickToPay(r, null);
        break;
      case !!document.getElementById("js-clicktopay-payment-form"):
        t && s(d), e.initializeClickToPay(r, i, d), e.removeSessionStorageIdLookup();
        break;
    }
  }
  initializeClickToPay(e, t, r = void 0) {
    const i = this;
    try {
      i.client.initializeCTP(r);
    } catch {
      window.initRejectedHandler();
    }
    i.client.isInitialized().then(async () => {
      console.debug("Click to Pay - initialized CTP"), console.debug("Click to Pay - running getCards");
      const d = await i.client.getCards();
      console.debug(
        "Click to Pay - getCards returned " + d.length + " cards"
      ), d.length === 0 && await i.checkConsumerPresence(e, t), console.debug("Click to Pay - initialization finished"), i.client.hasFinishedInitialization = !0;
    });
  }
  async checkConsumerPresence(e, t) {
    const r = this;
    let i = !1;
    e && (console.debug("Click to Pay - running isConsumerPresent with email"), i = await r.client.checkIsConsumerPresent(e), i && (r.setSessionStorageIdLookup(r.customerRecognisedByEmail), r.client.isConsumerPresentFieldId = r.customerRecognisedByEmail)), t && !i && (console.debug(
      "Click to Pay - running isConsumerPresent with phone number"
    ), i = await r.client.checkIsConsumerPresent(t), i ? (r.setSessionStorageIdLookup(r.customerRecognisedByPhone), r.client.isConsumerPresentFieldId = r.customerRecognisedByPhone) : r.setSessionStorageIdLookup(r.customerIsNew)), r.client.isConsumerPresent = i;
  }
  isRecognizedUser(e) {
    return [
      this.customerRecognisedByEmail,
      this.customerRecognisedByPhone
    ].includes(e);
  }
  setSessionStorageIdLookup(e) {
    E.set(this.idLookupStorageKey, e);
  }
  getSessionStorageIdLookup() {
    return E.get(this.idLookupStorageKey);
  }
  removeSessionStorageIdLookup() {
    E.remove(this.idLookupStorageKey);
  }
  async render() {
    var t;
    const e = this;
    document.getElementById("js-clicktopay-payment-form") && (window.innerWidth > 768 ? (document.getElementById("dcf-screen").classList.remove("action-sheet"), document.getElementById("dcf-screen").classList.add("modal-sheet")) : (document.getElementById("dcf-screen").classList.remove("modal-sheet"), document.getElementById("dcf-screen").classList.add("action-sheet")), window.addEventListener("resize", (r) => {
      const i = document.getElementById(
        "card-list-dropdown-content"
      ), d = document.getElementById(
        "card-list-dropdown-button"
      );
      i.style.width = d.offsetWidth + "px", window.innerWidth > 768 ? (document.getElementById("dcf-screen").classList.remove("action-sheet"), document.getElementById("dcf-screen").classList.add("modal-sheet")) : (document.getElementById("dcf-screen").classList.remove("modal-sheet"), document.getElementById("dcf-screen").classList.add("action-sheet"));
    })), document.querySelector('input[data-module-name="clicktopay"]') && (E.remove("clicktopay-is-default-option"), (t = document.getElementById("clicktopay-card-list-shipping-address")) == null || t.addEventListener("click", (r) => {
      r.target.classList.contains(
        "clicktopay-shipping-address-button"
      ) && E.set("clicktopay-is-default-option", !0);
    })), (E.get("clicktopay-express-checkout") || E.get("clicktopay-is-default-option")) && e.client.selectPaymentOption(), E.get("clicktopay-3ds-error-occurred") && (e.client.selectPaymentOption(), E.remove("clicktopay-3ds-error-occurred")), document.getElementById("js-clicktopay-payment-form") && (await e.client.registerCardInputEventListeners(), await e.client.registerCardListEventListeners(), await e.client.registerLookupEventListeners()), await e.handleEmbeddedPayment();
  }
  async handleEmbeddedPayment() {
    const e = this;
    if (document.getElementById("customer-form") && document.getElementById("customer-form").addEventListener("submit", async function(i) {
      await e.client.handleCustomerFormSubmit(i);
    }), document.getElementsByName("confirm-addresses").length && document.getElementsByName("confirm-addresses")[0].addEventListener("click", async function() {
      await E.set("customer-entered-address-manually", !0);
    }), document.getElementsByName("confirm-addresses").length && (document.querySelector(".js-address-form input[name=phone]") || document.querySelector(".js-address-form input[name=phone_mobile]")) && (e.client.getPhoneInstance(e.client.getPhoneElement()), e.client.getPhoneElement().addEventListener("countrychange", function() {
      e.client.currentCountryCode = window.intlTelInputGlobals.getInstance(e.client.getPhoneElement()).getSelectedCountryData().iso2;
    }), prestashop.on("updatedAddressForm", () => {
      e.client.getPhoneElement().addEventListener("countrychange", function() {
        e.client.currentCountryCode = window.intlTelInputGlobals.getInstance(e.client.getPhoneElement()).getSelectedCountryData().iso2;
      }), e.client.getPhoneInstance(e.client.getPhoneElement()), document.querySelector(".js-address-form form").addEventListener("submit", async function(i) {
        await e.idLookupPhoneOnAddressFormSubmit(
          i,
          e.client.getPhoneElement()
        ), await e.client.handleAddressFormSubmit(
          i,
          e.client.getPhoneElement()
        );
      });
    }), document.querySelector(".js-address-form form").addEventListener("submit", async function(i) {
      await e.idLookupPhoneOnAddressFormSubmit(
        i,
        e.client.getPhoneElement()
      ), await e.client.handleAddressFormSubmit(
        i,
        e.client.getPhoneElement()
      );
    })), !document.getElementById("js-clicktopay-payment-form"))
      return;
    await e.client.registerPlaceOrderEventListeners(), document.querySelector('input[data-module-name="clicktopay"]') && (E.get("clicktopay-express-checkout") || E.get("clicktopay-is-default-option")) && e.client.selectPaymentOption(), document.getElementById("mc-ctp-src-mark") && document.getElementById("mc-ctp-src-mark").addEventListener("click", function() {
      document.querySelector('input[data-module-name="clicktopay"]').click();
    }), await e.client.isInitialized(), await e.client.hasPerformedLookup();
    const t = e.getSessionStorageIdLookup(), r = t ? e.isRecognizedUser(t) : void 0;
    await e.client.handleInitialState(r), document.querySelector('input[data-module-name="clicktopay"]') && document.querySelector('input[data-module-name="clicktopay"]').checked && await e.client.handleInitialState(), document.querySelector('#payment-confirmation button[type="submit"]') && document.querySelector('#payment-confirmation button[type="submit"]').addEventListener("click", async function(i) {
      document.querySelector('input[data-module-name="clicktopay"]').checked && (i.preventDefault(), i.stopImmediatePropagation(), document.getElementById("js-clicktopay-payment-form").querySelector('button[type="submit"]').click());
    }), document.getElementById("js-clicktopay-payment-form").addEventListener("submit", (i) => {
      i.preventDefault(), e.handlePaymentFormSubmit(this);
    }), document.querySelectorAll('input[name="payment-option"]').forEach(function(i) {
      i.addEventListener("change", async function(d) {
        clicktopay.name === this.dataset.moduleName && this.checked ? await e.client.handleInitialState() : await e.client.displayState(null), e.client.getCurrentState() === b.CardForm && await e.client.sdk.createCardEntryForm(), e.client.getCurrentState() === b.OtpForm && await e.client.displayState(b.OtpForm);
      });
    });
  }
  async handlePaymentFormSubmit(e) {
    if (document.querySelector('[data-module-name*="clicktopay"]:checked')) {
      if (e.client.disableOrderButton(), e.client.getCurrentState() === b.CardForm) {
        document.getElementById("dcf-overlay").classList.add("open"), document.querySelector(".loader").style.removeProperty("display"), await z.pay(
          e.client.nonce,
          e.client.nonceId,
          e.client.cvv_required
        ), e.client.enableOrderButton();
        return;
      }
      if (e.client.getCurrentState() === b.CardList) {
        document.getElementById("dcf-overlay").classList.add("open"), document.querySelector(".loader").style.removeProperty("display");
        const t = document.querySelector(".card-list-dropdown-content-card-option.selected").getAttribute("data-id");
        await z.pay(
          e.client.nonce,
          e.client.nonceId,
          e.client.cvv_required,
          t
        ), await window.onDCF(), e.client.enableOrderButton();
        return;
      }
    }
  }
  // TODO add handlers for SDK.
  async idLookupPhoneOnAddressFormSubmit(e, t) {
    e.preventDefault();
    const r = this, i = r.getSessionStorageIdLookup() === r.customerRecognisedByEmail, d = r.client.getPhoneInstance(t)._getFullNumber(), s = ee(d);
    !i && (s != null && s.nationalNumber) && s.isValid() && await Promise.race([
      r.checkConsumerPresence(null, s.number),
      new Promise((m) => setTimeout(m, 1e3))
      // 1 second timeout
    ]);
  }
  isElementExistsAndVisible(e) {
    const t = document.querySelector(e);
    if (!t)
      return !1;
    const r = window.getComputedStyle(t);
    return r.display !== "none" && r.visibility !== "hidden" && r.opacity !== "0";
  }
}
/**
 * NOTICE OF LICENSE
 *
 * @author    Mastercard Inc. www.mastercard.com
 * @copyright Copyright (c) permanent, Mastercard Inc.
 * @license   Apache-2.0
 *
 * @see       /LICENSE
 *
 * International Registered Trademark & Property of Mastercard Inc.
 */
if (typeof clicktopay < "u") {
  const n = new zr(), e = new Hr(n), t = new Vr(n), r = new Kr(n);
  document.getElementById("js-delivery") && E.set("guest_visited_shipping_step", clicktopay.customer.is_guest), document.addEventListener("DOMContentLoaded", async function() {
    document.querySelector(".cart-summary #express-checkout-button") && clicktopay.isFasterCheckoutButtonActive && (document.getElementById("express-checkout-button").addEventListener("click", async (i) => {
      i.preventDefault(), !clicktopay.customer.shippingAddress && !clicktopay.customer.billingAddress && (await n.isInitialized(), await n.hasPerformedLookup()), E.set("clicktopay-express-checkout", !0), await n.handleExpressButtonClick(i);
    }), !clicktopay.customer.shippingAddress && !clicktopay.customer.billingAddress && (await n.isInitialized(), await n.hasPerformedLookup()), await n.showExpressCheckoutButton(), prestashop.on("updatedCart", () => {
      n.updateSrcMarkLogos(n.availableCardBrands);
    })), document.querySelector(".cart-summary .cart-detailed-actions .btn") && document.querySelector(".cart-summary .cart-detailed-actions .btn").addEventListener("click", async (i) => {
      E.set("clicktopay-express-checkout", !1);
    });
  }), clicktopay.isFallbackPage ? (e.prerender(), document.addEventListener("DOMContentLoaded", async function() {
    await e.render();
  })) : clicktopay.isOnePageCheckout ? (t.prerender(), document.addEventListener("DOMContentLoaded", async function() {
    await t.render();
  })) : (r.prerender(), document.addEventListener("DOMContentLoaded", async function() {
    await r.render();
  })), purchaseResponseCallback = async (i) => {
    var d;
    if (console.debug("Click to Pay - paying with card ended, handling response."), i != null && i.Errors) {
      console.error("purchaseResponseCallback", i), await n.handleError((d = i == null ? void 0 : i.Errors) == null ? void 0 : d.Error[0]), await n.refetchNonce();
      return;
    }
    n.isThreeDs && (document.getElementById("challenge").style.display = "none", document.getElementById("dcf-loading").style.display = "flex"), n.submitPaymentForm(
      i.purchaseTransactionToken,
      i.transactionAmount,
      i.gatewayTransactionId
    );
  }, window.initRejectedHandler = async (i) => {
    console.error("initRejectedHandler", i), clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
  }, window.initResolvedHandler = async (i) => {
    var d;
    n.nonce = i.nonce, n.nonceId = i.nonceId, n.initialized = !0, n.updateSrcMarkLogos(i.availableCardBrands || []), n.cvv_required = ((d = i.customData) == null ? void 0 : d.cvv_required) ?? !1;
  }, window.otpResolveHandler = async (i) => {
    if (i.filter(
      (d) => ["ACTIVE", "SUSPENDED"].includes(d.digitalCardData.status)
    ).length > 0) {
      n.cards = i, await n.displayState(b.CardList);
      return;
    }
    await n.displayState(b.CardForm);
  }, window.otpRejectHandler = async (i) => {
    var d, s;
    console.error("otp-rejected", i), !["CSDK003", "CSDK006"].includes((s = (d = i == null ? void 0 : i.Error) == null ? void 0 : d[0]) == null ? void 0 : s.ReasonCode) && (n.hideDcfScreen(), C.displayError(
      clicktopay.errors.somethingWentWrong.title,
      clicktopay.errors.somethingWentWrong.message,
      clicktopay.errors.somethingWentWrong.btn,
      () => {
        clicktopay.isFallbackPage ? window.location.href = clicktopay.orderRedirectUrl : C.disablePaymentOption();
      }
    ));
  }, window.onGuestCheckout = async () => {
    await n.displayState(b.CardForm);
  }, window.purchaseResponseHandler = (i) => {
    console.log(i);
  }, window.onCardNumberInputListener = (i) => {
    n.hasEnteredCardNumber = !0, n.refetchPlaceOrderState(), document.querySelector(".card-input-main").classList.toggle("card-entered", i), document.getElementById("card-input-access-your-cards-step").classList.toggle("ps-hidden", i);
  }, window.notYouEventListener = async () => {
    await n.signOut(), await n.displayState(b.IdLookupForm);
  }, window.onConsentChange = (i) => {
    var d;
    n.hasConsent = i, n.refetchPlaceOrderState(), E.get("customer-entered-address-manually") || (d = document.getElementById("clicktopay-card-input-shipping-address")) == null || d.classList.toggle("ps-hidden", !i);
  }, window.onDCF = async () => {
    n.showDcfScreen();
  }, window.on3DSChallenge = async () => {
    document.getElementById("dcf-screen").classList.add("open"), document.getElementById("dcf-loading").style.display = "flex", $(".dcf-iframe").hide(), $("#device-fingerprint").show();
    const i = setInterval(() => {
      const d = document.querySelector("#challenge iframe");
      d && (d.onload = () => {
        document.getElementById("dcf-loading").style.display = "none", $("#challenge").show();
      }, clearInterval(i));
    }, 200);
    n.isThreeDs = !0;
  }, window.onCardEntryFormStatusListener = async (i) => {
    n.isCardEntryFormValid = i, n.refetchPlaceOrderState();
  }, window.onCvvFormStatusListener = async (i) => {
    n.cvv_status = i, await n.refetchPlaceOrderState();
  }, window.fetchInstallmentsForPanAndAmount = async () => {
    const i = await z.getOrderDetails();
    await n.sdk.fetchInstallments(
      i.amount,
      i.currency
    );
  }, window.showPreInitOtpForm = async () => {
    var i, d;
    (i = document.getElementById("mc-isv-src-otp-input")) == null || i.style.setProperty(
      "--src-otp-input-content-container-margin-bottom",
      "0px"
    ), (d = document.getElementById("mc-isv-src-otp-input")) == null || d.style.setProperty("--src-main-margin-bottom-md", "0px"), await C.toggleLoader(!1), document.getElementById("otp-form").classList.add("active");
  }, window.showPreInitCardForm = async () => {
    await C.toggleLoader(!1), document.getElementById("clicktopay-card-input-form").classList.add("active"), document.getElementById("card-input-access-your-cards-button").classList.remove("d-hidden");
  }, $(document).on("opc-load-review:completed", function() {
    n.initializePaymentOption(), document.getElementById("panel_address_delivery") && (document.getElementById("panel_address_delivery").style.zIndex = 10, n.getPhoneInstance(document.getElementById("delivery_phone_mobile")));
  }), prestashop.on("thecheckout_updatePaymentBlock", function() {
    n.initializePaymentOption(), n.updateSrcMarkLogos(n.availableCardBrands);
  }), $(document).on("thecheckout_Address_Modified", function() {
    if (clicktopay.usePhoneNumberPrefix) {
      n.getPhoneInstance(
        document.querySelector('#delivery-address input[name="phone"]')
      );
      const i = $('#delivery-address input[name="phone"]').parents(
        "label"
      )[0];
      i.style.display = "flex", i.style.flexDirection = "column", i.style.width = "100%";
    }
    t.phoneQuerySelectors.forEach((i) => {
      t.registerInputLookupListeners(i);
    });
  });
}
