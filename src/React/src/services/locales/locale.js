import i18n from 'i18next';
import LanguageDetector from 'i18next-browser-languagedetector';
import { reactI18nextModule } from 'react-i18next';

// lang
import commonEn from '../../../../../translations/en/js.common.json'
import commonFr from '../../../../../translations/fr/js.common.json'


/**
 * Is Debug Mode
 * @return {Boolean}
 */
const isDebugMode = () => {
  if (process.env.NODE_ENV !== 'production')
    return true;
  
  return false;
}

i18n
  .use(LanguageDetector)
  .use(reactI18nextModule)
  .init({
    fallbackLng: 'en',
    debug: isDebugMode(),
    resources: {
      en: {
        translation: {
          common: commonEn
        }
      },
      fr: {
        translation: {
          common: commonFr
        }
      }
    }
  });

export default i18n;
