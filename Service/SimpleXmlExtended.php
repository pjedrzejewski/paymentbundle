<?php

    namespace Ratepay\Bundle\PaymentBundle\Service;

    class SimpleXmlExtended extends \SimpleXMLElement
    {

        /**
         * create CData child
         *
         * @param string $sName
         * @param string $sValue
         * @param bool $utfMode
         * @return SimpleXMLElement
         */
        public function addCDataChild($sName, $sValue)
        {
            $oNodeOld = dom_import_simplexml($this);
            $oNodeNew = new DOMNode();
            $oDom = new DOMDocument();
            $oDataNode = $oDom->appendChild($oDom->createElement($sName));
            $oDataNode->appendChild($oDom->createCDATASection($this->removeSpecialChars($sValue)));
            $oNodeTarget = $oNodeOld->ownerDocument->importNode($oDataNode, true);
            $oNodeOld->appendChild($oNodeTarget);
            return simplexml_import_dom($oNodeTarget);
        }

        /**
         * This method replaced all zoot signs
         *
         * @param string $str
         * @return string
         */
        private function removeSpecialChars($str)
        {
            $search = array("–", "´", "‹", "›", "‘", "’", "‚", "“", "”", "„", "‟", "•", "‒", "―", "—", "™", "¼", "½", "¾");
            $replace = array("-", "'", "<", ">", "'", "'", ",", '"', '"', '"', '"', "-", "-", "-", "-", "TM", "1/4", "1/2", "3/4");
            return str_replace($search, $replace, $str);
        }

    }