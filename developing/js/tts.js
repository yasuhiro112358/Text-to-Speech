// =============================
// ==== Text-to-Speech v2.0 ==== 
// =============================
// 
// v2.0: Added pause, resume and stop functions. Also added a function to stop TTS on page reload.
// v1.0: Initial version only with play function. For English, Japanese, French, German, Chinese and Korean language.
// 
// =============================

'use strict';

(function () {
  // ==== Initialize ====
  let utterance = null;

  // ==== Functions ====
  function playText(text, bcp47 = 'en-US', rate = 1, volume = 1, pitch = 1) {
    // ==== About BCP 47 ====
    // https://chatgpt.com/share/fec47c8e-a22a-4de5-a6a7-75fa94b653d7
    // ---- samples ----
    // English (United States)：en-US
    // English (United Kingdom)：en-GB
    // Japanese (Japan)：ja-JP
    // French (France)：fr-FR
    // French (Canada)：fr-CA
    // German (Germany)：de-DE
    // German (Austria)：de-AT
    // Chinese (Simplified, China)：zh-Hans-CN
    // Chinese (Traditional, Taiwan)：zh-Hant-TW
    // Korean (South Korea)：ko-KR
    // Korean (North Korea)：ko-KP
    // ----------------
    // ================

    // Stop and Cancel current speech
    if (utterance !== null) {
      speechSynthesis.cancel();
      // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/cancel
    }

    // TTS非対応文字を削除
    text = sanitizeTextForTTS(text);

    // const utterance = new SpeechSynthesisUtterance();
    utterance = new SpeechSynthesisUtterance();
    // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesisUtterance

    utterance.text = text;
    utterance.lang = bcp47; // select language by BCP 47
    utterance.rate = rate; // 0.1 (lowest) to 10 (highest)
    utterance.volume = volume; // 0 (lowest) to 1 (highest)
    utterance.pitch = pitch; // 0 (lowest) to 2 (highest)

    speechSynthesis.speak(utterance);
    // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/speak
  }
  window.playText = playText;

  function pauseText() {
    let isSpeaking = speechSynthesis.speaking;
    // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/speaking
    let isPaused = speechSynthesis.paused;
    // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/paused

    if (isSpeaking && !isPaused) {
      speechSynthesis.pause();
      // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/pause
    }
  }
  window.pauseText = pauseText;

  function resumeText() {
    let isPaused = speechSynthesis.paused;
    // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/paused

    if (isPaused) {
      speechSynthesis.resume();
      // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/resume
    }
  }
  window.resumeText = resumeText;

  function stopText() {
    let isSpeaking = speechSynthesis.speaking;
    // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/speaking

    if (isSpeaking) {
      speechSynthesis.cancel();
      // https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesis/cancel
    }
  }
  window.stopText = stopText;

  // ==== Sub-functions ====
  function sanitizeTextForTTS(text) {
    // TTSの読み上げ可能文字（拡張可能）
    const enRegex = /[a-zA-Z0-9\s.,?!'"\-:;()&]/g; // English
    const jaRegex = /[\u3040-\u30FF\u4E00-\u9FFF]/g; // Japanese
    const frRegex = /[a-zA-Z0-9\s.,?!'"\-:;()&\u00C0-\u017F]/g; // French
    const deRegex = /[a-zA-Z0-9\s.,?!'"\-:;()&äöüÄÖÜß]/g; // German
    const zhHansRegex = /[\u4E00-\u9FFF]/g; // Simplified Chinese
    const zhHantRegex = /[\u4E00-\u9FFF]/g; // Traditional Chinese
    const koRegex = /[\uAC00-\uD7AF]/g; // Korean

    const combinedRegex = new RegExp([
      enRegex.source,
      jaRegex.source,
      frRegex.source,
      deRegex.source,
      zhHansRegex.source,
      zhHantRegex.source,
      koRegex.source
    ].join('|'), 'g');

    // 対応文字のみを結合
    const clean_text = text.match(combinedRegex)?.join('') || '';
    return clean_text;
  }

  // ==== Main Procedures ====
  // ---- Stop text-to-speech on page reload ----
  window.addEventListener('beforeunload', function () {
    // https://developer.mozilla.org/en-US/docs/Web/API/Window/beforeunload_event
    stopText();
  });


})();

