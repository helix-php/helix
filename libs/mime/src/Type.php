<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Mime;

use Helix\Contracts\Mime\CategoryInterface;
use Helix\Contracts\Mime\TypeInterface;

enum Type: string implements TypeInterface
{
    /**
     * @link https://www.iana.org/assignments/media-types/application/1d-interleaved-parityfec
     */
    #[Info(name: 'application/1d-interleaved-parityfec', category: Category::APPLICATION)]
    case APPLICATION_1D_INTERLEAVED_PARITYFEC = 'application/1d-interleaved-parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/application/3gpdash-qoe-report+xml
     */
    #[Info(name: 'application/3gpdash-qoe-report+xml', category: Category::APPLICATION)]
    case APPLICATION_3GPDASH_QOE_REPORT_XML = 'application/3gpdash-qoe-report+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/3gppHal+json
     */
    #[Info(name: 'application/3gppHal+json', category: Category::APPLICATION)]
    case APPLICATION_3GPPHAL_JSON = 'application/3gpphal+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/3gppHalForms+json
     */
    #[Info(name: 'application/3gppHalForms+json', category: Category::APPLICATION)]
    case APPLICATION_3GPPHALFORMS_JSON = 'application/3gpphalforms+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/3gpp-ims+xml
     */
    #[Info(name: 'application/3gpp-ims+xml', category: Category::APPLICATION)]
    case APPLICATION_3GPP_IMS_XML = 'application/3gpp-ims+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/A2L
     */
    #[Info(name: 'application/A2L', category: Category::APPLICATION)]
    case APPLICATION_A2L = 'application/a2l';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ace+cbor
     */
    #[Info(name: 'application/ace+cbor', category: Category::APPLICATION)]
    case APPLICATION_ACE_CBOR = 'application/ace+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ace+json
     */
    #[Info(name: 'application/ace+json', category: Category::APPLICATION)]
    case APPLICATION_ACE_JSON = 'application/ace+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/activemessage
     */
    #[Info(name: 'application/activemessage', category: Category::APPLICATION)]
    case APPLICATION_ACTIVEMESSAGE = 'application/activemessage';

    /**
     * @link https://www.iana.org/assignments/media-types/application/activity+json
     */
    #[Info(name: 'application/activity+json', category: Category::APPLICATION)]
    case APPLICATION_ACTIVITY_JSON = 'application/activity+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/aif+cbor
     */
    #[Info(name: 'application/aif+cbor', category: Category::APPLICATION)]
    case APPLICATION_AIF_CBOR = 'application/aif+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/aif+json
     */
    #[Info(name: 'application/aif+json', category: Category::APPLICATION)]
    case APPLICATION_AIF_JSON = 'application/aif+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-cdni+json
     */
    #[Info(name: 'application/alto-cdni+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_CDNI_JSON = 'application/alto-cdni+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-cdnifilter+json
     */
    #[Info(name: 'application/alto-cdnifilter+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_CDNIFILTER_JSON = 'application/alto-cdnifilter+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-costmap+json
     */
    #[Info(name: 'application/alto-costmap+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_COSTMAP_JSON = 'application/alto-costmap+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-costmapfilter+json
     */
    #[Info(name: 'application/alto-costmapfilter+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_COSTMAPFILTER_JSON = 'application/alto-costmapfilter+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-directory+json
     */
    #[Info(name: 'application/alto-directory+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_DIRECTORY_JSON = 'application/alto-directory+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-endpointprop+json
     */
    #[Info(name: 'application/alto-endpointprop+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_ENDPOINTPROP_JSON = 'application/alto-endpointprop+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-endpointpropparams+json
     */
    #[Info(name: 'application/alto-endpointpropparams+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_ENDPOINTPROPPARAMS_JSON = 'application/alto-endpointpropparams+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-endpointcost+json
     */
    #[Info(name: 'application/alto-endpointcost+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_ENDPOINTCOST_JSON = 'application/alto-endpointcost+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-endpointcostparams+json
     */
    #[Info(name: 'application/alto-endpointcostparams+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_ENDPOINTCOSTPARAMS_JSON = 'application/alto-endpointcostparams+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-error+json
     */
    #[Info(name: 'application/alto-error+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_ERROR_JSON = 'application/alto-error+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-networkmapfilter+json
     */
    #[Info(name: 'application/alto-networkmapfilter+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_NETWORKMAPFILTER_JSON = 'application/alto-networkmapfilter+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-networkmap+json
     */
    #[Info(name: 'application/alto-networkmap+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_NETWORKMAP_JSON = 'application/alto-networkmap+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-propmap+json
     */
    #[Info(name: 'application/alto-propmap+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_PROPMAP_JSON = 'application/alto-propmap+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-propmapparams+json
     */
    #[Info(name: 'application/alto-propmapparams+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_PROPMAPPARAMS_JSON = 'application/alto-propmapparams+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-updatestreamcontrol+json
     */
    #[Info(name: 'application/alto-updatestreamcontrol+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_UPDATESTREAMCONTROL_JSON = 'application/alto-updatestreamcontrol+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/alto-updatestreamparams+json
     */
    #[Info(name: 'application/alto-updatestreamparams+json', category: Category::APPLICATION)]
    case APPLICATION_ALTO_UPDATESTREAMPARAMS_JSON = 'application/alto-updatestreamparams+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/AML
     */
    #[Info(name: 'application/AML', category: Category::APPLICATION)]
    case APPLICATION_AML = 'application/aml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/andrew-inset
     */
    #[Info(name: 'application/andrew-inset', category: Category::APPLICATION)]
    case APPLICATION_ANDREW_INSET = 'application/andrew-inset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/applefile
     */
    #[Info(name: 'application/applefile', category: Category::APPLICATION)]
    case APPLICATION_APPLEFILE = 'application/applefile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/at+jwt
     */
    #[Info(name: 'application/at+jwt', category: Category::APPLICATION)]
    case APPLICATION_AT_JWT = 'application/at+jwt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ATF
     */
    #[Info(name: 'application/ATF', category: Category::APPLICATION)]
    case APPLICATION_ATF = 'application/atf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ATFX
     */
    #[Info(name: 'application/ATFX', category: Category::APPLICATION)]
    case APPLICATION_ATFX = 'application/atfx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atom+xml
     */
    #[Info(name: 'application/atom+xml', category: Category::APPLICATION)]
    case APPLICATION_ATOM_XML = 'application/atom+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atomcat+xml
     */
    #[Info(name: 'application/atomcat+xml', category: Category::APPLICATION)]
    case APPLICATION_ATOMCAT_XML = 'application/atomcat+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atomdeleted+xml
     */
    #[Info(name: 'application/atomdeleted+xml', category: Category::APPLICATION)]
    case APPLICATION_ATOMDELETED_XML = 'application/atomdeleted+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atomicmail
     */
    #[Info(name: 'application/atomicmail', category: Category::APPLICATION)]
    case APPLICATION_ATOMICMAIL = 'application/atomicmail';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atomsvc+xml
     */
    #[Info(name: 'application/atomsvc+xml', category: Category::APPLICATION)]
    case APPLICATION_ATOMSVC_XML = 'application/atomsvc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atsc-dwd+xml
     */
    #[Info(name: 'application/atsc-dwd+xml', category: Category::APPLICATION)]
    case APPLICATION_ATSC_DWD_XML = 'application/atsc-dwd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atsc-dynamic-event-message
     */
    #[Info(name: 'application/atsc-dynamic-event-message', category: Category::APPLICATION)]
    case APPLICATION_ATSC_DYNAMIC_EVENT_MESSAGE = 'application/atsc-dynamic-event-message';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atsc-held+xml
     */
    #[Info(name: 'application/atsc-held+xml', category: Category::APPLICATION)]
    case APPLICATION_ATSC_HELD_XML = 'application/atsc-held+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atsc-rdt+json
     */
    #[Info(name: 'application/atsc-rdt+json', category: Category::APPLICATION)]
    case APPLICATION_ATSC_RDT_JSON = 'application/atsc-rdt+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/atsc-rsat+xml
     */
    #[Info(name: 'application/atsc-rsat+xml', category: Category::APPLICATION)]
    case APPLICATION_ATSC_RSAT_XML = 'application/atsc-rsat+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ATXML
     */
    #[Info(name: 'application/ATXML', category: Category::APPLICATION)]
    case APPLICATION_ATXML = 'application/atxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/auth-policy+xml
     */
    #[Info(name: 'application/auth-policy+xml', category: Category::APPLICATION)]
    case APPLICATION_AUTH_POLICY_XML = 'application/auth-policy+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/bacnet-xdd+zip
     */
    #[Info(name: 'application/bacnet-xdd+zip', category: Category::APPLICATION)]
    case APPLICATION_BACNET_XDD_ZIP = 'application/bacnet-xdd+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/batch-SMTP
     */
    #[Info(name: 'application/batch-SMTP', category: Category::APPLICATION)]
    case APPLICATION_BATCH_SMTP = 'application/batch-smtp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/beep+xml
     */
    #[Info(name: 'application/beep+xml', category: Category::APPLICATION)]
    case APPLICATION_BEEP_XML = 'application/beep+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/calendar+json
     */
    #[Info(name: 'application/calendar+json', category: Category::APPLICATION)]
    case APPLICATION_CALENDAR_JSON = 'application/calendar+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/calendar+xml
     */
    #[Info(name: 'application/calendar+xml', category: Category::APPLICATION)]
    case APPLICATION_CALENDAR_XML = 'application/calendar+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/call-completion
     */
    #[Info(name: 'application/call-completion', category: Category::APPLICATION)]
    case APPLICATION_CALL_COMPLETION = 'application/call-completion';

    /**
     * @link https://www.iana.org/assignments/media-types/application/CALS-1840
     */
    #[Info(name: 'application/CALS-1840', category: Category::APPLICATION)]
    case APPLICATION_CALS_1840 = 'application/cals-1840';

    /**
     * @link https://www.iana.org/assignments/media-types/application/captive+json
     */
    #[Info(name: 'application/captive+json', category: Category::APPLICATION)]
    case APPLICATION_CAPTIVE_JSON = 'application/captive+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cbor
     */
    #[Info(name: 'application/cbor', category: Category::APPLICATION)]
    case APPLICATION_CBOR = 'application/cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cbor-seq
     */
    #[Info(name: 'application/cbor-seq', category: Category::APPLICATION)]
    case APPLICATION_CBOR_SEQ = 'application/cbor-seq';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cccex
     */
    #[Info(name: 'application/cccex', category: Category::APPLICATION)]
    case APPLICATION_CCCEX = 'application/cccex';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ccmp+xml
     */
    #[Info(name: 'application/ccmp+xml', category: Category::APPLICATION)]
    case APPLICATION_CCMP_XML = 'application/ccmp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ccxml+xml
     */
    #[Info(name: 'application/ccxml+xml', category: Category::APPLICATION)]
    case APPLICATION_CCXML_XML = 'application/ccxml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cda+xml
     */
    #[Info(name: 'application/cda+xml', category: Category::APPLICATION)]
    case APPLICATION_CDA_XML = 'application/cda+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/CDFX+XML
     */
    #[Info(name: 'application/CDFX+XML', category: Category::APPLICATION)]
    case APPLICATION_CDFX_XML = 'application/cdfx+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cdmi-capability
     */
    #[Info(name: 'application/cdmi-capability', category: Category::APPLICATION)]
    case APPLICATION_CDMI_CAPABILITY = 'application/cdmi-capability';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cdmi-container
     */
    #[Info(name: 'application/cdmi-container', category: Category::APPLICATION)]
    case APPLICATION_CDMI_CONTAINER = 'application/cdmi-container';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cdmi-domain
     */
    #[Info(name: 'application/cdmi-domain', category: Category::APPLICATION)]
    case APPLICATION_CDMI_DOMAIN = 'application/cdmi-domain';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cdmi-object
     */
    #[Info(name: 'application/cdmi-object', category: Category::APPLICATION)]
    case APPLICATION_CDMI_OBJECT = 'application/cdmi-object';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cdmi-queue
     */
    #[Info(name: 'application/cdmi-queue', category: Category::APPLICATION)]
    case APPLICATION_CDMI_QUEUE = 'application/cdmi-queue';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cdni
     */
    #[Info(name: 'application/cdni', category: Category::APPLICATION)]
    case APPLICATION_CDNI = 'application/cdni';

    /**
     * @link https://www.iana.org/assignments/media-types/application/CEA
     */
    #[Info(name: 'application/CEA', category: Category::APPLICATION)]
    case APPLICATION_CEA = 'application/cea';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cea-2018+xml
     */
    #[Info(name: 'application/cea-2018+xml', category: Category::APPLICATION)]
    case APPLICATION_CEA_2018_XML = 'application/cea-2018+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cellml+xml
     */
    #[Info(name: 'application/cellml+xml', category: Category::APPLICATION)]
    case APPLICATION_CELLML_XML = 'application/cellml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cfw
     */
    #[Info(name: 'application/cfw', category: Category::APPLICATION)]
    case APPLICATION_CFW = 'application/cfw';

    /**
     * @link https://www.iana.org/assignments/media-types/application/city+json
     */
    #[Info(name: 'application/city+json', category: Category::APPLICATION)]
    case APPLICATION_CITY_JSON = 'application/city+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/clr
     */
    #[Info(name: 'application/clr', category: Category::APPLICATION)]
    case APPLICATION_CLR = 'application/clr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/clue_info+xml
     */
    #[Info(name: 'application/clue_info+xml', category: Category::APPLICATION)]
    case APPLICATION_CLUE_INFO_XML = 'application/clue_info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/clue+xml
     */
    #[Info(name: 'application/clue+xml', category: Category::APPLICATION)]
    case APPLICATION_CLUE_XML = 'application/clue+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cms
     */
    #[Info(name: 'application/cms', category: Category::APPLICATION)]
    case APPLICATION_CMS = 'application/cms';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cnrp+xml
     */
    #[Info(name: 'application/cnrp+xml', category: Category::APPLICATION)]
    case APPLICATION_CNRP_XML = 'application/cnrp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/coap-group+json
     */
    #[Info(name: 'application/coap-group+json', category: Category::APPLICATION)]
    case APPLICATION_COAP_GROUP_JSON = 'application/coap-group+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/coap-payload
     */
    #[Info(name: 'application/coap-payload', category: Category::APPLICATION)]
    case APPLICATION_COAP_PAYLOAD = 'application/coap-payload';

    /**
     * @link https://www.iana.org/assignments/media-types/application/commonground
     */
    #[Info(name: 'application/commonground', category: Category::APPLICATION)]
    case APPLICATION_COMMONGROUND = 'application/commonground';

    /**
     * @link https://www.iana.org/assignments/media-types/application/conference-info+xml
     */
    #[Info(name: 'application/conference-info+xml', category: Category::APPLICATION)]
    case APPLICATION_CONFERENCE_INFO_XML = 'application/conference-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cpl+xml
     */
    #[Info(name: 'application/cpl+xml', category: Category::APPLICATION)]
    case APPLICATION_CPL_XML = 'application/cpl+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cose
     */
    #[Info(name: 'application/cose', category: Category::APPLICATION)]
    case APPLICATION_COSE = 'application/cose';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cose-key
     */
    #[Info(name: 'application/cose-key', category: Category::APPLICATION)]
    case APPLICATION_COSE_KEY = 'application/cose-key';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cose-key-set
     */
    #[Info(name: 'application/cose-key-set', category: Category::APPLICATION)]
    case APPLICATION_COSE_KEY_SET = 'application/cose-key-set';

    /**
     * @link https://www.iana.org/assignments/media-types/application/csrattrs
     */
    #[Info(name: 'application/csrattrs', category: Category::APPLICATION)]
    case APPLICATION_CSRATTRS = 'application/csrattrs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/csta+xml
     */
    #[Info(name: 'application/csta+xml', category: Category::APPLICATION)]
    case APPLICATION_CSTA_XML = 'application/csta+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/CSTAdata+xml
     */
    #[Info(name: 'application/CSTAdata+xml', category: Category::APPLICATION)]
    case APPLICATION_CSTADATA_XML = 'application/cstadata+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/csvm+json
     */
    #[Info(name: 'application/csvm+json', category: Category::APPLICATION)]
    case APPLICATION_CSVM_JSON = 'application/csvm+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cwl
     */
    #[Info(name: 'application/cwl', category: Category::APPLICATION)]
    case APPLICATION_CWL = 'application/cwl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cwl+json
     */
    #[Info(name: 'application/cwl+json', category: Category::APPLICATION)]
    case APPLICATION_CWL_JSON = 'application/cwl+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cwt
     */
    #[Info(name: 'application/cwt', category: Category::APPLICATION)]
    case APPLICATION_CWT = 'application/cwt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/cybercash
     */
    #[Info(name: 'application/cybercash', category: Category::APPLICATION)]
    case APPLICATION_CYBERCASH = 'application/cybercash';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dash+xml
     */
    #[Info(name: 'application/dash+xml', category: Category::APPLICATION)]
    case APPLICATION_DASH_XML = 'application/dash+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dash-patch+xml
     */
    #[Info(name: 'application/dash-patch+xml', category: Category::APPLICATION)]
    case APPLICATION_DASH_PATCH_XML = 'application/dash-patch+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dashdelta
     */
    #[Info(name: 'application/dashdelta', category: Category::APPLICATION)]
    case APPLICATION_DASHDELTA = 'application/dashdelta';

    /**
     * @link https://www.iana.org/assignments/media-types/application/davmount+xml
     */
    #[Info(name: 'application/davmount+xml', category: Category::APPLICATION)]
    case APPLICATION_DAVMOUNT_XML = 'application/davmount+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dca-rft
     */
    #[Info(name: 'application/dca-rft', category: Category::APPLICATION)]
    case APPLICATION_DCA_RFT = 'application/dca-rft';

    /**
     * @link https://www.iana.org/assignments/media-types/application/DCD
     */
    #[Info(name: 'application/DCD', category: Category::APPLICATION)]
    case APPLICATION_DCD = 'application/dcd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dec-dx
     */
    #[Info(name: 'application/dec-dx', category: Category::APPLICATION)]
    case APPLICATION_DEC_DX = 'application/dec-dx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dialog-info+xml
     */
    #[Info(name: 'application/dialog-info+xml', category: Category::APPLICATION)]
    case APPLICATION_DIALOG_INFO_XML = 'application/dialog-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dicom
     */
    #[Info(name: 'application/dicom', category: Category::APPLICATION)]
    case APPLICATION_DICOM = 'application/dicom';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dicom+json
     */
    #[Info(name: 'application/dicom+json', category: Category::APPLICATION)]
    case APPLICATION_DICOM_JSON = 'application/dicom+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dicom+xml
     */
    #[Info(name: 'application/dicom+xml', category: Category::APPLICATION)]
    case APPLICATION_DICOM_XML = 'application/dicom+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/DII
     */
    #[Info(name: 'application/DII', category: Category::APPLICATION)]
    case APPLICATION_DII = 'application/dii';

    /**
     * @link https://www.iana.org/assignments/media-types/application/DIT
     */
    #[Info(name: 'application/DIT', category: Category::APPLICATION)]
    case APPLICATION_DIT = 'application/dit';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dns
     */
    #[Info(name: 'application/dns', category: Category::APPLICATION)]
    case APPLICATION_DNS = 'application/dns';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dns+json
     */
    #[Info(name: 'application/dns+json', category: Category::APPLICATION)]
    case APPLICATION_DNS_JSON = 'application/dns+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dns-message
     */
    #[Info(name: 'application/dns-message', category: Category::APPLICATION)]
    case APPLICATION_DNS_MESSAGE = 'application/dns-message';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dots+cbor
     */
    #[Info(name: 'application/dots+cbor', category: Category::APPLICATION)]
    case APPLICATION_DOTS_CBOR = 'application/dots+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dskpp+xml
     */
    #[Info(name: 'application/dskpp+xml', category: Category::APPLICATION)]
    case APPLICATION_DSKPP_XML = 'application/dskpp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dssc+der
     */
    #[Info(name: 'application/dssc+der', category: Category::APPLICATION)]
    case APPLICATION_DSSC_DER = 'application/dssc+der';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dssc+xml
     */
    #[Info(name: 'application/dssc+xml', category: Category::APPLICATION)]
    case APPLICATION_DSSC_XML = 'application/dssc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/dvcs
     */
    #[Info(name: 'application/dvcs', category: Category::APPLICATION)]
    case APPLICATION_DVCS = 'application/dvcs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ecmascript
     */
    #[Info(name: 'application/ecmascript', category: Category::APPLICATION)]
    case APPLICATION_ECMASCRIPT = 'application/ecmascript';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EDI-consent
     */
    #[Info(name: 'application/EDI-consent', category: Category::APPLICATION)]
    case APPLICATION_EDI_CONSENT = 'application/edi-consent';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EDIFACT
     */
    #[Info(name: 'application/EDIFACT', category: Category::APPLICATION)]
    case APPLICATION_EDIFACT = 'application/edifact';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EDI-X12
     */
    #[Info(name: 'application/EDI-X12', category: Category::APPLICATION)]
    case APPLICATION_EDI_X12 = 'application/edi-x12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/efi
     */
    #[Info(name: 'application/efi', category: Category::APPLICATION)]
    case APPLICATION_EFI = 'application/efi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/elm+json
     */
    #[Info(name: 'application/elm+json', category: Category::APPLICATION)]
    case APPLICATION_ELM_JSON = 'application/elm+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/elm+xml
     */
    #[Info(name: 'application/elm+xml', category: Category::APPLICATION)]
    case APPLICATION_ELM_XML = 'application/elm+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.cap+xml
     */
    #[Info(name: 'application/EmergencyCallData.cap+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_CAP_XML = 'application/emergencycalldata.cap+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.Comment+xml
     */
    #[Info(name: 'application/EmergencyCallData.Comment+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_COMMENT_XML = 'application/emergencycalldata.comment+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.Control+xml
     */
    #[Info(name: 'application/EmergencyCallData.Control+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_CONTROL_XML = 'application/emergencycalldata.control+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.DeviceInfo+xml
     */
    #[Info(name: 'application/EmergencyCallData.DeviceInfo+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_DEVICEINFO_XML = 'application/emergencycalldata.deviceinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.eCall.MSD
     */
    #[Info(name: 'application/EmergencyCallData.eCall.MSD', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_ECALL_MSD = 'application/emergencycalldata.ecall.msd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.ProviderInfo+xml
     */
    #[Info(name: 'application/EmergencyCallData.ProviderInfo+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_PROVIDERINFO_XML = 'application/emergencycalldata.providerinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.ServiceInfo+xml
     */
    #[Info(name: 'application/EmergencyCallData.ServiceInfo+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_SERVICEINFO_XML = 'application/emergencycalldata.serviceinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.SubscriberInfo+xml
     */
    #[Info(name: 'application/EmergencyCallData.SubscriberInfo+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_SUBSCRIBERINFO_XML = 'application/emergencycalldata.subscriberinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/EmergencyCallData.VEDS+xml
     */
    #[Info(name: 'application/EmergencyCallData.VEDS+xml', category: Category::APPLICATION)]
    case APPLICATION_EMERGENCYCALLDATA_VEDS_XML = 'application/emergencycalldata.veds+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/emma+xml
     */
    #[Info(name: 'application/emma+xml', category: Category::APPLICATION)]
    case APPLICATION_EMMA_XML = 'application/emma+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/emotionml+xml
     */
    #[Info(name: 'application/emotionml+xml', category: Category::APPLICATION)]
    case APPLICATION_EMOTIONML_XML = 'application/emotionml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/encaprtp
     */
    #[Info(name: 'application/encaprtp', category: Category::APPLICATION)]
    case APPLICATION_ENCAPRTP = 'application/encaprtp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/epp+xml
     */
    #[Info(name: 'application/epp+xml', category: Category::APPLICATION)]
    case APPLICATION_EPP_XML = 'application/epp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/epub+zip
     */
    #[Info(name: 'application/epub+zip', category: Category::APPLICATION)]
    case APPLICATION_EPUB_ZIP = 'application/epub+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/eshop
     */
    #[Info(name: 'application/eshop', category: Category::APPLICATION)]
    case APPLICATION_ESHOP = 'application/eshop';

    /**
     * @link https://www.iana.org/assignments/media-types/application/example
     */
    #[Info(name: 'application/example', category: Category::APPLICATION)]
    case APPLICATION_EXAMPLE = 'application/example';

    /**
     * @link https://www.iana.org/assignments/media-types/application/exi
     */
    #[Info(name: 'application/exi', category: Category::APPLICATION)]
    case APPLICATION_EXI = 'application/exi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/expect-ct-report+json
     */
    #[Info(name: 'application/expect-ct-report+json', category: Category::APPLICATION)]
    case APPLICATION_EXPECT_CT_REPORT_JSON = 'application/expect-ct-report+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/express
     */
    #[Info(name: 'application/express', category: Category::APPLICATION)]
    case APPLICATION_EXPRESS = 'application/express';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fastinfoset
     */
    #[Info(name: 'application/fastinfoset', category: Category::APPLICATION)]
    case APPLICATION_FASTINFOSET = 'application/fastinfoset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fastsoap
     */
    #[Info(name: 'application/fastsoap', category: Category::APPLICATION)]
    case APPLICATION_FASTSOAP = 'application/fastsoap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fdf
     */
    #[Info(name: 'application/fdf', category: Category::APPLICATION)]
    case APPLICATION_FDF = 'application/fdf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fdt+xml
     */
    #[Info(name: 'application/fdt+xml', category: Category::APPLICATION)]
    case APPLICATION_FDT_XML = 'application/fdt+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fhir+json
     */
    #[Info(name: 'application/fhir+json', category: Category::APPLICATION)]
    case APPLICATION_FHIR_JSON = 'application/fhir+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fhir+xml
     */
    #[Info(name: 'application/fhir+xml', category: Category::APPLICATION)]
    case APPLICATION_FHIR_XML = 'application/fhir+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/fits
     */
    #[Info(name: 'application/fits', category: Category::APPLICATION)]
    case APPLICATION_FITS = 'application/fits';

    /**
     * @link https://www.iana.org/assignments/media-types/application/flexfec
     */
    #[Info(name: 'application/flexfec', category: Category::APPLICATION)]
    case APPLICATION_FLEXFEC = 'application/flexfec';

    /**
     * @link https://www.iana.org/assignments/media-types/application/font-sfnt
     */
    #[Info(name: 'application/font-sfnt', category: Category::APPLICATION)]
    case APPLICATION_FONT_SFNT = 'application/font-sfnt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/font-tdpfr
     */
    #[Info(name: 'application/font-tdpfr', category: Category::APPLICATION)]
    case APPLICATION_FONT_TDPFR = 'application/font-tdpfr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/font-woff
     */
    #[Info(name: 'application/font-woff', category: Category::APPLICATION)]
    case APPLICATION_FONT_WOFF = 'application/font-woff';

    /**
     * @link https://www.iana.org/assignments/media-types/application/framework-attributes+xml
     */
    #[Info(name: 'application/framework-attributes+xml', category: Category::APPLICATION)]
    case APPLICATION_FRAMEWORK_ATTRIBUTES_XML = 'application/framework-attributes+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/geo+json
     */
    #[Info(name: 'application/geo+json', category: Category::APPLICATION)]
    case APPLICATION_GEO_JSON = 'application/geo+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/geo+json-seq
     */
    #[Info(name: 'application/geo+json-seq', category: Category::APPLICATION)]
    case APPLICATION_GEO_JSON_SEQ = 'application/geo+json-seq';

    /**
     * @link https://www.iana.org/assignments/media-types/application/geopackage+sqlite3
     */
    #[Info(name: 'application/geopackage+sqlite3', category: Category::APPLICATION)]
    case APPLICATION_GEOPACKAGE_SQLITE3 = 'application/geopackage+sqlite3';

    /**
     * @link https://www.iana.org/assignments/media-types/application/geoxacml+xml
     */
    #[Info(name: 'application/geoxacml+xml', category: Category::APPLICATION)]
    case APPLICATION_GEOXACML_XML = 'application/geoxacml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/gltf-buffer
     */
    #[Info(name: 'application/gltf-buffer', category: Category::APPLICATION)]
    case APPLICATION_GLTF_BUFFER = 'application/gltf-buffer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/gml+xml
     */
    #[Info(name: 'application/gml+xml', category: Category::APPLICATION)]
    case APPLICATION_GML_XML = 'application/gml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/gzip
     */
    #[Info(name: 'application/gzip', category: Category::APPLICATION)]
    case APPLICATION_GZIP = 'application/gzip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/H224
     */
    #[Info(name: 'application/H224', category: Category::APPLICATION)]
    case APPLICATION_H224 = 'application/h224';

    /**
     * @link https://www.iana.org/assignments/media-types/application/held+xml
     */
    #[Info(name: 'application/held+xml', category: Category::APPLICATION)]
    case APPLICATION_HELD_XML = 'application/held+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/hl7v2+xml
     */
    #[Info(name: 'application/hl7v2+xml', category: Category::APPLICATION)]
    case APPLICATION_HL7V2_XML = 'application/hl7v2+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/http
     */
    #[Info(name: 'application/http', category: Category::APPLICATION)]
    case APPLICATION_HTTP = 'application/http';

    /**
     * @link https://www.iana.org/assignments/media-types/application/hyperstudio
     */
    #[Info(name: 'application/hyperstudio', category: Category::APPLICATION)]
    case APPLICATION_HYPERSTUDIO = 'application/hyperstudio';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ibe-key-request+xml
     */
    #[Info(name: 'application/ibe-key-request+xml', category: Category::APPLICATION)]
    case APPLICATION_IBE_KEY_REQUEST_XML = 'application/ibe-key-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ibe-pkg-reply+xml
     */
    #[Info(name: 'application/ibe-pkg-reply+xml', category: Category::APPLICATION)]
    case APPLICATION_IBE_PKG_REPLY_XML = 'application/ibe-pkg-reply+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ibe-pp-data
     */
    #[Info(name: 'application/ibe-pp-data', category: Category::APPLICATION)]
    case APPLICATION_IBE_PP_DATA = 'application/ibe-pp-data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/iges
     */
    #[Info(name: 'application/iges', category: Category::APPLICATION)]
    case APPLICATION_IGES = 'application/iges';

    /**
     * @link https://www.iana.org/assignments/media-types/application/im-iscomposing+xml
     */
    #[Info(name: 'application/im-iscomposing+xml', category: Category::APPLICATION)]
    case APPLICATION_IM_ISCOMPOSING_XML = 'application/im-iscomposing+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/index
     */
    #[Info(name: 'application/index', category: Category::APPLICATION)]
    case APPLICATION_INDEX = 'application/index';

    /**
     * @link https://www.iana.org/assignments/media-types/application/index.cmd
     */
    #[Info(name: 'application/index.cmd', category: Category::APPLICATION)]
    case APPLICATION_INDEX_CMD = 'application/index.cmd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/index.obj
     */
    #[Info(name: 'application/index.obj', category: Category::APPLICATION)]
    case APPLICATION_INDEX_OBJ = 'application/index.obj';

    /**
     * @link https://www.iana.org/assignments/media-types/application/index.response
     */
    #[Info(name: 'application/index.response', category: Category::APPLICATION)]
    case APPLICATION_INDEX_RESPONSE = 'application/index.response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/index.vnd
     */
    #[Info(name: 'application/index.vnd', category: Category::APPLICATION)]
    case APPLICATION_INDEX_VND = 'application/index.vnd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/inkml+xml
     */
    #[Info(name: 'application/inkml+xml', category: Category::APPLICATION)]
    case APPLICATION_INKML_XML = 'application/inkml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/IOTP
     */
    #[Info(name: 'application/IOTP', category: Category::APPLICATION)]
    case APPLICATION_IOTP = 'application/iotp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ipfix
     */
    #[Info(name: 'application/ipfix', category: Category::APPLICATION)]
    case APPLICATION_IPFIX = 'application/ipfix';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ipp
     */
    #[Info(name: 'application/ipp', category: Category::APPLICATION)]
    case APPLICATION_IPP = 'application/ipp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ISUP
     */
    #[Info(name: 'application/ISUP', category: Category::APPLICATION)]
    case APPLICATION_ISUP = 'application/isup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/its+xml
     */
    #[Info(name: 'application/its+xml', category: Category::APPLICATION)]
    case APPLICATION_ITS_XML = 'application/its+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/javascript
     */
    #[Info(name: 'application/javascript', category: Category::APPLICATION)]
    case APPLICATION_JAVASCRIPT = 'application/javascript';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jf2feed+json
     */
    #[Info(name: 'application/jf2feed+json', category: Category::APPLICATION)]
    case APPLICATION_JF2FEED_JSON = 'application/jf2feed+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jose
     */
    #[Info(name: 'application/jose', category: Category::APPLICATION)]
    case APPLICATION_JOSE = 'application/jose';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jose+json
     */
    #[Info(name: 'application/jose+json', category: Category::APPLICATION)]
    case APPLICATION_JOSE_JSON = 'application/jose+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jrd+json
     */
    #[Info(name: 'application/jrd+json', category: Category::APPLICATION)]
    case APPLICATION_JRD_JSON = 'application/jrd+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jscalendar+json
     */
    #[Info(name: 'application/jscalendar+json', category: Category::APPLICATION)]
    case APPLICATION_JSCALENDAR_JSON = 'application/jscalendar+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/json
     */
    #[Info(name: 'application/json', category: Category::APPLICATION)]
    case APPLICATION_JSON = 'application/json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/json-patch+json
     */
    #[Info(name: 'application/json-patch+json', category: Category::APPLICATION)]
    case APPLICATION_JSON_PATCH_JSON = 'application/json-patch+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/json-seq
     */
    #[Info(name: 'application/json-seq', category: Category::APPLICATION)]
    case APPLICATION_JSON_SEQ = 'application/json-seq';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jwk+json
     */
    #[Info(name: 'application/jwk+json', category: Category::APPLICATION)]
    case APPLICATION_JWK_JSON = 'application/jwk+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jwk-set+json
     */
    #[Info(name: 'application/jwk-set+json', category: Category::APPLICATION)]
    case APPLICATION_JWK_SET_JSON = 'application/jwk-set+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/jwt
     */
    #[Info(name: 'application/jwt', category: Category::APPLICATION)]
    case APPLICATION_JWT = 'application/jwt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/kpml-request+xml
     */
    #[Info(name: 'application/kpml-request+xml', category: Category::APPLICATION)]
    case APPLICATION_KPML_REQUEST_XML = 'application/kpml-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/kpml-response+xml
     */
    #[Info(name: 'application/kpml-response+xml', category: Category::APPLICATION)]
    case APPLICATION_KPML_RESPONSE_XML = 'application/kpml-response+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ld+json
     */
    #[Info(name: 'application/ld+json', category: Category::APPLICATION)]
    case APPLICATION_LD_JSON = 'application/ld+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/lgr+xml
     */
    #[Info(name: 'application/lgr+xml', category: Category::APPLICATION)]
    case APPLICATION_LGR_XML = 'application/lgr+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/link-format
     */
    #[Info(name: 'application/link-format', category: Category::APPLICATION)]
    case APPLICATION_LINK_FORMAT = 'application/link-format';

    /**
     * @link https://www.iana.org/assignments/media-types/application/linkset
     */
    #[Info(name: 'application/linkset', category: Category::APPLICATION)]
    case APPLICATION_LINKSET = 'application/linkset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/linkset+json
     */
    #[Info(name: 'application/linkset+json', category: Category::APPLICATION)]
    case APPLICATION_LINKSET_JSON = 'application/linkset+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/load-control+xml
     */
    #[Info(name: 'application/load-control+xml', category: Category::APPLICATION)]
    case APPLICATION_LOAD_CONTROL_XML = 'application/load-control+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/lost+xml
     */
    #[Info(name: 'application/lost+xml', category: Category::APPLICATION)]
    case APPLICATION_LOST_XML = 'application/lost+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/lostsync+xml
     */
    #[Info(name: 'application/lostsync+xml', category: Category::APPLICATION)]
    case APPLICATION_LOSTSYNC_XML = 'application/lostsync+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/lpf+zip
     */
    #[Info(name: 'application/lpf+zip', category: Category::APPLICATION)]
    case APPLICATION_LPF_ZIP = 'application/lpf+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/LXF
     */
    #[Info(name: 'application/LXF', category: Category::APPLICATION)]
    case APPLICATION_LXF = 'application/lxf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mac-binhex40
     */
    #[Info(name: 'application/mac-binhex40', category: Category::APPLICATION)]
    case APPLICATION_MAC_BINHEX40 = 'application/mac-binhex40';

    /**
     * @link https://www.iana.org/assignments/media-types/application/macwriteii
     */
    #[Info(name: 'application/macwriteii', category: Category::APPLICATION)]
    case APPLICATION_MACWRITEII = 'application/macwriteii';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mads+xml
     */
    #[Info(name: 'application/mads+xml', category: Category::APPLICATION)]
    case APPLICATION_MADS_XML = 'application/mads+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/manifest+json
     */
    #[Info(name: 'application/manifest+json', category: Category::APPLICATION)]
    case APPLICATION_MANIFEST_JSON = 'application/manifest+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/marc
     */
    #[Info(name: 'application/marc', category: Category::APPLICATION)]
    case APPLICATION_MARC = 'application/marc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/marcxml+xml
     */
    #[Info(name: 'application/marcxml+xml', category: Category::APPLICATION)]
    case APPLICATION_MARCXML_XML = 'application/marcxml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mathematica
     */
    #[Info(name: 'application/mathematica', category: Category::APPLICATION)]
    case APPLICATION_MATHEMATICA = 'application/mathematica';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mathml+xml
     */
    #[Info(name: 'application/mathml+xml', category: Category::APPLICATION)]
    case APPLICATION_MATHML_XML = 'application/mathml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mathml-content+xml
     */
    #[Info(name: 'application/mathml-content+xml', category: Category::APPLICATION)]
    case APPLICATION_MATHML_CONTENT_XML = 'application/mathml-content+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mathml-presentation+xml
     */
    #[Info(name: 'application/mathml-presentation+xml', category: Category::APPLICATION)]
    case APPLICATION_MATHML_PRESENTATION_XML = 'application/mathml-presentation+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-associated-procedure-description+xml
     */
    #[Info(name: 'application/mbms-associated-procedure-description+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_ASSOCIATED_PROCEDURE_DESCRIPTION_XML = 'application/mbms-associated-procedure-description+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-deregister+xml
     */
    #[Info(name: 'application/mbms-deregister+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_DEREGISTER_XML = 'application/mbms-deregister+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-envelope+xml
     */
    #[Info(name: 'application/mbms-envelope+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_ENVELOPE_XML = 'application/mbms-envelope+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-msk-response+xml
     */
    #[Info(name: 'application/mbms-msk-response+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_MSK_RESPONSE_XML = 'application/mbms-msk-response+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-msk+xml
     */
    #[Info(name: 'application/mbms-msk+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_MSK_XML = 'application/mbms-msk+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-protection-description+xml
     */
    #[Info(name: 'application/mbms-protection-description+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_PROTECTION_DESCRIPTION_XML = 'application/mbms-protection-description+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-reception-report+xml
     */
    #[Info(name: 'application/mbms-reception-report+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_RECEPTION_REPORT_XML = 'application/mbms-reception-report+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-register-response+xml
     */
    #[Info(name: 'application/mbms-register-response+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_REGISTER_RESPONSE_XML = 'application/mbms-register-response+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-register+xml
     */
    #[Info(name: 'application/mbms-register+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_REGISTER_XML = 'application/mbms-register+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-schedule+xml
     */
    #[Info(name: 'application/mbms-schedule+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_SCHEDULE_XML = 'application/mbms-schedule+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbms-user-service-description+xml
     */
    #[Info(name: 'application/mbms-user-service-description+xml', category: Category::APPLICATION)]
    case APPLICATION_MBMS_USER_SERVICE_DESCRIPTION_XML = 'application/mbms-user-service-description+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mbox
     */
    #[Info(name: 'application/mbox', category: Category::APPLICATION)]
    case APPLICATION_MBOX = 'application/mbox';

    /**
     * @link https://www.iana.org/assignments/media-types/application/media_control+xml
     */
    #[Info(name: 'application/media_control+xml', category: Category::APPLICATION)]
    case APPLICATION_MEDIA_CONTROL_XML = 'application/media_control+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/media-policy-dataset+xml
     */
    #[Info(name: 'application/media-policy-dataset+xml', category: Category::APPLICATION)]
    case APPLICATION_MEDIA_POLICY_DATASET_XML = 'application/media-policy-dataset+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mediaservercontrol+xml
     */
    #[Info(name: 'application/mediaservercontrol+xml', category: Category::APPLICATION)]
    case APPLICATION_MEDIASERVERCONTROL_XML = 'application/mediaservercontrol+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/merge-patch+json
     */
    #[Info(name: 'application/merge-patch+json', category: Category::APPLICATION)]
    case APPLICATION_MERGE_PATCH_JSON = 'application/merge-patch+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/metalink4+xml
     */
    #[Info(name: 'application/metalink4+xml', category: Category::APPLICATION)]
    case APPLICATION_METALINK4_XML = 'application/metalink4+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mets+xml
     */
    #[Info(name: 'application/mets+xml', category: Category::APPLICATION)]
    case APPLICATION_METS_XML = 'application/mets+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/MF4
     */
    #[Info(name: 'application/MF4', category: Category::APPLICATION)]
    case APPLICATION_MF4 = 'application/mf4';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mikey
     */
    #[Info(name: 'application/mikey', category: Category::APPLICATION)]
    case APPLICATION_MIKEY = 'application/mikey';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mipc
     */
    #[Info(name: 'application/mipc', category: Category::APPLICATION)]
    case APPLICATION_MIPC = 'application/mipc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/missing-blocks+cbor-seq
     */
    #[Info(name: 'application/missing-blocks+cbor-seq', category: Category::APPLICATION)]
    case APPLICATION_MISSING_BLOCKS_CBOR_SEQ = 'application/missing-blocks+cbor-seq';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mmt-aei+xml
     */
    #[Info(name: 'application/mmt-aei+xml', category: Category::APPLICATION)]
    case APPLICATION_MMT_AEI_XML = 'application/mmt-aei+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mmt-usd+xml
     */
    #[Info(name: 'application/mmt-usd+xml', category: Category::APPLICATION)]
    case APPLICATION_MMT_USD_XML = 'application/mmt-usd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mods+xml
     */
    #[Info(name: 'application/mods+xml', category: Category::APPLICATION)]
    case APPLICATION_MODS_XML = 'application/mods+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/moss-keys
     */
    #[Info(name: 'application/moss-keys', category: Category::APPLICATION)]
    case APPLICATION_MOSS_KEYS = 'application/moss-keys';

    /**
     * @link https://www.iana.org/assignments/media-types/application/moss-signature
     */
    #[Info(name: 'application/moss-signature', category: Category::APPLICATION)]
    case APPLICATION_MOSS_SIGNATURE = 'application/moss-signature';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mosskey-data
     */
    #[Info(name: 'application/mosskey-data', category: Category::APPLICATION)]
    case APPLICATION_MOSSKEY_DATA = 'application/mosskey-data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mosskey-request
     */
    #[Info(name: 'application/mosskey-request', category: Category::APPLICATION)]
    case APPLICATION_MOSSKEY_REQUEST = 'application/mosskey-request';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mp21
     */
    #[Info(name: 'application/mp21', category: Category::APPLICATION)]
    case APPLICATION_MP21 = 'application/mp21';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mp4
     */
    #[Info(name: 'application/mp4', category: Category::APPLICATION)]
    case APPLICATION_MP4 = 'application/mp4';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mpeg4-generic
     */
    #[Info(name: 'application/mpeg4-generic', category: Category::APPLICATION)]
    case APPLICATION_MPEG4_GENERIC = 'application/mpeg4-generic';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mpeg4-iod
     */
    #[Info(name: 'application/mpeg4-iod', category: Category::APPLICATION)]
    case APPLICATION_MPEG4_IOD = 'application/mpeg4-iod';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mpeg4-iod-xmt
     */
    #[Info(name: 'application/mpeg4-iod-xmt', category: Category::APPLICATION)]
    case APPLICATION_MPEG4_IOD_XMT = 'application/mpeg4-iod-xmt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mrb-consumer+xml
     */
    #[Info(name: 'application/mrb-consumer+xml', category: Category::APPLICATION)]
    case APPLICATION_MRB_CONSUMER_XML = 'application/mrb-consumer+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mrb-publish+xml
     */
    #[Info(name: 'application/mrb-publish+xml', category: Category::APPLICATION)]
    case APPLICATION_MRB_PUBLISH_XML = 'application/mrb-publish+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/msc-ivr+xml
     */
    #[Info(name: 'application/msc-ivr+xml', category: Category::APPLICATION)]
    case APPLICATION_MSC_IVR_XML = 'application/msc-ivr+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/msc-mixer+xml
     */
    #[Info(name: 'application/msc-mixer+xml', category: Category::APPLICATION)]
    case APPLICATION_MSC_MIXER_XML = 'application/msc-mixer+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/msword
     */
    #[Info(name: 'application/msword', category: Category::APPLICATION)]
    case APPLICATION_MSWORD = 'application/msword';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mud+json
     */
    #[Info(name: 'application/mud+json', category: Category::APPLICATION)]
    case APPLICATION_MUD_JSON = 'application/mud+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/multipart-core
     */
    #[Info(name: 'application/multipart-core', category: Category::APPLICATION)]
    case APPLICATION_MULTIPART_CORE = 'application/multipart-core';

    /**
     * @link https://www.iana.org/assignments/media-types/application/mxf
     */
    #[Info(name: 'application/mxf', category: Category::APPLICATION)]
    case APPLICATION_MXF = 'application/mxf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/n-quads
     */
    #[Info(name: 'application/n-quads', category: Category::APPLICATION)]
    case APPLICATION_N_QUADS = 'application/n-quads';

    /**
     * @link https://www.iana.org/assignments/media-types/application/n-triples
     */
    #[Info(name: 'application/n-triples', category: Category::APPLICATION)]
    case APPLICATION_N_TRIPLES = 'application/n-triples';

    /**
     * @link https://www.iana.org/assignments/media-types/application/nasdata
     */
    #[Info(name: 'application/nasdata', category: Category::APPLICATION)]
    case APPLICATION_NASDATA = 'application/nasdata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/news-checkgroups
     */
    #[Info(name: 'application/news-checkgroups', category: Category::APPLICATION)]
    case APPLICATION_NEWS_CHECKGROUPS = 'application/news-checkgroups';

    /**
     * @link https://www.iana.org/assignments/media-types/application/news-groupinfo
     */
    #[Info(name: 'application/news-groupinfo', category: Category::APPLICATION)]
    case APPLICATION_NEWS_GROUPINFO = 'application/news-groupinfo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/news-transmission
     */
    #[Info(name: 'application/news-transmission', category: Category::APPLICATION)]
    case APPLICATION_NEWS_TRANSMISSION = 'application/news-transmission';

    /**
     * @link https://www.iana.org/assignments/media-types/application/nlsml+xml
     */
    #[Info(name: 'application/nlsml+xml', category: Category::APPLICATION)]
    case APPLICATION_NLSML_XML = 'application/nlsml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/node
     */
    #[Info(name: 'application/node', category: Category::APPLICATION)]
    case APPLICATION_NODE = 'application/node';

    /**
     * @link https://www.iana.org/assignments/media-types/application/nss
     */
    #[Info(name: 'application/nss', category: Category::APPLICATION)]
    case APPLICATION_NSS = 'application/nss';

    /**
     * @link https://www.iana.org/assignments/media-types/application/oauth-authz-req+jwt
     */
    #[Info(name: 'application/oauth-authz-req+jwt', category: Category::APPLICATION)]
    case APPLICATION_OAUTH_AUTHZ_REQ_JWT = 'application/oauth-authz-req+jwt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/oblivious-dns-message
     */
    #[Info(name: 'application/oblivious-dns-message', category: Category::APPLICATION)]
    case APPLICATION_OBLIVIOUS_DNS_MESSAGE = 'application/oblivious-dns-message';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ocsp-request
     */
    #[Info(name: 'application/ocsp-request', category: Category::APPLICATION)]
    case APPLICATION_OCSP_REQUEST = 'application/ocsp-request';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ocsp-response
     */
    #[Info(name: 'application/ocsp-response', category: Category::APPLICATION)]
    case APPLICATION_OCSP_RESPONSE = 'application/ocsp-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/octet-stream
     */
    #[Info(name: 'application/octet-stream', category: Category::APPLICATION)]
    case APPLICATION_OCTET_STREAM = 'application/octet-stream';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ODA
     */
    #[Info(name: 'application/ODA', category: Category::APPLICATION)]
    case APPLICATION_ODA = 'application/oda';

    /**
     * @link https://www.iana.org/assignments/media-types/application/odm+xml
     */
    #[Info(name: 'application/odm+xml', category: Category::APPLICATION)]
    case APPLICATION_ODM_XML = 'application/odm+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ODX
     */
    #[Info(name: 'application/ODX', category: Category::APPLICATION)]
    case APPLICATION_ODX = 'application/odx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/oebps-package+xml
     */
    #[Info(name: 'application/oebps-package+xml', category: Category::APPLICATION)]
    case APPLICATION_OEBPS_PACKAGE_XML = 'application/oebps-package+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ogg
     */
    #[Info(name: 'application/ogg', category: Category::APPLICATION)]
    case APPLICATION_OGG = 'application/ogg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/opc-nodeset+xml
     */
    #[Info(name: 'application/opc-nodeset+xml', category: Category::APPLICATION)]
    case APPLICATION_OPC_NODESET_XML = 'application/opc-nodeset+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/oscore
     */
    #[Info(name: 'application/oscore', category: Category::APPLICATION)]
    case APPLICATION_OSCORE = 'application/oscore';

    /**
     * @link https://www.iana.org/assignments/media-types/application/oxps
     */
    #[Info(name: 'application/oxps', category: Category::APPLICATION)]
    case APPLICATION_OXPS = 'application/oxps';

    /**
     * @link https://www.iana.org/assignments/media-types/application/p21
     */
    #[Info(name: 'application/p21', category: Category::APPLICATION)]
    case APPLICATION_P21 = 'application/p21';

    /**
     * @link https://www.iana.org/assignments/media-types/application/p21+zip
     */
    #[Info(name: 'application/p21+zip', category: Category::APPLICATION)]
    case APPLICATION_P21_ZIP = 'application/p21+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/p2p-overlay+xml
     */
    #[Info(name: 'application/p2p-overlay+xml', category: Category::APPLICATION)]
    case APPLICATION_P2P_OVERLAY_XML = 'application/p2p-overlay+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/parityfec
     */
    #[Info(name: 'application/parityfec', category: Category::APPLICATION)]
    case APPLICATION_PARITYFEC = 'application/parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/application/passport
     */
    #[Info(name: 'application/passport', category: Category::APPLICATION)]
    case APPLICATION_PASSPORT = 'application/passport';

    /**
     * @link https://www.iana.org/assignments/media-types/application/patch-ops-error+xml
     */
    #[Info(name: 'application/patch-ops-error+xml', category: Category::APPLICATION)]
    case APPLICATION_PATCH_OPS_ERROR_XML = 'application/patch-ops-error+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pdf
     */
    #[Info(name: 'application/pdf', category: Category::APPLICATION)]
    case APPLICATION_PDF = 'application/pdf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/PDX
     */
    #[Info(name: 'application/PDX', category: Category::APPLICATION)]
    case APPLICATION_PDX = 'application/pdx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pem-certificate-chain
     */
    #[Info(name: 'application/pem-certificate-chain', category: Category::APPLICATION)]
    case APPLICATION_PEM_CERTIFICATE_CHAIN = 'application/pem-certificate-chain';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pgp-encrypted
     */
    #[Info(name: 'application/pgp-encrypted', category: Category::APPLICATION)]
    case APPLICATION_PGP_ENCRYPTED = 'application/pgp-encrypted';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pgp-keys
     */
    #[Info(name: 'application/pgp-keys', category: Category::APPLICATION)]
    case APPLICATION_PGP_KEYS = 'application/pgp-keys';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pgp-signature
     */
    #[Info(name: 'application/pgp-signature', category: Category::APPLICATION)]
    case APPLICATION_PGP_SIGNATURE = 'application/pgp-signature';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pidf-diff+xml
     */
    #[Info(name: 'application/pidf-diff+xml', category: Category::APPLICATION)]
    case APPLICATION_PIDF_DIFF_XML = 'application/pidf-diff+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pidf+xml
     */
    #[Info(name: 'application/pidf+xml', category: Category::APPLICATION)]
    case APPLICATION_PIDF_XML = 'application/pidf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkcs10
     */
    #[Info(name: 'application/pkcs10', category: Category::APPLICATION)]
    case APPLICATION_PKCS10 = 'application/pkcs10';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkcs7-mime
     */
    #[Info(name: 'application/pkcs7-mime', category: Category::APPLICATION)]
    case APPLICATION_PKCS7_MIME = 'application/pkcs7-mime';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkcs7-signature
     */
    #[Info(name: 'application/pkcs7-signature', category: Category::APPLICATION)]
    case APPLICATION_PKCS7_SIGNATURE = 'application/pkcs7-signature';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkcs8
     */
    #[Info(name: 'application/pkcs8', category: Category::APPLICATION)]
    case APPLICATION_PKCS8 = 'application/pkcs8';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkcs8-encrypted
     */
    #[Info(name: 'application/pkcs8-encrypted', category: Category::APPLICATION)]
    case APPLICATION_PKCS8_ENCRYPTED = 'application/pkcs8-encrypted';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkcs12
     */
    #[Info(name: 'application/pkcs12', category: Category::APPLICATION)]
    case APPLICATION_PKCS12 = 'application/pkcs12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkix-attr-cert
     */
    #[Info(name: 'application/pkix-attr-cert', category: Category::APPLICATION)]
    case APPLICATION_PKIX_ATTR_CERT = 'application/pkix-attr-cert';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkix-cert
     */
    #[Info(name: 'application/pkix-cert', category: Category::APPLICATION)]
    case APPLICATION_PKIX_CERT = 'application/pkix-cert';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkix-crl
     */
    #[Info(name: 'application/pkix-crl', category: Category::APPLICATION)]
    case APPLICATION_PKIX_CRL = 'application/pkix-crl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkix-pkipath
     */
    #[Info(name: 'application/pkix-pkipath', category: Category::APPLICATION)]
    case APPLICATION_PKIX_PKIPATH = 'application/pkix-pkipath';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pkixcmp
     */
    #[Info(name: 'application/pkixcmp', category: Category::APPLICATION)]
    case APPLICATION_PKIXCMP = 'application/pkixcmp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pls+xml
     */
    #[Info(name: 'application/pls+xml', category: Category::APPLICATION)]
    case APPLICATION_PLS_XML = 'application/pls+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/poc-settings+xml
     */
    #[Info(name: 'application/poc-settings+xml', category: Category::APPLICATION)]
    case APPLICATION_POC_SETTINGS_XML = 'application/poc-settings+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/postscript
     */
    #[Info(name: 'application/postscript', category: Category::APPLICATION)]
    case APPLICATION_POSTSCRIPT = 'application/postscript';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ppsp-tracker+json
     */
    #[Info(name: 'application/ppsp-tracker+json', category: Category::APPLICATION)]
    case APPLICATION_PPSP_TRACKER_JSON = 'application/ppsp-tracker+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/problem+json
     */
    #[Info(name: 'application/problem+json', category: Category::APPLICATION)]
    case APPLICATION_PROBLEM_JSON = 'application/problem+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/problem+xml
     */
    #[Info(name: 'application/problem+xml', category: Category::APPLICATION)]
    case APPLICATION_PROBLEM_XML = 'application/problem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/provenance+xml
     */
    #[Info(name: 'application/provenance+xml', category: Category::APPLICATION)]
    case APPLICATION_PROVENANCE_XML = 'application/provenance+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.alvestrand.titrax-sheet
     */
    #[Info(name: 'application/prs.alvestrand.titrax-sheet', category: Category::APPLICATION)]
    case APPLICATION_PRS_ALVESTRAND_TITRAX_SHEET = 'application/prs.alvestrand.titrax-sheet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.cww
     */
    #[Info(name: 'application/prs.cww', category: Category::APPLICATION)]
    case APPLICATION_PRS_CWW = 'application/prs.cww';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.cyn
     */
    #[Info(name: 'application/prs.cyn', category: Category::APPLICATION)]
    case APPLICATION_PRS_CYN = 'application/prs.cyn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.hpub+zip
     */
    #[Info(name: 'application/prs.hpub+zip', category: Category::APPLICATION)]
    case APPLICATION_PRS_HPUB_ZIP = 'application/prs.hpub+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.nprend
     */
    #[Info(name: 'application/prs.nprend', category: Category::APPLICATION)]
    case APPLICATION_PRS_NPREND = 'application/prs.nprend';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.plucker
     */
    #[Info(name: 'application/prs.plucker', category: Category::APPLICATION)]
    case APPLICATION_PRS_PLUCKER = 'application/prs.plucker';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.rdf-xml-crypt
     */
    #[Info(name: 'application/prs.rdf-xml-crypt', category: Category::APPLICATION)]
    case APPLICATION_PRS_RDF_XML_CRYPT = 'application/prs.rdf-xml-crypt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/prs.xsf+xml
     */
    #[Info(name: 'application/prs.xsf+xml', category: Category::APPLICATION)]
    case APPLICATION_PRS_XSF_XML = 'application/prs.xsf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pskc+xml
     */
    #[Info(name: 'application/pskc+xml', category: Category::APPLICATION)]
    case APPLICATION_PSKC_XML = 'application/pskc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/pvd+json
     */
    #[Info(name: 'application/pvd+json', category: Category::APPLICATION)]
    case APPLICATION_PVD_JSON = 'application/pvd+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rdf+xml
     */
    #[Info(name: 'application/rdf+xml', category: Category::APPLICATION)]
    case APPLICATION_RDF_XML = 'application/rdf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/route-apd+xml
     */
    #[Info(name: 'application/route-apd+xml', category: Category::APPLICATION)]
    case APPLICATION_ROUTE_APD_XML = 'application/route-apd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/route-s-tsid+xml
     */
    #[Info(name: 'application/route-s-tsid+xml', category: Category::APPLICATION)]
    case APPLICATION_ROUTE_S_TSID_XML = 'application/route-s-tsid+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/route-usd+xml
     */
    #[Info(name: 'application/route-usd+xml', category: Category::APPLICATION)]
    case APPLICATION_ROUTE_USD_XML = 'application/route-usd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/QSIG
     */
    #[Info(name: 'application/QSIG', category: Category::APPLICATION)]
    case APPLICATION_QSIG = 'application/qsig';

    /**
     * @link https://www.iana.org/assignments/media-types/application/raptorfec
     */
    #[Info(name: 'application/raptorfec', category: Category::APPLICATION)]
    case APPLICATION_RAPTORFEC = 'application/raptorfec';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rdap+json
     */
    #[Info(name: 'application/rdap+json', category: Category::APPLICATION)]
    case APPLICATION_RDAP_JSON = 'application/rdap+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/reginfo+xml
     */
    #[Info(name: 'application/reginfo+xml', category: Category::APPLICATION)]
    case APPLICATION_REGINFO_XML = 'application/reginfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/relax-ng-compact-syntax
     */
    #[Info(name: 'application/relax-ng-compact-syntax', category: Category::APPLICATION)]
    case APPLICATION_RELAX_NG_COMPACT_SYNTAX = 'application/relax-ng-compact-syntax';

    /**
     * @link https://www.iana.org/assignments/media-types/application/remote-printing
     */
    #[Info(name: 'application/remote-printing', category: Category::APPLICATION)]
    case APPLICATION_REMOTE_PRINTING = 'application/remote-printing';

    /**
     * @link https://www.iana.org/assignments/media-types/application/reputon+json
     */
    #[Info(name: 'application/reputon+json', category: Category::APPLICATION)]
    case APPLICATION_REPUTON_JSON = 'application/reputon+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/resource-lists-diff+xml
     */
    #[Info(name: 'application/resource-lists-diff+xml', category: Category::APPLICATION)]
    case APPLICATION_RESOURCE_LISTS_DIFF_XML = 'application/resource-lists-diff+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/resource-lists+xml
     */
    #[Info(name: 'application/resource-lists+xml', category: Category::APPLICATION)]
    case APPLICATION_RESOURCE_LISTS_XML = 'application/resource-lists+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rfc+xml
     */
    #[Info(name: 'application/rfc+xml', category: Category::APPLICATION)]
    case APPLICATION_RFC_XML = 'application/rfc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/riscos
     */
    #[Info(name: 'application/riscos', category: Category::APPLICATION)]
    case APPLICATION_RISCOS = 'application/riscos';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rlmi+xml
     */
    #[Info(name: 'application/rlmi+xml', category: Category::APPLICATION)]
    case APPLICATION_RLMI_XML = 'application/rlmi+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rls-services+xml
     */
    #[Info(name: 'application/rls-services+xml', category: Category::APPLICATION)]
    case APPLICATION_RLS_SERVICES_XML = 'application/rls-services+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rpki-ghostbusters
     */
    #[Info(name: 'application/rpki-ghostbusters', category: Category::APPLICATION)]
    case APPLICATION_RPKI_GHOSTBUSTERS = 'application/rpki-ghostbusters';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rpki-manifest
     */
    #[Info(name: 'application/rpki-manifest', category: Category::APPLICATION)]
    case APPLICATION_RPKI_MANIFEST = 'application/rpki-manifest';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rpki-publication
     */
    #[Info(name: 'application/rpki-publication', category: Category::APPLICATION)]
    case APPLICATION_RPKI_PUBLICATION = 'application/rpki-publication';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rpki-roa
     */
    #[Info(name: 'application/rpki-roa', category: Category::APPLICATION)]
    case APPLICATION_RPKI_ROA = 'application/rpki-roa';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rpki-updown
     */
    #[Info(name: 'application/rpki-updown', category: Category::APPLICATION)]
    case APPLICATION_RPKI_UPDOWN = 'application/rpki-updown';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rtf
     */
    #[Info(name: 'application/rtf', category: Category::APPLICATION)]
    case APPLICATION_RTF = 'application/rtf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rtploopback
     */
    #[Info(name: 'application/rtploopback', category: Category::APPLICATION)]
    case APPLICATION_RTPLOOPBACK = 'application/rtploopback';

    /**
     * @link https://www.iana.org/assignments/media-types/application/rtx
     */
    #[Info(name: 'application/rtx', category: Category::APPLICATION)]
    case APPLICATION_RTX = 'application/rtx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/samlassertion+xml
     */
    #[Info(name: 'application/samlassertion+xml', category: Category::APPLICATION)]
    case APPLICATION_SAMLASSERTION_XML = 'application/samlassertion+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/samlmetadata+xml
     */
    #[Info(name: 'application/samlmetadata+xml', category: Category::APPLICATION)]
    case APPLICATION_SAMLMETADATA_XML = 'application/samlmetadata+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sarif-external-properties+json
     */
    #[Info(name: 'application/sarif-external-properties+json', category: Category::APPLICATION)]
    case APPLICATION_SARIF_EXTERNAL_PROPERTIES_JSON = 'application/sarif-external-properties+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sarif+json
     */
    #[Info(name: 'application/sarif+json', category: Category::APPLICATION)]
    case APPLICATION_SARIF_JSON = 'application/sarif+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sbe
     */
    #[Info(name: 'application/sbe', category: Category::APPLICATION)]
    case APPLICATION_SBE = 'application/sbe';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sbml+xml
     */
    #[Info(name: 'application/sbml+xml', category: Category::APPLICATION)]
    case APPLICATION_SBML_XML = 'application/sbml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/scaip+xml
     */
    #[Info(name: 'application/scaip+xml', category: Category::APPLICATION)]
    case APPLICATION_SCAIP_XML = 'application/scaip+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/scim+json
     */
    #[Info(name: 'application/scim+json', category: Category::APPLICATION)]
    case APPLICATION_SCIM_JSON = 'application/scim+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/scvp-cv-request
     */
    #[Info(name: 'application/scvp-cv-request', category: Category::APPLICATION)]
    case APPLICATION_SCVP_CV_REQUEST = 'application/scvp-cv-request';

    /**
     * @link https://www.iana.org/assignments/media-types/application/scvp-cv-response
     */
    #[Info(name: 'application/scvp-cv-response', category: Category::APPLICATION)]
    case APPLICATION_SCVP_CV_RESPONSE = 'application/scvp-cv-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/scvp-vp-request
     */
    #[Info(name: 'application/scvp-vp-request', category: Category::APPLICATION)]
    case APPLICATION_SCVP_VP_REQUEST = 'application/scvp-vp-request';

    /**
     * @link https://www.iana.org/assignments/media-types/application/scvp-vp-response
     */
    #[Info(name: 'application/scvp-vp-response', category: Category::APPLICATION)]
    case APPLICATION_SCVP_VP_RESPONSE = 'application/scvp-vp-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sdp
     */
    #[Info(name: 'application/sdp', category: Category::APPLICATION)]
    case APPLICATION_SDP = 'application/sdp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/secevent+jwt
     */
    #[Info(name: 'application/secevent+jwt', category: Category::APPLICATION)]
    case APPLICATION_SECEVENT_JWT = 'application/secevent+jwt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/senml-etch+cbor
     */
    #[Info(name: 'application/senml-etch+cbor', category: Category::APPLICATION)]
    case APPLICATION_SENML_ETCH_CBOR = 'application/senml-etch+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/senml-etch+json
     */
    #[Info(name: 'application/senml-etch+json', category: Category::APPLICATION)]
    case APPLICATION_SENML_ETCH_JSON = 'application/senml-etch+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/senml-exi
     */
    #[Info(name: 'application/senml-exi', category: Category::APPLICATION)]
    case APPLICATION_SENML_EXI = 'application/senml-exi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/senml+cbor
     */
    #[Info(name: 'application/senml+cbor', category: Category::APPLICATION)]
    case APPLICATION_SENML_CBOR = 'application/senml+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/senml+json
     */
    #[Info(name: 'application/senml+json', category: Category::APPLICATION)]
    case APPLICATION_SENML_JSON = 'application/senml+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/senml+xml
     */
    #[Info(name: 'application/senml+xml', category: Category::APPLICATION)]
    case APPLICATION_SENML_XML = 'application/senml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sensml-exi
     */
    #[Info(name: 'application/sensml-exi', category: Category::APPLICATION)]
    case APPLICATION_SENSML_EXI = 'application/sensml-exi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sensml+cbor
     */
    #[Info(name: 'application/sensml+cbor', category: Category::APPLICATION)]
    case APPLICATION_SENSML_CBOR = 'application/sensml+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sensml+json
     */
    #[Info(name: 'application/sensml+json', category: Category::APPLICATION)]
    case APPLICATION_SENSML_JSON = 'application/sensml+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sensml+xml
     */
    #[Info(name: 'application/sensml+xml', category: Category::APPLICATION)]
    case APPLICATION_SENSML_XML = 'application/sensml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sep-exi
     */
    #[Info(name: 'application/sep-exi', category: Category::APPLICATION)]
    case APPLICATION_SEP_EXI = 'application/sep-exi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sep+xml
     */
    #[Info(name: 'application/sep+xml', category: Category::APPLICATION)]
    case APPLICATION_SEP_XML = 'application/sep+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/session-info
     */
    #[Info(name: 'application/session-info', category: Category::APPLICATION)]
    case APPLICATION_SESSION_INFO = 'application/session-info';

    /**
     * @link https://www.iana.org/assignments/media-types/application/set-payment
     */
    #[Info(name: 'application/set-payment', category: Category::APPLICATION)]
    case APPLICATION_SET_PAYMENT = 'application/set-payment';

    /**
     * @link https://www.iana.org/assignments/media-types/application/set-payment-initiation
     */
    #[Info(name: 'application/set-payment-initiation', category: Category::APPLICATION)]
    case APPLICATION_SET_PAYMENT_INITIATION = 'application/set-payment-initiation';

    /**
     * @link https://www.iana.org/assignments/media-types/application/set-registration
     */
    #[Info(name: 'application/set-registration', category: Category::APPLICATION)]
    case APPLICATION_SET_REGISTRATION = 'application/set-registration';

    /**
     * @link https://www.iana.org/assignments/media-types/application/set-registration-initiation
     */
    #[Info(name: 'application/set-registration-initiation', category: Category::APPLICATION)]
    case APPLICATION_SET_REGISTRATION_INITIATION = 'application/set-registration-initiation';

    /**
     * @link https://www.iana.org/assignments/media-types/application/SGML
     */
    #[Info(name: 'application/SGML', category: Category::APPLICATION)]
    case APPLICATION_SGML = 'application/sgml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sgml-open-catalog
     */
    #[Info(name: 'application/sgml-open-catalog', category: Category::APPLICATION)]
    case APPLICATION_SGML_OPEN_CATALOG = 'application/sgml-open-catalog';

    /**
     * @link https://www.iana.org/assignments/media-types/application/shf+xml
     */
    #[Info(name: 'application/shf+xml', category: Category::APPLICATION)]
    case APPLICATION_SHF_XML = 'application/shf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sieve
     */
    #[Info(name: 'application/sieve', category: Category::APPLICATION)]
    case APPLICATION_SIEVE = 'application/sieve';

    /**
     * @link https://www.iana.org/assignments/media-types/application/simple-filter+xml
     */
    #[Info(name: 'application/simple-filter+xml', category: Category::APPLICATION)]
    case APPLICATION_SIMPLE_FILTER_XML = 'application/simple-filter+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/simple-message-summary
     */
    #[Info(name: 'application/simple-message-summary', category: Category::APPLICATION)]
    case APPLICATION_SIMPLE_MESSAGE_SUMMARY = 'application/simple-message-summary';

    /**
     * @link https://www.iana.org/assignments/media-types/application/simpleSymbolContainer
     */
    #[Info(name: 'application/simpleSymbolContainer', category: Category::APPLICATION)]
    case APPLICATION_SIMPLESYMBOLCONTAINER = 'application/simplesymbolcontainer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sipc
     */
    #[Info(name: 'application/sipc', category: Category::APPLICATION)]
    case APPLICATION_SIPC = 'application/sipc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/slate
     */
    #[Info(name: 'application/slate', category: Category::APPLICATION)]
    case APPLICATION_SLATE = 'application/slate';

    /**
     * @link https://www.iana.org/assignments/media-types/application/smil
     */
    #[Info(name: 'application/smil', category: Category::APPLICATION)]
    case APPLICATION_SMIL = 'application/smil';

    /**
     * @link https://www.iana.org/assignments/media-types/application/smil+xml
     */
    #[Info(name: 'application/smil+xml', category: Category::APPLICATION)]
    case APPLICATION_SMIL_XML = 'application/smil+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/smpte336m
     */
    #[Info(name: 'application/smpte336m', category: Category::APPLICATION)]
    case APPLICATION_SMPTE336M = 'application/smpte336m';

    /**
     * @link https://www.iana.org/assignments/media-types/application/soap+fastinfoset
     */
    #[Info(name: 'application/soap+fastinfoset', category: Category::APPLICATION)]
    case APPLICATION_SOAP_FASTINFOSET = 'application/soap+fastinfoset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/soap+xml
     */
    #[Info(name: 'application/soap+xml', category: Category::APPLICATION)]
    case APPLICATION_SOAP_XML = 'application/soap+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sparql-query
     */
    #[Info(name: 'application/sparql-query', category: Category::APPLICATION)]
    case APPLICATION_SPARQL_QUERY = 'application/sparql-query';

    /**
     * @link https://www.iana.org/assignments/media-types/application/spdx+json
     */
    #[Info(name: 'application/spdx+json', category: Category::APPLICATION)]
    case APPLICATION_SPDX_JSON = 'application/spdx+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sparql-results+xml
     */
    #[Info(name: 'application/sparql-results+xml', category: Category::APPLICATION)]
    case APPLICATION_SPARQL_RESULTS_XML = 'application/sparql-results+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/spirits-event+xml
     */
    #[Info(name: 'application/spirits-event+xml', category: Category::APPLICATION)]
    case APPLICATION_SPIRITS_EVENT_XML = 'application/spirits-event+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sql
     */
    #[Info(name: 'application/sql', category: Category::APPLICATION)]
    case APPLICATION_SQL = 'application/sql';

    /**
     * @link https://www.iana.org/assignments/media-types/application/srgs
     */
    #[Info(name: 'application/srgs', category: Category::APPLICATION)]
    case APPLICATION_SRGS = 'application/srgs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/srgs+xml
     */
    #[Info(name: 'application/srgs+xml', category: Category::APPLICATION)]
    case APPLICATION_SRGS_XML = 'application/srgs+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/sru+xml
     */
    #[Info(name: 'application/sru+xml', category: Category::APPLICATION)]
    case APPLICATION_SRU_XML = 'application/sru+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ssml+xml
     */
    #[Info(name: 'application/ssml+xml', category: Category::APPLICATION)]
    case APPLICATION_SSML_XML = 'application/ssml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/stix+json
     */
    #[Info(name: 'application/stix+json', category: Category::APPLICATION)]
    case APPLICATION_STIX_JSON = 'application/stix+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/swid+xml
     */
    #[Info(name: 'application/swid+xml', category: Category::APPLICATION)]
    case APPLICATION_SWID_XML = 'application/swid+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-apex-update
     */
    #[Info(name: 'application/tamp-apex-update', category: Category::APPLICATION)]
    case APPLICATION_TAMP_APEX_UPDATE = 'application/tamp-apex-update';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-apex-update-confirm
     */
    #[Info(name: 'application/tamp-apex-update-confirm', category: Category::APPLICATION)]
    case APPLICATION_TAMP_APEX_UPDATE_CONFIRM = 'application/tamp-apex-update-confirm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-community-update
     */
    #[Info(name: 'application/tamp-community-update', category: Category::APPLICATION)]
    case APPLICATION_TAMP_COMMUNITY_UPDATE = 'application/tamp-community-update';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-community-update-confirm
     */
    #[Info(name: 'application/tamp-community-update-confirm', category: Category::APPLICATION)]
    case APPLICATION_TAMP_COMMUNITY_UPDATE_CONFIRM = 'application/tamp-community-update-confirm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-error
     */
    #[Info(name: 'application/tamp-error', category: Category::APPLICATION)]
    case APPLICATION_TAMP_ERROR = 'application/tamp-error';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-sequence-adjust
     */
    #[Info(name: 'application/tamp-sequence-adjust', category: Category::APPLICATION)]
    case APPLICATION_TAMP_SEQUENCE_ADJUST = 'application/tamp-sequence-adjust';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-sequence-adjust-confirm
     */
    #[Info(name: 'application/tamp-sequence-adjust-confirm', category: Category::APPLICATION)]
    case APPLICATION_TAMP_SEQUENCE_ADJUST_CONFIRM = 'application/tamp-sequence-adjust-confirm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-status-query
     */
    #[Info(name: 'application/tamp-status-query', category: Category::APPLICATION)]
    case APPLICATION_TAMP_STATUS_QUERY = 'application/tamp-status-query';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-status-response
     */
    #[Info(name: 'application/tamp-status-response', category: Category::APPLICATION)]
    case APPLICATION_TAMP_STATUS_RESPONSE = 'application/tamp-status-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-update
     */
    #[Info(name: 'application/tamp-update', category: Category::APPLICATION)]
    case APPLICATION_TAMP_UPDATE = 'application/tamp-update';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tamp-update-confirm
     */
    #[Info(name: 'application/tamp-update-confirm', category: Category::APPLICATION)]
    case APPLICATION_TAMP_UPDATE_CONFIRM = 'application/tamp-update-confirm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/taxii+json
     */
    #[Info(name: 'application/taxii+json', category: Category::APPLICATION)]
    case APPLICATION_TAXII_JSON = 'application/taxii+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/td+json
     */
    #[Info(name: 'application/td+json', category: Category::APPLICATION)]
    case APPLICATION_TD_JSON = 'application/td+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tei+xml
     */
    #[Info(name: 'application/tei+xml', category: Category::APPLICATION)]
    case APPLICATION_TEI_XML = 'application/tei+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/TETRA_ISI
     */
    #[Info(name: 'application/TETRA_ISI', category: Category::APPLICATION)]
    case APPLICATION_TETRA_ISI = 'application/tetra_isi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/thraud+xml
     */
    #[Info(name: 'application/thraud+xml', category: Category::APPLICATION)]
    case APPLICATION_THRAUD_XML = 'application/thraud+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/timestamp-query
     */
    #[Info(name: 'application/timestamp-query', category: Category::APPLICATION)]
    case APPLICATION_TIMESTAMP_QUERY = 'application/timestamp-query';

    /**
     * @link https://www.iana.org/assignments/media-types/application/timestamp-reply
     */
    #[Info(name: 'application/timestamp-reply', category: Category::APPLICATION)]
    case APPLICATION_TIMESTAMP_REPLY = 'application/timestamp-reply';

    /**
     * @link https://www.iana.org/assignments/media-types/application/timestamped-data
     */
    #[Info(name: 'application/timestamped-data', category: Category::APPLICATION)]
    case APPLICATION_TIMESTAMPED_DATA = 'application/timestamped-data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tlsrpt+gzip
     */
    #[Info(name: 'application/tlsrpt+gzip', category: Category::APPLICATION)]
    case APPLICATION_TLSRPT_GZIP = 'application/tlsrpt+gzip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tlsrpt+json
     */
    #[Info(name: 'application/tlsrpt+json', category: Category::APPLICATION)]
    case APPLICATION_TLSRPT_JSON = 'application/tlsrpt+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tnauthlist
     */
    #[Info(name: 'application/tnauthlist', category: Category::APPLICATION)]
    case APPLICATION_TNAUTHLIST = 'application/tnauthlist';

    /**
     * @link https://www.iana.org/assignments/media-types/application/token-introspection+jwt
     */
    #[Info(name: 'application/token-introspection+jwt', category: Category::APPLICATION)]
    case APPLICATION_TOKEN_INTROSPECTION_JWT = 'application/token-introspection+jwt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/trickle-ice-sdpfrag
     */
    #[Info(name: 'application/trickle-ice-sdpfrag', category: Category::APPLICATION)]
    case APPLICATION_TRICKLE_ICE_SDPFRAG = 'application/trickle-ice-sdpfrag';

    /**
     * @link https://www.iana.org/assignments/media-types/application/trig
     */
    #[Info(name: 'application/trig', category: Category::APPLICATION)]
    case APPLICATION_TRIG = 'application/trig';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ttml+xml
     */
    #[Info(name: 'application/ttml+xml', category: Category::APPLICATION)]
    case APPLICATION_TTML_XML = 'application/ttml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tve-trigger
     */
    #[Info(name: 'application/tve-trigger', category: Category::APPLICATION)]
    case APPLICATION_TVE_TRIGGER = 'application/tve-trigger';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tzif
     */
    #[Info(name: 'application/tzif', category: Category::APPLICATION)]
    case APPLICATION_TZIF = 'application/tzif';

    /**
     * @link https://www.iana.org/assignments/media-types/application/tzif-leap
     */
    #[Info(name: 'application/tzif-leap', category: Category::APPLICATION)]
    case APPLICATION_TZIF_LEAP = 'application/tzif-leap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/ulpfec
     */
    #[Info(name: 'application/ulpfec', category: Category::APPLICATION)]
    case APPLICATION_ULPFEC = 'application/ulpfec';

    /**
     * @link https://www.iana.org/assignments/media-types/application/urc-grpsheet+xml
     */
    #[Info(name: 'application/urc-grpsheet+xml', category: Category::APPLICATION)]
    case APPLICATION_URC_GRPSHEET_XML = 'application/urc-grpsheet+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/urc-ressheet+xml
     */
    #[Info(name: 'application/urc-ressheet+xml', category: Category::APPLICATION)]
    case APPLICATION_URC_RESSHEET_XML = 'application/urc-ressheet+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/urc-targetdesc+xml
     */
    #[Info(name: 'application/urc-targetdesc+xml', category: Category::APPLICATION)]
    case APPLICATION_URC_TARGETDESC_XML = 'application/urc-targetdesc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/urc-uisocketdesc+xml
     */
    #[Info(name: 'application/urc-uisocketdesc+xml', category: Category::APPLICATION)]
    case APPLICATION_URC_UISOCKETDESC_XML = 'application/urc-uisocketdesc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vcard+json
     */
    #[Info(name: 'application/vcard+json', category: Category::APPLICATION)]
    case APPLICATION_VCARD_JSON = 'application/vcard+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vcard+xml
     */
    #[Info(name: 'application/vcard+xml', category: Category::APPLICATION)]
    case APPLICATION_VCARD_XML = 'application/vcard+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vemmi
     */
    #[Info(name: 'application/vemmi', category: Category::APPLICATION)]
    case APPLICATION_VEMMI = 'application/vemmi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.1000minds.decision-model+xml
     */
    #[Info(name: 'application/vnd.1000minds.decision-model+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_1000MINDS_DECISION_MODEL_XML = 'application/vnd.1000minds.decision-model+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.5gnas
     */
    #[Info(name: 'application/vnd.3gpp.5gnas', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_5GNAS = 'application/vnd.3gpp.5gnas';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.access-transfer-events+xml
     */
    #[Info(name: 'application/vnd.3gpp.access-transfer-events+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_ACCESS_TRANSFER_EVENTS_XML = 'application/vnd.3gpp.access-transfer-events+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.bsf+xml
     */
    #[Info(name: 'application/vnd.3gpp.bsf+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_BSF_XML = 'application/vnd.3gpp.bsf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.GMOP+xml
     */
    #[Info(name: 'application/vnd.3gpp.GMOP+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_GMOP_XML = 'application/vnd.3gpp.gmop+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.gtpc
     */
    #[Info(name: 'application/vnd.3gpp.gtpc', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_GTPC = 'application/vnd.3gpp.gtpc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.interworking-data
     */
    #[Info(name: 'application/vnd.3gpp.interworking-data', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_INTERWORKING_DATA = 'application/vnd.3gpp.interworking-data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.lpp
     */
    #[Info(name: 'application/vnd.3gpp.lpp', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_LPP = 'application/vnd.3gpp.lpp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mc-signalling-ear
     */
    #[Info(name: 'application/vnd.3gpp.mc-signalling-ear', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MC_SIGNALLING_EAR = 'application/vnd.3gpp.mc-signalling-ear';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-affiliation-command+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-affiliation-command+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_AFFILIATION_COMMAND_XML = 'application/vnd.3gpp.mcdata-affiliation-command+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_INFO_XML = 'application/vnd.3gpp.mcdata-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-msgstore-ctrl-request+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-msgstore-ctrl-request+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_MSGSTORE_CTRL_REQUEST_XML = 'application/vnd.3gpp.mcdata-msgstore-ctrl-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-payload
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-payload', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_PAYLOAD = 'application/vnd.3gpp.mcdata-payload';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-regroup+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-regroup+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_REGROUP_XML = 'application/vnd.3gpp.mcdata-regroup+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-service-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-service-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_SERVICE_CONFIG_XML = 'application/vnd.3gpp.mcdata-service-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-signalling
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-signalling', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_SIGNALLING = 'application/vnd.3gpp.mcdata-signalling';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-ue-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-ue-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_UE_CONFIG_XML = 'application/vnd.3gpp.mcdata-ue-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcdata-user-profile+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcdata-user-profile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCDATA_USER_PROFILE_XML = 'application/vnd.3gpp.mcdata-user-profile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-affiliation-command+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-affiliation-command+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_AFFILIATION_COMMAND_XML = 'application/vnd.3gpp.mcptt-affiliation-command+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-floor-request+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-floor-request+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_FLOOR_REQUEST_XML = 'application/vnd.3gpp.mcptt-floor-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_INFO_XML = 'application/vnd.3gpp.mcptt-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-location-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-location-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_LOCATION_INFO_XML = 'application/vnd.3gpp.mcptt-location-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-mbms-usage-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-mbms-usage-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_MBMS_USAGE_INFO_XML = 'application/vnd.3gpp.mcptt-mbms-usage-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-service-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-service-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_SERVICE_CONFIG_XML = 'application/vnd.3gpp.mcptt-service-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-signed+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-signed+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_SIGNED_XML = 'application/vnd.3gpp.mcptt-signed+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-ue-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-ue-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_UE_CONFIG_XML = 'application/vnd.3gpp.mcptt-ue-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-ue-init-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-ue-init-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_UE_INIT_CONFIG_XML = 'application/vnd.3gpp.mcptt-ue-init-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcptt-user-profile+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcptt-user-profile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCPTT_USER_PROFILE_XML = 'application/vnd.3gpp.mcptt-user-profile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-affiliation-command+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-affiliation-command+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_AFFILIATION_COMMAND_XML = 'application/vnd.3gpp.mcvideo-affiliation-command+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-affiliation-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-affiliation-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_AFFILIATION_INFO_XML = 'application/vnd.3gpp.mcvideo-affiliation-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_INFO_XML = 'application/vnd.3gpp.mcvideo-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-location-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-location-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_LOCATION_INFO_XML = 'application/vnd.3gpp.mcvideo-location-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-mbms-usage-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-mbms-usage-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_MBMS_USAGE_INFO_XML = 'application/vnd.3gpp.mcvideo-mbms-usage-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-service-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-service-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_SERVICE_CONFIG_XML = 'application/vnd.3gpp.mcvideo-service-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-transmission-request+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-transmission-request+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_TRANSMISSION_REQUEST_XML = 'application/vnd.3gpp.mcvideo-transmission-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-ue-config+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-ue-config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_UE_CONFIG_XML = 'application/vnd.3gpp.mcvideo-ue-config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mcvideo-user-profile+xml
     */
    #[Info(name: 'application/vnd.3gpp.mcvideo-user-profile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MCVIDEO_USER_PROFILE_XML = 'application/vnd.3gpp.mcvideo-user-profile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.mid-call+xml
     */
    #[Info(name: 'application/vnd.3gpp.mid-call+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_MID_CALL_XML = 'application/vnd.3gpp.mid-call+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.ngap
     */
    #[Info(name: 'application/vnd.3gpp.ngap', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_NGAP = 'application/vnd.3gpp.ngap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.pfcp
     */
    #[Info(name: 'application/vnd.3gpp.pfcp', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_PFCP = 'application/vnd.3gpp.pfcp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.pic-bw-large
     */
    #[Info(name: 'application/vnd.3gpp.pic-bw-large', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_PIC_BW_LARGE = 'application/vnd.3gpp.pic-bw-large';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.pic-bw-small
     */
    #[Info(name: 'application/vnd.3gpp.pic-bw-small', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_PIC_BW_SMALL = 'application/vnd.3gpp.pic-bw-small';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.pic-bw-var
     */
    #[Info(name: 'application/vnd.3gpp.pic-bw-var', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_PIC_BW_VAR = 'application/vnd.3gpp.pic-bw-var';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp-prose-pc3ch+xml
     */
    #[Info(name: 'application/vnd.3gpp-prose-pc3ch+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_PROSE_PC3CH_XML = 'application/vnd.3gpp-prose-pc3ch+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp-prose+xml
     */
    #[Info(name: 'application/vnd.3gpp-prose+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_PROSE_XML = 'application/vnd.3gpp-prose+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.s1ap
     */
    #[Info(name: 'application/vnd.3gpp.s1ap', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_S1AP = 'application/vnd.3gpp.s1ap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.sms
     */
    #[Info(name: 'application/vnd.3gpp.sms', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_SMS = 'application/vnd.3gpp.sms';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.sms+xml
     */
    #[Info(name: 'application/vnd.3gpp.sms+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_SMS_XML = 'application/vnd.3gpp.sms+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.srvcc-ext+xml
     */
    #[Info(name: 'application/vnd.3gpp.srvcc-ext+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_SRVCC_EXT_XML = 'application/vnd.3gpp.srvcc-ext+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.SRVCC-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.SRVCC-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_SRVCC_INFO_XML = 'application/vnd.3gpp.srvcc-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.state-and-event-info+xml
     */
    #[Info(name: 'application/vnd.3gpp.state-and-event-info+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_STATE_AND_EVENT_INFO_XML = 'application/vnd.3gpp.state-and-event-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp.ussd+xml
     */
    #[Info(name: 'application/vnd.3gpp.ussd+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_USSD_XML = 'application/vnd.3gpp.ussd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp-v2x-local-service-information
     */
    #[Info(name: 'application/vnd.3gpp-v2x-local-service-information', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP_V2X_LOCAL_SERVICE_INFORMATION = 'application/vnd.3gpp-v2x-local-service-information';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp2.bcmcsinfo+xml
     */
    #[Info(name: 'application/vnd.3gpp2.bcmcsinfo+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP2_BCMCSINFO_XML = 'application/vnd.3gpp2.bcmcsinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp2.sms
     */
    #[Info(name: 'application/vnd.3gpp2.sms', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP2_SMS = 'application/vnd.3gpp2.sms';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3gpp2.tcap
     */
    #[Info(name: 'application/vnd.3gpp2.tcap', category: Category::APPLICATION)]
    case APPLICATION_VND_3GPP2_TCAP = 'application/vnd.3gpp2.tcap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3lightssoftware.imagescal
     */
    #[Info(name: 'application/vnd.3lightssoftware.imagescal', category: Category::APPLICATION)]
    case APPLICATION_VND_3LIGHTSSOFTWARE_IMAGESCAL = 'application/vnd.3lightssoftware.imagescal';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.3M.Post-it-Notes
     */
    #[Info(name: 'application/vnd.3M.Post-it-Notes', category: Category::APPLICATION)]
    case APPLICATION_VND_3M_POST_IT_NOTES = 'application/vnd.3m.post-it-notes';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.accpac.simply.aso
     */
    #[Info(name: 'application/vnd.accpac.simply.aso', category: Category::APPLICATION)]
    case APPLICATION_VND_ACCPAC_SIMPLY_ASO = 'application/vnd.accpac.simply.aso';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.accpac.simply.imp
     */
    #[Info(name: 'application/vnd.accpac.simply.imp', category: Category::APPLICATION)]
    case APPLICATION_VND_ACCPAC_SIMPLY_IMP = 'application/vnd.accpac.simply.imp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.acucobol
     */
    #[Info(name: 'application/vnd.acucobol', category: Category::APPLICATION)]
    case APPLICATION_VND_ACUCOBOL = 'application/vnd.acucobol';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.acucorp
     */
    #[Info(name: 'application/vnd.acucorp', category: Category::APPLICATION)]
    case APPLICATION_VND_ACUCORP = 'application/vnd.acucorp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.adobe.flash.movie
     */
    #[Info(name: 'application/vnd.adobe.flash.movie', category: Category::APPLICATION)]
    case APPLICATION_VND_ADOBE_FLASH_MOVIE = 'application/vnd.adobe.flash.movie';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.adobe.formscentral.fcdt
     */
    #[Info(name: 'application/vnd.adobe.formscentral.fcdt', category: Category::APPLICATION)]
    case APPLICATION_VND_ADOBE_FORMSCENTRAL_FCDT = 'application/vnd.adobe.formscentral.fcdt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.adobe.fxp
     */
    #[Info(name: 'application/vnd.adobe.fxp', category: Category::APPLICATION)]
    case APPLICATION_VND_ADOBE_FXP = 'application/vnd.adobe.fxp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.adobe.partial-upload
     */
    #[Info(name: 'application/vnd.adobe.partial-upload', category: Category::APPLICATION)]
    case APPLICATION_VND_ADOBE_PARTIAL_UPLOAD = 'application/vnd.adobe.partial-upload';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.adobe.xdp+xml
     */
    #[Info(name: 'application/vnd.adobe.xdp+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ADOBE_XDP_XML = 'application/vnd.adobe.xdp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.aether.imp
     */
    #[Info(name: 'application/vnd.aether.imp', category: Category::APPLICATION)]
    case APPLICATION_VND_AETHER_IMP = 'application/vnd.aether.imp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.afplinedata
     */
    #[Info(name: 'application/vnd.afpc.afplinedata', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_AFPLINEDATA = 'application/vnd.afpc.afplinedata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.afplinedata-pagedef
     */
    #[Info(name: 'application/vnd.afpc.afplinedata-pagedef', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_AFPLINEDATA_PAGEDEF = 'application/vnd.afpc.afplinedata-pagedef';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.cmoca-cmresource
     */
    #[Info(name: 'application/vnd.afpc.cmoca-cmresource', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_CMOCA_CMRESOURCE = 'application/vnd.afpc.cmoca-cmresource';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.foca-charset
     */
    #[Info(name: 'application/vnd.afpc.foca-charset', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_FOCA_CHARSET = 'application/vnd.afpc.foca-charset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.foca-codedfont
     */
    #[Info(name: 'application/vnd.afpc.foca-codedfont', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_FOCA_CODEDFONT = 'application/vnd.afpc.foca-codedfont';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.foca-codepage
     */
    #[Info(name: 'application/vnd.afpc.foca-codepage', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_FOCA_CODEPAGE = 'application/vnd.afpc.foca-codepage';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca
     */
    #[Info(name: 'application/vnd.afpc.modca', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA = 'application/vnd.afpc.modca';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca-cmtable
     */
    #[Info(name: 'application/vnd.afpc.modca-cmtable', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA_CMTABLE = 'application/vnd.afpc.modca-cmtable';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca-formdef
     */
    #[Info(name: 'application/vnd.afpc.modca-formdef', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA_FORMDEF = 'application/vnd.afpc.modca-formdef';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca-mediummap
     */
    #[Info(name: 'application/vnd.afpc.modca-mediummap', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA_MEDIUMMAP = 'application/vnd.afpc.modca-mediummap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca-objectcontainer
     */
    #[Info(name: 'application/vnd.afpc.modca-objectcontainer', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA_OBJECTCONTAINER = 'application/vnd.afpc.modca-objectcontainer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca-overlay
     */
    #[Info(name: 'application/vnd.afpc.modca-overlay', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA_OVERLAY = 'application/vnd.afpc.modca-overlay';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.afpc.modca-pagesegment
     */
    #[Info(name: 'application/vnd.afpc.modca-pagesegment', category: Category::APPLICATION)]
    case APPLICATION_VND_AFPC_MODCA_PAGESEGMENT = 'application/vnd.afpc.modca-pagesegment';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.age
     */
    #[Info(name: 'application/vnd.age', category: Category::APPLICATION)]
    case APPLICATION_VND_AGE = 'application/vnd.age';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ah-barcode
     */
    #[Info(name: 'application/vnd.ah-barcode', category: Category::APPLICATION)]
    case APPLICATION_VND_AH_BARCODE = 'application/vnd.ah-barcode';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ahead.space
     */
    #[Info(name: 'application/vnd.ahead.space', category: Category::APPLICATION)]
    case APPLICATION_VND_AHEAD_SPACE = 'application/vnd.ahead.space';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.airzip.filesecure.azf
     */
    #[Info(name: 'application/vnd.airzip.filesecure.azf', category: Category::APPLICATION)]
    case APPLICATION_VND_AIRZIP_FILESECURE_AZF = 'application/vnd.airzip.filesecure.azf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.airzip.filesecure.azs
     */
    #[Info(name: 'application/vnd.airzip.filesecure.azs', category: Category::APPLICATION)]
    case APPLICATION_VND_AIRZIP_FILESECURE_AZS = 'application/vnd.airzip.filesecure.azs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.amadeus+json
     */
    #[Info(name: 'application/vnd.amadeus+json', category: Category::APPLICATION)]
    case APPLICATION_VND_AMADEUS_JSON = 'application/vnd.amadeus+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.amazon.mobi8-ebook
     */
    #[Info(name: 'application/vnd.amazon.mobi8-ebook', category: Category::APPLICATION)]
    case APPLICATION_VND_AMAZON_MOBI8_EBOOK = 'application/vnd.amazon.mobi8-ebook';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.americandynamics.acc
     */
    #[Info(name: 'application/vnd.americandynamics.acc', category: Category::APPLICATION)]
    case APPLICATION_VND_AMERICANDYNAMICS_ACC = 'application/vnd.americandynamics.acc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.amiga.ami
     */
    #[Info(name: 'application/vnd.amiga.ami', category: Category::APPLICATION)]
    case APPLICATION_VND_AMIGA_AMI = 'application/vnd.amiga.ami';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.amundsen.maze+xml
     */
    #[Info(name: 'application/vnd.amundsen.maze+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_AMUNDSEN_MAZE_XML = 'application/vnd.amundsen.maze+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.android.ota
     */
    #[Info(name: 'application/vnd.android.ota', category: Category::APPLICATION)]
    case APPLICATION_VND_ANDROID_OTA = 'application/vnd.android.ota';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.anki
     */
    #[Info(name: 'application/vnd.anki', category: Category::APPLICATION)]
    case APPLICATION_VND_ANKI = 'application/vnd.anki';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.anser-web-certificate-issue-initiation
     */
    #[Info(name: 'application/vnd.anser-web-certificate-issue-initiation', category: Category::APPLICATION)]
    case APPLICATION_VND_ANSER_WEB_CERTIFICATE_ISSUE_INITIATION = 'application/vnd.anser-web-certificate-issue-initiation';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.antix.game-component
     */
    #[Info(name: 'application/vnd.antix.game-component', category: Category::APPLICATION)]
    case APPLICATION_VND_ANTIX_GAME_COMPONENT = 'application/vnd.antix.game-component';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apache.arrow.file
     */
    #[Info(name: 'application/vnd.apache.arrow.file', category: Category::APPLICATION)]
    case APPLICATION_VND_APACHE_ARROW_FILE = 'application/vnd.apache.arrow.file';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apache.arrow.stream
     */
    #[Info(name: 'application/vnd.apache.arrow.stream', category: Category::APPLICATION)]
    case APPLICATION_VND_APACHE_ARROW_STREAM = 'application/vnd.apache.arrow.stream';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apache.thrift.binary
     */
    #[Info(name: 'application/vnd.apache.thrift.binary', category: Category::APPLICATION)]
    case APPLICATION_VND_APACHE_THRIFT_BINARY = 'application/vnd.apache.thrift.binary';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apache.thrift.compact
     */
    #[Info(name: 'application/vnd.apache.thrift.compact', category: Category::APPLICATION)]
    case APPLICATION_VND_APACHE_THRIFT_COMPACT = 'application/vnd.apache.thrift.compact';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apache.thrift.json
     */
    #[Info(name: 'application/vnd.apache.thrift.json', category: Category::APPLICATION)]
    case APPLICATION_VND_APACHE_THRIFT_JSON = 'application/vnd.apache.thrift.json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.api+json
     */
    #[Info(name: 'application/vnd.api+json', category: Category::APPLICATION)]
    case APPLICATION_VND_API_JSON = 'application/vnd.api+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.aplextor.warrp+json
     */
    #[Info(name: 'application/vnd.aplextor.warrp+json', category: Category::APPLICATION)]
    case APPLICATION_VND_APLEXTOR_WARRP_JSON = 'application/vnd.aplextor.warrp+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apothekende.reservation+json
     */
    #[Info(name: 'application/vnd.apothekende.reservation+json', category: Category::APPLICATION)]
    case APPLICATION_VND_APOTHEKENDE_RESERVATION_JSON = 'application/vnd.apothekende.reservation+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apple.installer+xml
     */
    #[Info(name: 'application/vnd.apple.installer+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_APPLE_INSTALLER_XML = 'application/vnd.apple.installer+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apple.keynote
     */
    #[Info(name: 'application/vnd.apple.keynote', category: Category::APPLICATION)]
    case APPLICATION_VND_APPLE_KEYNOTE = 'application/vnd.apple.keynote';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apple.mpegurl
     */
    #[Info(name: 'application/vnd.apple.mpegurl', category: Category::APPLICATION)]
    case APPLICATION_VND_APPLE_MPEGURL = 'application/vnd.apple.mpegurl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apple.numbers
     */
    #[Info(name: 'application/vnd.apple.numbers', category: Category::APPLICATION)]
    case APPLICATION_VND_APPLE_NUMBERS = 'application/vnd.apple.numbers';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.apple.pages
     */
    #[Info(name: 'application/vnd.apple.pages', category: Category::APPLICATION)]
    case APPLICATION_VND_APPLE_PAGES = 'application/vnd.apple.pages';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.arastra.swi
     */
    #[Info(name: 'application/vnd.arastra.swi', category: Category::APPLICATION)]
    case APPLICATION_VND_ARASTRA_SWI = 'application/vnd.arastra.swi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.aristanetworks.swi
     */
    #[Info(name: 'application/vnd.aristanetworks.swi', category: Category::APPLICATION)]
    case APPLICATION_VND_ARISTANETWORKS_SWI = 'application/vnd.aristanetworks.swi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.artisan+json
     */
    #[Info(name: 'application/vnd.artisan+json', category: Category::APPLICATION)]
    case APPLICATION_VND_ARTISAN_JSON = 'application/vnd.artisan+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.artsquare
     */
    #[Info(name: 'application/vnd.artsquare', category: Category::APPLICATION)]
    case APPLICATION_VND_ARTSQUARE = 'application/vnd.artsquare';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.astraea-software.iota
     */
    #[Info(name: 'application/vnd.astraea-software.iota', category: Category::APPLICATION)]
    case APPLICATION_VND_ASTRAEA_SOFTWARE_IOTA = 'application/vnd.astraea-software.iota';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.audiograph
     */
    #[Info(name: 'application/vnd.audiograph', category: Category::APPLICATION)]
    case APPLICATION_VND_AUDIOGRAPH = 'application/vnd.audiograph';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.autopackage
     */
    #[Info(name: 'application/vnd.autopackage', category: Category::APPLICATION)]
    case APPLICATION_VND_AUTOPACKAGE = 'application/vnd.autopackage';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.avalon+json
     */
    #[Info(name: 'application/vnd.avalon+json', category: Category::APPLICATION)]
    case APPLICATION_VND_AVALON_JSON = 'application/vnd.avalon+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.avistar+xml
     */
    #[Info(name: 'application/vnd.avistar+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_AVISTAR_XML = 'application/vnd.avistar+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.balsamiq.bmml+xml
     */
    #[Info(name: 'application/vnd.balsamiq.bmml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_BALSAMIQ_BMML_XML = 'application/vnd.balsamiq.bmml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.banana-accounting
     */
    #[Info(name: 'application/vnd.banana-accounting', category: Category::APPLICATION)]
    case APPLICATION_VND_BANANA_ACCOUNTING = 'application/vnd.banana-accounting';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bbf.usp.error
     */
    #[Info(name: 'application/vnd.bbf.usp.error', category: Category::APPLICATION)]
    case APPLICATION_VND_BBF_USP_ERROR = 'application/vnd.bbf.usp.error';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bbf.usp.msg
     */
    #[Info(name: 'application/vnd.bbf.usp.msg', category: Category::APPLICATION)]
    case APPLICATION_VND_BBF_USP_MSG = 'application/vnd.bbf.usp.msg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bbf.usp.msg+json
     */
    #[Info(name: 'application/vnd.bbf.usp.msg+json', category: Category::APPLICATION)]
    case APPLICATION_VND_BBF_USP_MSG_JSON = 'application/vnd.bbf.usp.msg+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.balsamiq.bmpr
     */
    #[Info(name: 'application/vnd.balsamiq.bmpr', category: Category::APPLICATION)]
    case APPLICATION_VND_BALSAMIQ_BMPR = 'application/vnd.balsamiq.bmpr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bekitzur-stech+json
     */
    #[Info(name: 'application/vnd.bekitzur-stech+json', category: Category::APPLICATION)]
    case APPLICATION_VND_BEKITZUR_STECH_JSON = 'application/vnd.bekitzur-stech+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.belightsoft.lhzd+zip
     */
    #[Info(name: 'application/vnd.belightsoft.lhzd+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_BELIGHTSOFT_LHZD_ZIP = 'application/vnd.belightsoft.lhzd+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bint.med-content
     */
    #[Info(name: 'application/vnd.bint.med-content', category: Category::APPLICATION)]
    case APPLICATION_VND_BINT_MED_CONTENT = 'application/vnd.bint.med-content';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.biopax.rdf+xml
     */
    #[Info(name: 'application/vnd.biopax.rdf+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_BIOPAX_RDF_XML = 'application/vnd.biopax.rdf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.blink-idb-value-wrapper
     */
    #[Info(name: 'application/vnd.blink-idb-value-wrapper', category: Category::APPLICATION)]
    case APPLICATION_VND_BLINK_IDB_VALUE_WRAPPER = 'application/vnd.blink-idb-value-wrapper';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.blueice.multipass
     */
    #[Info(name: 'application/vnd.blueice.multipass', category: Category::APPLICATION)]
    case APPLICATION_VND_BLUEICE_MULTIPASS = 'application/vnd.blueice.multipass';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bluetooth.ep.oob
     */
    #[Info(name: 'application/vnd.bluetooth.ep.oob', category: Category::APPLICATION)]
    case APPLICATION_VND_BLUETOOTH_EP_OOB = 'application/vnd.bluetooth.ep.oob';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bluetooth.le.oob
     */
    #[Info(name: 'application/vnd.bluetooth.le.oob', category: Category::APPLICATION)]
    case APPLICATION_VND_BLUETOOTH_LE_OOB = 'application/vnd.bluetooth.le.oob';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bmi
     */
    #[Info(name: 'application/vnd.bmi', category: Category::APPLICATION)]
    case APPLICATION_VND_BMI = 'application/vnd.bmi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bpf
     */
    #[Info(name: 'application/vnd.bpf', category: Category::APPLICATION)]
    case APPLICATION_VND_BPF = 'application/vnd.bpf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.bpf3
     */
    #[Info(name: 'application/vnd.bpf3', category: Category::APPLICATION)]
    case APPLICATION_VND_BPF3 = 'application/vnd.bpf3';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.businessobjects
     */
    #[Info(name: 'application/vnd.businessobjects', category: Category::APPLICATION)]
    case APPLICATION_VND_BUSINESSOBJECTS = 'application/vnd.businessobjects';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.byu.uapi+json
     */
    #[Info(name: 'application/vnd.byu.uapi+json', category: Category::APPLICATION)]
    case APPLICATION_VND_BYU_UAPI_JSON = 'application/vnd.byu.uapi+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cab-jscript
     */
    #[Info(name: 'application/vnd.cab-jscript', category: Category::APPLICATION)]
    case APPLICATION_VND_CAB_JSCRIPT = 'application/vnd.cab-jscript';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.canon-cpdl
     */
    #[Info(name: 'application/vnd.canon-cpdl', category: Category::APPLICATION)]
    case APPLICATION_VND_CANON_CPDL = 'application/vnd.canon-cpdl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.canon-lips
     */
    #[Info(name: 'application/vnd.canon-lips', category: Category::APPLICATION)]
    case APPLICATION_VND_CANON_LIPS = 'application/vnd.canon-lips';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.capasystems-pg+json
     */
    #[Info(name: 'application/vnd.capasystems-pg+json', category: Category::APPLICATION)]
    case APPLICATION_VND_CAPASYSTEMS_PG_JSON = 'application/vnd.capasystems-pg+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cendio.thinlinc.clientconf
     */
    #[Info(name: 'application/vnd.cendio.thinlinc.clientconf', category: Category::APPLICATION)]
    case APPLICATION_VND_CENDIO_THINLINC_CLIENTCONF = 'application/vnd.cendio.thinlinc.clientconf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.century-systems.tcp_stream
     */
    #[Info(name: 'application/vnd.century-systems.tcp_stream', category: Category::APPLICATION)]
    case APPLICATION_VND_CENTURY_SYSTEMS_TCP_STREAM = 'application/vnd.century-systems.tcp_stream';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.chemdraw+xml
     */
    #[Info(name: 'application/vnd.chemdraw+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_CHEMDRAW_XML = 'application/vnd.chemdraw+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.chess-pgn
     */
    #[Info(name: 'application/vnd.chess-pgn', category: Category::APPLICATION)]
    case APPLICATION_VND_CHESS_PGN = 'application/vnd.chess-pgn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.chipnuts.karaoke-mmd
     */
    #[Info(name: 'application/vnd.chipnuts.karaoke-mmd', category: Category::APPLICATION)]
    case APPLICATION_VND_CHIPNUTS_KARAOKE_MMD = 'application/vnd.chipnuts.karaoke-mmd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ciedi
     */
    #[Info(name: 'application/vnd.ciedi', category: Category::APPLICATION)]
    case APPLICATION_VND_CIEDI = 'application/vnd.ciedi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cinderella
     */
    #[Info(name: 'application/vnd.cinderella', category: Category::APPLICATION)]
    case APPLICATION_VND_CINDERELLA = 'application/vnd.cinderella';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cirpack.isdn-ext
     */
    #[Info(name: 'application/vnd.cirpack.isdn-ext', category: Category::APPLICATION)]
    case APPLICATION_VND_CIRPACK_ISDN_EXT = 'application/vnd.cirpack.isdn-ext';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.citationstyles.style+xml
     */
    #[Info(name: 'application/vnd.citationstyles.style+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_CITATIONSTYLES_STYLE_XML = 'application/vnd.citationstyles.style+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.claymore
     */
    #[Info(name: 'application/vnd.claymore', category: Category::APPLICATION)]
    case APPLICATION_VND_CLAYMORE = 'application/vnd.claymore';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cloanto.rp9
     */
    #[Info(name: 'application/vnd.cloanto.rp9', category: Category::APPLICATION)]
    case APPLICATION_VND_CLOANTO_RP9 = 'application/vnd.cloanto.rp9';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.clonk.c4group
     */
    #[Info(name: 'application/vnd.clonk.c4group', category: Category::APPLICATION)]
    case APPLICATION_VND_CLONK_C4GROUP = 'application/vnd.clonk.c4group';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cluetrust.cartomobile-config
     */
    #[Info(name: 'application/vnd.cluetrust.cartomobile-config', category: Category::APPLICATION)]
    case APPLICATION_VND_CLUETRUST_CARTOMOBILE_CONFIG = 'application/vnd.cluetrust.cartomobile-config';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cluetrust.cartomobile-config-pkg
     */
    #[Info(name: 'application/vnd.cluetrust.cartomobile-config-pkg', category: Category::APPLICATION)]
    case APPLICATION_VND_CLUETRUST_CARTOMOBILE_CONFIG_PKG = 'application/vnd.cluetrust.cartomobile-config-pkg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.coffeescript
     */
    #[Info(name: 'application/vnd.coffeescript', category: Category::APPLICATION)]
    case APPLICATION_VND_COFFEESCRIPT = 'application/vnd.coffeescript';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collabio.xodocuments.document
     */
    #[Info(name: 'application/vnd.collabio.xodocuments.document', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLABIO_XODOCUMENTS_DOCUMENT = 'application/vnd.collabio.xodocuments.document';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collabio.xodocuments.document-template
     */
    #[Info(name: 'application/vnd.collabio.xodocuments.document-template', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLABIO_XODOCUMENTS_DOCUMENT_TEMPLATE = 'application/vnd.collabio.xodocuments.document-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collabio.xodocuments.presentation
     */
    #[Info(name: 'application/vnd.collabio.xodocuments.presentation', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLABIO_XODOCUMENTS_PRESENTATION = 'application/vnd.collabio.xodocuments.presentation';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collabio.xodocuments.presentation-template
     */
    #[Info(name: 'application/vnd.collabio.xodocuments.presentation-template', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLABIO_XODOCUMENTS_PRESENTATION_TEMPLATE = 'application/vnd.collabio.xodocuments.presentation-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collabio.xodocuments.spreadsheet
     */
    #[Info(name: 'application/vnd.collabio.xodocuments.spreadsheet', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLABIO_XODOCUMENTS_SPREADSHEET = 'application/vnd.collabio.xodocuments.spreadsheet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collabio.xodocuments.spreadsheet-template
     */
    #[Info(name: 'application/vnd.collabio.xodocuments.spreadsheet-template', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLABIO_XODOCUMENTS_SPREADSHEET_TEMPLATE = 'application/vnd.collabio.xodocuments.spreadsheet-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collection.doc+json
     */
    #[Info(name: 'application/vnd.collection.doc+json', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLECTION_DOC_JSON = 'application/vnd.collection.doc+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collection+json
     */
    #[Info(name: 'application/vnd.collection+json', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLECTION_JSON = 'application/vnd.collection+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.collection.next+json
     */
    #[Info(name: 'application/vnd.collection.next+json', category: Category::APPLICATION)]
    case APPLICATION_VND_COLLECTION_NEXT_JSON = 'application/vnd.collection.next+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.comicbook-rar
     */
    #[Info(name: 'application/vnd.comicbook-rar', category: Category::APPLICATION)]
    case APPLICATION_VND_COMICBOOK_RAR = 'application/vnd.comicbook-rar';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.comicbook+zip
     */
    #[Info(name: 'application/vnd.comicbook+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_COMICBOOK_ZIP = 'application/vnd.comicbook+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.commerce-battelle
     */
    #[Info(name: 'application/vnd.commerce-battelle', category: Category::APPLICATION)]
    case APPLICATION_VND_COMMERCE_BATTELLE = 'application/vnd.commerce-battelle';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.commonspace
     */
    #[Info(name: 'application/vnd.commonspace', category: Category::APPLICATION)]
    case APPLICATION_VND_COMMONSPACE = 'application/vnd.commonspace';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.coreos.ignition+json
     */
    #[Info(name: 'application/vnd.coreos.ignition+json', category: Category::APPLICATION)]
    case APPLICATION_VND_COREOS_IGNITION_JSON = 'application/vnd.coreos.ignition+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cosmocaller
     */
    #[Info(name: 'application/vnd.cosmocaller', category: Category::APPLICATION)]
    case APPLICATION_VND_COSMOCALLER = 'application/vnd.cosmocaller';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.contact.cmsg
     */
    #[Info(name: 'application/vnd.contact.cmsg', category: Category::APPLICATION)]
    case APPLICATION_VND_CONTACT_CMSG = 'application/vnd.contact.cmsg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.crick.clicker
     */
    #[Info(name: 'application/vnd.crick.clicker', category: Category::APPLICATION)]
    case APPLICATION_VND_CRICK_CLICKER = 'application/vnd.crick.clicker';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.crick.clicker.keyboard
     */
    #[Info(name: 'application/vnd.crick.clicker.keyboard', category: Category::APPLICATION)]
    case APPLICATION_VND_CRICK_CLICKER_KEYBOARD = 'application/vnd.crick.clicker.keyboard';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.crick.clicker.palette
     */
    #[Info(name: 'application/vnd.crick.clicker.palette', category: Category::APPLICATION)]
    case APPLICATION_VND_CRICK_CLICKER_PALETTE = 'application/vnd.crick.clicker.palette';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.crick.clicker.template
     */
    #[Info(name: 'application/vnd.crick.clicker.template', category: Category::APPLICATION)]
    case APPLICATION_VND_CRICK_CLICKER_TEMPLATE = 'application/vnd.crick.clicker.template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.crick.clicker.wordbank
     */
    #[Info(name: 'application/vnd.crick.clicker.wordbank', category: Category::APPLICATION)]
    case APPLICATION_VND_CRICK_CLICKER_WORDBANK = 'application/vnd.crick.clicker.wordbank';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.criticaltools.wbs+xml
     */
    #[Info(name: 'application/vnd.criticaltools.wbs+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_CRITICALTOOLS_WBS_XML = 'application/vnd.criticaltools.wbs+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cryptii.pipe+json
     */
    #[Info(name: 'application/vnd.cryptii.pipe+json', category: Category::APPLICATION)]
    case APPLICATION_VND_CRYPTII_PIPE_JSON = 'application/vnd.cryptii.pipe+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.crypto-shade-file
     */
    #[Info(name: 'application/vnd.crypto-shade-file', category: Category::APPLICATION)]
    case APPLICATION_VND_CRYPTO_SHADE_FILE = 'application/vnd.crypto-shade-file';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cryptomator.encrypted
     */
    #[Info(name: 'application/vnd.cryptomator.encrypted', category: Category::APPLICATION)]
    case APPLICATION_VND_CRYPTOMATOR_ENCRYPTED = 'application/vnd.cryptomator.encrypted';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cryptomator.vault
     */
    #[Info(name: 'application/vnd.cryptomator.vault', category: Category::APPLICATION)]
    case APPLICATION_VND_CRYPTOMATOR_VAULT = 'application/vnd.cryptomator.vault';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ctc-posml
     */
    #[Info(name: 'application/vnd.ctc-posml', category: Category::APPLICATION)]
    case APPLICATION_VND_CTC_POSML = 'application/vnd.ctc-posml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ctct.ws+xml
     */
    #[Info(name: 'application/vnd.ctct.ws+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_CTCT_WS_XML = 'application/vnd.ctct.ws+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cups-pdf
     */
    #[Info(name: 'application/vnd.cups-pdf', category: Category::APPLICATION)]
    case APPLICATION_VND_CUPS_PDF = 'application/vnd.cups-pdf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cups-postscript
     */
    #[Info(name: 'application/vnd.cups-postscript', category: Category::APPLICATION)]
    case APPLICATION_VND_CUPS_POSTSCRIPT = 'application/vnd.cups-postscript';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cups-ppd
     */
    #[Info(name: 'application/vnd.cups-ppd', category: Category::APPLICATION)]
    case APPLICATION_VND_CUPS_PPD = 'application/vnd.cups-ppd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cups-raster
     */
    #[Info(name: 'application/vnd.cups-raster', category: Category::APPLICATION)]
    case APPLICATION_VND_CUPS_RASTER = 'application/vnd.cups-raster';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cups-raw
     */
    #[Info(name: 'application/vnd.cups-raw', category: Category::APPLICATION)]
    case APPLICATION_VND_CUPS_RAW = 'application/vnd.cups-raw';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.curl
     */
    #[Info(name: 'application/vnd.curl', category: Category::APPLICATION)]
    case APPLICATION_VND_CURL = 'application/vnd.curl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cyan.dean.root+xml
     */
    #[Info(name: 'application/vnd.cyan.dean.root+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_CYAN_DEAN_ROOT_XML = 'application/vnd.cyan.dean.root+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cybank
     */
    #[Info(name: 'application/vnd.cybank', category: Category::APPLICATION)]
    case APPLICATION_VND_CYBANK = 'application/vnd.cybank';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cyclonedx+json
     */
    #[Info(name: 'application/vnd.cyclonedx+json', category: Category::APPLICATION)]
    case APPLICATION_VND_CYCLONEDX_JSON = 'application/vnd.cyclonedx+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.cyclonedx+xml
     */
    #[Info(name: 'application/vnd.cyclonedx+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_CYCLONEDX_XML = 'application/vnd.cyclonedx+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.d2l.coursepackage1p0+zip
     */
    #[Info(name: 'application/vnd.d2l.coursepackage1p0+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_D2L_COURSEPACKAGE1P0_ZIP = 'application/vnd.d2l.coursepackage1p0+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.d3m-dataset
     */
    #[Info(name: 'application/vnd.d3m-dataset', category: Category::APPLICATION)]
    case APPLICATION_VND_D3M_DATASET = 'application/vnd.d3m-dataset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.d3m-problem
     */
    #[Info(name: 'application/vnd.d3m-problem', category: Category::APPLICATION)]
    case APPLICATION_VND_D3M_PROBLEM = 'application/vnd.d3m-problem';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dart
     */
    #[Info(name: 'application/vnd.dart', category: Category::APPLICATION)]
    case APPLICATION_VND_DART = 'application/vnd.dart';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.data-vision.rdz
     */
    #[Info(name: 'application/vnd.data-vision.rdz', category: Category::APPLICATION)]
    case APPLICATION_VND_DATA_VISION_RDZ = 'application/vnd.data-vision.rdz';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.datapackage+json
     */
    #[Info(name: 'application/vnd.datapackage+json', category: Category::APPLICATION)]
    case APPLICATION_VND_DATAPACKAGE_JSON = 'application/vnd.datapackage+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dataresource+json
     */
    #[Info(name: 'application/vnd.dataresource+json', category: Category::APPLICATION)]
    case APPLICATION_VND_DATARESOURCE_JSON = 'application/vnd.dataresource+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dbf
     */
    #[Info(name: 'application/vnd.dbf', category: Category::APPLICATION)]
    case APPLICATION_VND_DBF = 'application/vnd.dbf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.debian.binary-package
     */
    #[Info(name: 'application/vnd.debian.binary-package', category: Category::APPLICATION)]
    case APPLICATION_VND_DEBIAN_BINARY_PACKAGE = 'application/vnd.debian.binary-package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dece.data
     */
    #[Info(name: 'application/vnd.dece.data', category: Category::APPLICATION)]
    case APPLICATION_VND_DECE_DATA = 'application/vnd.dece.data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dece.ttml+xml
     */
    #[Info(name: 'application/vnd.dece.ttml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DECE_TTML_XML = 'application/vnd.dece.ttml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dece.unspecified
     */
    #[Info(name: 'application/vnd.dece.unspecified', category: Category::APPLICATION)]
    case APPLICATION_VND_DECE_UNSPECIFIED = 'application/vnd.dece.unspecified';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dece.zip
     */
    #[Info(name: 'application/vnd.dece.zip', category: Category::APPLICATION)]
    case APPLICATION_VND_DECE_ZIP = 'application/vnd.dece.zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.denovo.fcselayout-link
     */
    #[Info(name: 'application/vnd.denovo.fcselayout-link', category: Category::APPLICATION)]
    case APPLICATION_VND_DENOVO_FCSELAYOUT_LINK = 'application/vnd.denovo.fcselayout-link';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.desmume.movie
     */
    #[Info(name: 'application/vnd.desmume.movie', category: Category::APPLICATION)]
    case APPLICATION_VND_DESMUME_MOVIE = 'application/vnd.desmume.movie';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dir-bi.plate-dl-nosuffix
     */
    #[Info(name: 'application/vnd.dir-bi.plate-dl-nosuffix', category: Category::APPLICATION)]
    case APPLICATION_VND_DIR_BI_PLATE_DL_NOSUFFIX = 'application/vnd.dir-bi.plate-dl-nosuffix';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dm.delegation+xml
     */
    #[Info(name: 'application/vnd.dm.delegation+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DM_DELEGATION_XML = 'application/vnd.dm.delegation+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dna
     */
    #[Info(name: 'application/vnd.dna', category: Category::APPLICATION)]
    case APPLICATION_VND_DNA = 'application/vnd.dna';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.document+json
     */
    #[Info(name: 'application/vnd.document+json', category: Category::APPLICATION)]
    case APPLICATION_VND_DOCUMENT_JSON = 'application/vnd.document+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dolby.mobile.1
     */
    #[Info(name: 'application/vnd.dolby.mobile.1', category: Category::APPLICATION)]
    case APPLICATION_VND_DOLBY_MOBILE_1 = 'application/vnd.dolby.mobile.1';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dolby.mobile.2
     */
    #[Info(name: 'application/vnd.dolby.mobile.2', category: Category::APPLICATION)]
    case APPLICATION_VND_DOLBY_MOBILE_2 = 'application/vnd.dolby.mobile.2';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.doremir.scorecloud-binary-document
     */
    #[Info(name: 'application/vnd.doremir.scorecloud-binary-document', category: Category::APPLICATION)]
    case APPLICATION_VND_DOREMIR_SCORECLOUD_BINARY_DOCUMENT = 'application/vnd.doremir.scorecloud-binary-document';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dpgraph
     */
    #[Info(name: 'application/vnd.dpgraph', category: Category::APPLICATION)]
    case APPLICATION_VND_DPGRAPH = 'application/vnd.dpgraph';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dreamfactory
     */
    #[Info(name: 'application/vnd.dreamfactory', category: Category::APPLICATION)]
    case APPLICATION_VND_DREAMFACTORY = 'application/vnd.dreamfactory';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.drive+json
     */
    #[Info(name: 'application/vnd.drive+json', category: Category::APPLICATION)]
    case APPLICATION_VND_DRIVE_JSON = 'application/vnd.drive+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dtg.local
     */
    #[Info(name: 'application/vnd.dtg.local', category: Category::APPLICATION)]
    case APPLICATION_VND_DTG_LOCAL = 'application/vnd.dtg.local';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dtg.local.flash
     */
    #[Info(name: 'application/vnd.dtg.local.flash', category: Category::APPLICATION)]
    case APPLICATION_VND_DTG_LOCAL_FLASH = 'application/vnd.dtg.local.flash';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dtg.local.html
     */
    #[Info(name: 'application/vnd.dtg.local.html', category: Category::APPLICATION)]
    case APPLICATION_VND_DTG_LOCAL_HTML = 'application/vnd.dtg.local.html';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.ait
     */
    #[Info(name: 'application/vnd.dvb.ait', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_AIT = 'application/vnd.dvb.ait';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.dvbisl+xml
     */
    #[Info(name: 'application/vnd.dvb.dvbisl+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_DVBISL_XML = 'application/vnd.dvb.dvbisl+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.dvbj
     */
    #[Info(name: 'application/vnd.dvb.dvbj', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_DVBJ = 'application/vnd.dvb.dvbj';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.esgcontainer
     */
    #[Info(name: 'application/vnd.dvb.esgcontainer', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_ESGCONTAINER = 'application/vnd.dvb.esgcontainer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.ipdcdftnotifaccess
     */
    #[Info(name: 'application/vnd.dvb.ipdcdftnotifaccess', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPDCDFTNOTIFACCESS = 'application/vnd.dvb.ipdcdftnotifaccess';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.ipdcesgaccess
     */
    #[Info(name: 'application/vnd.dvb.ipdcesgaccess', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPDCESGACCESS = 'application/vnd.dvb.ipdcesgaccess';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.ipdcesgaccess2
     */
    #[Info(name: 'application/vnd.dvb.ipdcesgaccess2', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPDCESGACCESS2 = 'application/vnd.dvb.ipdcesgaccess2';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.ipdcesgpdd
     */
    #[Info(name: 'application/vnd.dvb.ipdcesgpdd', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPDCESGPDD = 'application/vnd.dvb.ipdcesgpdd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.ipdcroaming
     */
    #[Info(name: 'application/vnd.dvb.ipdcroaming', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPDCROAMING = 'application/vnd.dvb.ipdcroaming';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.iptv.alfec-base
     */
    #[Info(name: 'application/vnd.dvb.iptv.alfec-base', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPTV_ALFEC_BASE = 'application/vnd.dvb.iptv.alfec-base';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.iptv.alfec-enhancement
     */
    #[Info(name: 'application/vnd.dvb.iptv.alfec-enhancement', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_IPTV_ALFEC_ENHANCEMENT = 'application/vnd.dvb.iptv.alfec-enhancement';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-aggregate-root+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-aggregate-root+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_AGGREGATE_ROOT_XML = 'application/vnd.dvb.notif-aggregate-root+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-container+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-container+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_CONTAINER_XML = 'application/vnd.dvb.notif-container+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-generic+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-generic+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_GENERIC_XML = 'application/vnd.dvb.notif-generic+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-ia-msglist+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-ia-msglist+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_IA_MSGLIST_XML = 'application/vnd.dvb.notif-ia-msglist+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-ia-registration-request+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-ia-registration-request+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_IA_REGISTRATION_REQUEST_XML = 'application/vnd.dvb.notif-ia-registration-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-ia-registration-response+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-ia-registration-response+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_IA_REGISTRATION_RESPONSE_XML = 'application/vnd.dvb.notif-ia-registration-response+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.notif-init+xml
     */
    #[Info(name: 'application/vnd.dvb.notif-init+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_NOTIF_INIT_XML = 'application/vnd.dvb.notif-init+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.pfr
     */
    #[Info(name: 'application/vnd.dvb.pfr', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_PFR = 'application/vnd.dvb.pfr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dvb.service
     */
    #[Info(name: 'application/vnd.dvb.service', category: Category::APPLICATION)]
    case APPLICATION_VND_DVB_SERVICE = 'application/vnd.dvb.service';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dxr
     */
    #[Info(name: 'application/vnd.dxr', category: Category::APPLICATION)]
    case APPLICATION_VND_DXR = 'application/vnd.dxr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dynageo
     */
    #[Info(name: 'application/vnd.dynageo', category: Category::APPLICATION)]
    case APPLICATION_VND_DYNAGEO = 'application/vnd.dynageo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.dzr
     */
    #[Info(name: 'application/vnd.dzr', category: Category::APPLICATION)]
    case APPLICATION_VND_DZR = 'application/vnd.dzr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.easykaraoke.cdgdownload
     */
    #[Info(name: 'application/vnd.easykaraoke.cdgdownload', category: Category::APPLICATION)]
    case APPLICATION_VND_EASYKARAOKE_CDGDOWNLOAD = 'application/vnd.easykaraoke.cdgdownload';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecip.rlp
     */
    #[Info(name: 'application/vnd.ecip.rlp', category: Category::APPLICATION)]
    case APPLICATION_VND_ECIP_RLP = 'application/vnd.ecip.rlp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecdis-update
     */
    #[Info(name: 'application/vnd.ecdis-update', category: Category::APPLICATION)]
    case APPLICATION_VND_ECDIS_UPDATE = 'application/vnd.ecdis-update';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.eclipse.ditto+json
     */
    #[Info(name: 'application/vnd.eclipse.ditto+json', category: Category::APPLICATION)]
    case APPLICATION_VND_ECLIPSE_DITTO_JSON = 'application/vnd.eclipse.ditto+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecowin.chart
     */
    #[Info(name: 'application/vnd.ecowin.chart', category: Category::APPLICATION)]
    case APPLICATION_VND_ECOWIN_CHART = 'application/vnd.ecowin.chart';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecowin.filerequest
     */
    #[Info(name: 'application/vnd.ecowin.filerequest', category: Category::APPLICATION)]
    case APPLICATION_VND_ECOWIN_FILEREQUEST = 'application/vnd.ecowin.filerequest';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecowin.fileupdate
     */
    #[Info(name: 'application/vnd.ecowin.fileupdate', category: Category::APPLICATION)]
    case APPLICATION_VND_ECOWIN_FILEUPDATE = 'application/vnd.ecowin.fileupdate';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecowin.series
     */
    #[Info(name: 'application/vnd.ecowin.series', category: Category::APPLICATION)]
    case APPLICATION_VND_ECOWIN_SERIES = 'application/vnd.ecowin.series';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecowin.seriesrequest
     */
    #[Info(name: 'application/vnd.ecowin.seriesrequest', category: Category::APPLICATION)]
    case APPLICATION_VND_ECOWIN_SERIESREQUEST = 'application/vnd.ecowin.seriesrequest';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ecowin.seriesupdate
     */
    #[Info(name: 'application/vnd.ecowin.seriesupdate', category: Category::APPLICATION)]
    case APPLICATION_VND_ECOWIN_SERIESUPDATE = 'application/vnd.ecowin.seriesupdate';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.efi.img
     */
    #[Info(name: 'application/vnd.efi.img', category: Category::APPLICATION)]
    case APPLICATION_VND_EFI_IMG = 'application/vnd.efi.img';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.efi.iso
     */
    #[Info(name: 'application/vnd.efi.iso', category: Category::APPLICATION)]
    case APPLICATION_VND_EFI_ISO = 'application/vnd.efi.iso';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.emclient.accessrequest+xml
     */
    #[Info(name: 'application/vnd.emclient.accessrequest+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_EMCLIENT_ACCESSREQUEST_XML = 'application/vnd.emclient.accessrequest+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.enliven
     */
    #[Info(name: 'application/vnd.enliven', category: Category::APPLICATION)]
    case APPLICATION_VND_ENLIVEN = 'application/vnd.enliven';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.enphase.envoy
     */
    #[Info(name: 'application/vnd.enphase.envoy', category: Category::APPLICATION)]
    case APPLICATION_VND_ENPHASE_ENVOY = 'application/vnd.enphase.envoy';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.eprints.data+xml
     */
    #[Info(name: 'application/vnd.eprints.data+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_EPRINTS_DATA_XML = 'application/vnd.eprints.data+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.epson.esf
     */
    #[Info(name: 'application/vnd.epson.esf', category: Category::APPLICATION)]
    case APPLICATION_VND_EPSON_ESF = 'application/vnd.epson.esf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.epson.msf
     */
    #[Info(name: 'application/vnd.epson.msf', category: Category::APPLICATION)]
    case APPLICATION_VND_EPSON_MSF = 'application/vnd.epson.msf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.epson.quickanime
     */
    #[Info(name: 'application/vnd.epson.quickanime', category: Category::APPLICATION)]
    case APPLICATION_VND_EPSON_QUICKANIME = 'application/vnd.epson.quickanime';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.epson.salt
     */
    #[Info(name: 'application/vnd.epson.salt', category: Category::APPLICATION)]
    case APPLICATION_VND_EPSON_SALT = 'application/vnd.epson.salt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.epson.ssf
     */
    #[Info(name: 'application/vnd.epson.ssf', category: Category::APPLICATION)]
    case APPLICATION_VND_EPSON_SSF = 'application/vnd.epson.ssf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ericsson.quickcall
     */
    #[Info(name: 'application/vnd.ericsson.quickcall', category: Category::APPLICATION)]
    case APPLICATION_VND_ERICSSON_QUICKCALL = 'application/vnd.ericsson.quickcall';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.espass-espass+zip
     */
    #[Info(name: 'application/vnd.espass-espass+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_ESPASS_ESPASS_ZIP = 'application/vnd.espass-espass+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.eszigno3+xml
     */
    #[Info(name: 'application/vnd.eszigno3+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ESZIGNO3_XML = 'application/vnd.eszigno3+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.aoc+xml
     */
    #[Info(name: 'application/vnd.etsi.aoc+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_AOC_XML = 'application/vnd.etsi.aoc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.asic-s+zip
     */
    #[Info(name: 'application/vnd.etsi.asic-s+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_ASIC_S_ZIP = 'application/vnd.etsi.asic-s+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.asic-e+zip
     */
    #[Info(name: 'application/vnd.etsi.asic-e+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_ASIC_E_ZIP = 'application/vnd.etsi.asic-e+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.cug+xml
     */
    #[Info(name: 'application/vnd.etsi.cug+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_CUG_XML = 'application/vnd.etsi.cug+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvcommand+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvcommand+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVCOMMAND_XML = 'application/vnd.etsi.iptvcommand+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvdiscovery+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvdiscovery+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVDISCOVERY_XML = 'application/vnd.etsi.iptvdiscovery+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvprofile+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvprofile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVPROFILE_XML = 'application/vnd.etsi.iptvprofile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvsad-bc+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvsad-bc+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVSAD_BC_XML = 'application/vnd.etsi.iptvsad-bc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvsad-cod+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvsad-cod+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVSAD_COD_XML = 'application/vnd.etsi.iptvsad-cod+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvsad-npvr+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvsad-npvr+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVSAD_NPVR_XML = 'application/vnd.etsi.iptvsad-npvr+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvservice+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvservice+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVSERVICE_XML = 'application/vnd.etsi.iptvservice+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvsync+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvsync+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVSYNC_XML = 'application/vnd.etsi.iptvsync+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.iptvueprofile+xml
     */
    #[Info(name: 'application/vnd.etsi.iptvueprofile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_IPTVUEPROFILE_XML = 'application/vnd.etsi.iptvueprofile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.mcid+xml
     */
    #[Info(name: 'application/vnd.etsi.mcid+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_MCID_XML = 'application/vnd.etsi.mcid+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.mheg5
     */
    #[Info(name: 'application/vnd.etsi.mheg5', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_MHEG5 = 'application/vnd.etsi.mheg5';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.overload-control-policy-dataset+xml
     */
    #[Info(name: 'application/vnd.etsi.overload-control-policy-dataset+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_OVERLOAD_CONTROL_POLICY_DATASET_XML = 'application/vnd.etsi.overload-control-policy-dataset+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.pstn+xml
     */
    #[Info(name: 'application/vnd.etsi.pstn+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_PSTN_XML = 'application/vnd.etsi.pstn+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.sci+xml
     */
    #[Info(name: 'application/vnd.etsi.sci+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_SCI_XML = 'application/vnd.etsi.sci+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.simservs+xml
     */
    #[Info(name: 'application/vnd.etsi.simservs+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_SIMSERVS_XML = 'application/vnd.etsi.simservs+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.timestamp-token
     */
    #[Info(name: 'application/vnd.etsi.timestamp-token', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_TIMESTAMP_TOKEN = 'application/vnd.etsi.timestamp-token';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.tsl+xml
     */
    #[Info(name: 'application/vnd.etsi.tsl+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_TSL_XML = 'application/vnd.etsi.tsl+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.etsi.tsl.der
     */
    #[Info(name: 'application/vnd.etsi.tsl.der', category: Category::APPLICATION)]
    case APPLICATION_VND_ETSI_TSL_DER = 'application/vnd.etsi.tsl.der';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.eu.kasparian.car+json
     */
    #[Info(name: 'application/vnd.eu.kasparian.car+json', category: Category::APPLICATION)]
    case APPLICATION_VND_EU_KASPARIAN_CAR_JSON = 'application/vnd.eu.kasparian.car+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.eudora.data
     */
    #[Info(name: 'application/vnd.eudora.data', category: Category::APPLICATION)]
    case APPLICATION_VND_EUDORA_DATA = 'application/vnd.eudora.data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.evolv.ecig.profile
     */
    #[Info(name: 'application/vnd.evolv.ecig.profile', category: Category::APPLICATION)]
    case APPLICATION_VND_EVOLV_ECIG_PROFILE = 'application/vnd.evolv.ecig.profile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.evolv.ecig.settings
     */
    #[Info(name: 'application/vnd.evolv.ecig.settings', category: Category::APPLICATION)]
    case APPLICATION_VND_EVOLV_ECIG_SETTINGS = 'application/vnd.evolv.ecig.settings';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.evolv.ecig.theme
     */
    #[Info(name: 'application/vnd.evolv.ecig.theme', category: Category::APPLICATION)]
    case APPLICATION_VND_EVOLV_ECIG_THEME = 'application/vnd.evolv.ecig.theme';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.exstream-empower+zip
     */
    #[Info(name: 'application/vnd.exstream-empower+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_EXSTREAM_EMPOWER_ZIP = 'application/vnd.exstream-empower+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.exstream-package
     */
    #[Info(name: 'application/vnd.exstream-package', category: Category::APPLICATION)]
    case APPLICATION_VND_EXSTREAM_PACKAGE = 'application/vnd.exstream-package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ezpix-album
     */
    #[Info(name: 'application/vnd.ezpix-album', category: Category::APPLICATION)]
    case APPLICATION_VND_EZPIX_ALBUM = 'application/vnd.ezpix-album';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ezpix-package
     */
    #[Info(name: 'application/vnd.ezpix-package', category: Category::APPLICATION)]
    case APPLICATION_VND_EZPIX_PACKAGE = 'application/vnd.ezpix-package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.f-secure.mobile
     */
    #[Info(name: 'application/vnd.f-secure.mobile', category: Category::APPLICATION)]
    case APPLICATION_VND_F_SECURE_MOBILE = 'application/vnd.f-secure.mobile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fastcopy-disk-image
     */
    #[Info(name: 'application/vnd.fastcopy-disk-image', category: Category::APPLICATION)]
    case APPLICATION_VND_FASTCOPY_DISK_IMAGE = 'application/vnd.fastcopy-disk-image';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.familysearch.gedcom+zip
     */
    #[Info(name: 'application/vnd.familysearch.gedcom+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_FAMILYSEARCH_GEDCOM_ZIP = 'application/vnd.familysearch.gedcom+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fdsn.mseed
     */
    #[Info(name: 'application/vnd.fdsn.mseed', category: Category::APPLICATION)]
    case APPLICATION_VND_FDSN_MSEED = 'application/vnd.fdsn.mseed';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fdsn.seed
     */
    #[Info(name: 'application/vnd.fdsn.seed', category: Category::APPLICATION)]
    case APPLICATION_VND_FDSN_SEED = 'application/vnd.fdsn.seed';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ffsns
     */
    #[Info(name: 'application/vnd.ffsns', category: Category::APPLICATION)]
    case APPLICATION_VND_FFSNS = 'application/vnd.ffsns';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ficlab.flb+zip
     */
    #[Info(name: 'application/vnd.ficlab.flb+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_FICLAB_FLB_ZIP = 'application/vnd.ficlab.flb+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.filmit.zfc
     */
    #[Info(name: 'application/vnd.filmit.zfc', category: Category::APPLICATION)]
    case APPLICATION_VND_FILMIT_ZFC = 'application/vnd.filmit.zfc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fints
     */
    #[Info(name: 'application/vnd.fints', category: Category::APPLICATION)]
    case APPLICATION_VND_FINTS = 'application/vnd.fints';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.firemonkeys.cloudcell
     */
    #[Info(name: 'application/vnd.firemonkeys.cloudcell', category: Category::APPLICATION)]
    case APPLICATION_VND_FIREMONKEYS_CLOUDCELL = 'application/vnd.firemonkeys.cloudcell';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.FloGraphIt
     */
    #[Info(name: 'application/vnd.FloGraphIt', category: Category::APPLICATION)]
    case APPLICATION_VND_FLOGRAPHIT = 'application/vnd.flographit';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fluxtime.clip
     */
    #[Info(name: 'application/vnd.fluxtime.clip', category: Category::APPLICATION)]
    case APPLICATION_VND_FLUXTIME_CLIP = 'application/vnd.fluxtime.clip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.font-fontforge-sfd
     */
    #[Info(name: 'application/vnd.font-fontforge-sfd', category: Category::APPLICATION)]
    case APPLICATION_VND_FONT_FONTFORGE_SFD = 'application/vnd.font-fontforge-sfd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.framemaker
     */
    #[Info(name: 'application/vnd.framemaker', category: Category::APPLICATION)]
    case APPLICATION_VND_FRAMEMAKER = 'application/vnd.framemaker';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.frogans.fnc
     */
    #[Info(name: 'application/vnd.frogans.fnc', category: Category::APPLICATION)]
    case APPLICATION_VND_FROGANS_FNC = 'application/vnd.frogans.fnc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.frogans.ltf
     */
    #[Info(name: 'application/vnd.frogans.ltf', category: Category::APPLICATION)]
    case APPLICATION_VND_FROGANS_LTF = 'application/vnd.frogans.ltf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fsc.weblaunch
     */
    #[Info(name: 'application/vnd.fsc.weblaunch', category: Category::APPLICATION)]
    case APPLICATION_VND_FSC_WEBLAUNCH = 'application/vnd.fsc.weblaunch';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujifilm.fb.docuworks
     */
    #[Info(name: 'application/vnd.fujifilm.fb.docuworks', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIFILM_FB_DOCUWORKS = 'application/vnd.fujifilm.fb.docuworks';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujifilm.fb.docuworks.binder
     */
    #[Info(name: 'application/vnd.fujifilm.fb.docuworks.binder', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIFILM_FB_DOCUWORKS_BINDER = 'application/vnd.fujifilm.fb.docuworks.binder';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujifilm.fb.docuworks.container
     */
    #[Info(name: 'application/vnd.fujifilm.fb.docuworks.container', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIFILM_FB_DOCUWORKS_CONTAINER = 'application/vnd.fujifilm.fb.docuworks.container';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujifilm.fb.jfi+xml
     */
    #[Info(name: 'application/vnd.fujifilm.fb.jfi+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIFILM_FB_JFI_XML = 'application/vnd.fujifilm.fb.jfi+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujitsu.oasys
     */
    #[Info(name: 'application/vnd.fujitsu.oasys', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJITSU_OASYS = 'application/vnd.fujitsu.oasys';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujitsu.oasys2
     */
    #[Info(name: 'application/vnd.fujitsu.oasys2', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJITSU_OASYS2 = 'application/vnd.fujitsu.oasys2';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujitsu.oasys3
     */
    #[Info(name: 'application/vnd.fujitsu.oasys3', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJITSU_OASYS3 = 'application/vnd.fujitsu.oasys3';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujitsu.oasysgp
     */
    #[Info(name: 'application/vnd.fujitsu.oasysgp', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJITSU_OASYSGP = 'application/vnd.fujitsu.oasysgp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujitsu.oasysprs
     */
    #[Info(name: 'application/vnd.fujitsu.oasysprs', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJITSU_OASYSPRS = 'application/vnd.fujitsu.oasysprs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.ART4
     */
    #[Info(name: 'application/vnd.fujixerox.ART4', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_ART4 = 'application/vnd.fujixerox.art4';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.ART-EX
     */
    #[Info(name: 'application/vnd.fujixerox.ART-EX', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_ART_EX = 'application/vnd.fujixerox.art-ex';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.ddd
     */
    #[Info(name: 'application/vnd.fujixerox.ddd', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_DDD = 'application/vnd.fujixerox.ddd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.docuworks
     */
    #[Info(name: 'application/vnd.fujixerox.docuworks', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_DOCUWORKS = 'application/vnd.fujixerox.docuworks';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.docuworks.binder
     */
    #[Info(name: 'application/vnd.fujixerox.docuworks.binder', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_DOCUWORKS_BINDER = 'application/vnd.fujixerox.docuworks.binder';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.docuworks.container
     */
    #[Info(name: 'application/vnd.fujixerox.docuworks.container', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_DOCUWORKS_CONTAINER = 'application/vnd.fujixerox.docuworks.container';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fujixerox.HBPL
     */
    #[Info(name: 'application/vnd.fujixerox.HBPL', category: Category::APPLICATION)]
    case APPLICATION_VND_FUJIXEROX_HBPL = 'application/vnd.fujixerox.hbpl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fut-misnet
     */
    #[Info(name: 'application/vnd.fut-misnet', category: Category::APPLICATION)]
    case APPLICATION_VND_FUT_MISNET = 'application/vnd.fut-misnet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.futoin+cbor
     */
    #[Info(name: 'application/vnd.futoin+cbor', category: Category::APPLICATION)]
    case APPLICATION_VND_FUTOIN_CBOR = 'application/vnd.futoin+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.futoin+json
     */
    #[Info(name: 'application/vnd.futoin+json', category: Category::APPLICATION)]
    case APPLICATION_VND_FUTOIN_JSON = 'application/vnd.futoin+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.fuzzysheet
     */
    #[Info(name: 'application/vnd.fuzzysheet', category: Category::APPLICATION)]
    case APPLICATION_VND_FUZZYSHEET = 'application/vnd.fuzzysheet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.genomatix.tuxedo
     */
    #[Info(name: 'application/vnd.genomatix.tuxedo', category: Category::APPLICATION)]
    case APPLICATION_VND_GENOMATIX_TUXEDO = 'application/vnd.genomatix.tuxedo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.genozip
     */
    #[Info(name: 'application/vnd.genozip', category: Category::APPLICATION)]
    case APPLICATION_VND_GENOZIP = 'application/vnd.genozip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gentics.grd+json
     */
    #[Info(name: 'application/vnd.gentics.grd+json', category: Category::APPLICATION)]
    case APPLICATION_VND_GENTICS_GRD_JSON = 'application/vnd.gentics.grd+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geo+json
     */
    #[Info(name: 'application/vnd.geo+json', category: Category::APPLICATION)]
    case APPLICATION_VND_GEO_JSON = 'application/vnd.geo+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geocube+xml
     */
    #[Info(name: 'application/vnd.geocube+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOCUBE_XML = 'application/vnd.geocube+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geogebra.file
     */
    #[Info(name: 'application/vnd.geogebra.file', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOGEBRA_FILE = 'application/vnd.geogebra.file';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geogebra.slides
     */
    #[Info(name: 'application/vnd.geogebra.slides', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOGEBRA_SLIDES = 'application/vnd.geogebra.slides';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geogebra.tool
     */
    #[Info(name: 'application/vnd.geogebra.tool', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOGEBRA_TOOL = 'application/vnd.geogebra.tool';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geometry-explorer
     */
    #[Info(name: 'application/vnd.geometry-explorer', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOMETRY_EXPLORER = 'application/vnd.geometry-explorer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geonext
     */
    #[Info(name: 'application/vnd.geonext', category: Category::APPLICATION)]
    case APPLICATION_VND_GEONEXT = 'application/vnd.geonext';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geoplan
     */
    #[Info(name: 'application/vnd.geoplan', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOPLAN = 'application/vnd.geoplan';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.geospace
     */
    #[Info(name: 'application/vnd.geospace', category: Category::APPLICATION)]
    case APPLICATION_VND_GEOSPACE = 'application/vnd.geospace';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gerber
     */
    #[Info(name: 'application/vnd.gerber', category: Category::APPLICATION)]
    case APPLICATION_VND_GERBER = 'application/vnd.gerber';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.globalplatform.card-content-mgt
     */
    #[Info(name: 'application/vnd.globalplatform.card-content-mgt', category: Category::APPLICATION)]
    case APPLICATION_VND_GLOBALPLATFORM_CARD_CONTENT_MGT = 'application/vnd.globalplatform.card-content-mgt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.globalplatform.card-content-mgt-response
     */
    #[Info(name: 'application/vnd.globalplatform.card-content-mgt-response', category: Category::APPLICATION)]
    case APPLICATION_VND_GLOBALPLATFORM_CARD_CONTENT_MGT_RESPONSE = 'application/vnd.globalplatform.card-content-mgt-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gmx
     */
    #[Info(name: 'application/vnd.gmx', category: Category::APPLICATION)]
    case APPLICATION_VND_GMX = 'application/vnd.gmx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gnu.taler.exchange+json
     */
    #[Info(name: 'application/vnd.gnu.taler.exchange+json', category: Category::APPLICATION)]
    case APPLICATION_VND_GNU_TALER_EXCHANGE_JSON = 'application/vnd.gnu.taler.exchange+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gnu.taler.merchant+json
     */
    #[Info(name: 'application/vnd.gnu.taler.merchant+json', category: Category::APPLICATION)]
    case APPLICATION_VND_GNU_TALER_MERCHANT_JSON = 'application/vnd.gnu.taler.merchant+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.google-earth.kml+xml
     */
    #[Info(name: 'application/vnd.google-earth.kml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_GOOGLE_EARTH_KML_XML = 'application/vnd.google-earth.kml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.google-earth.kmz
     */
    #[Info(name: 'application/vnd.google-earth.kmz', category: Category::APPLICATION)]
    case APPLICATION_VND_GOOGLE_EARTH_KMZ = 'application/vnd.google-earth.kmz';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gov.sk.e-form+xml
     */
    #[Info(name: 'application/vnd.gov.sk.e-form+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_GOV_SK_E_FORM_XML = 'application/vnd.gov.sk.e-form+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gov.sk.e-form+zip
     */
    #[Info(name: 'application/vnd.gov.sk.e-form+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_GOV_SK_E_FORM_ZIP = 'application/vnd.gov.sk.e-form+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gov.sk.xmldatacontainer+xml
     */
    #[Info(name: 'application/vnd.gov.sk.xmldatacontainer+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_GOV_SK_XMLDATACONTAINER_XML = 'application/vnd.gov.sk.xmldatacontainer+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.grafeq
     */
    #[Info(name: 'application/vnd.grafeq', category: Category::APPLICATION)]
    case APPLICATION_VND_GRAFEQ = 'application/vnd.grafeq';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.gridmp
     */
    #[Info(name: 'application/vnd.gridmp', category: Category::APPLICATION)]
    case APPLICATION_VND_GRIDMP = 'application/vnd.gridmp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-account
     */
    #[Info(name: 'application/vnd.groove-account', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_ACCOUNT = 'application/vnd.groove-account';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-help
     */
    #[Info(name: 'application/vnd.groove-help', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_HELP = 'application/vnd.groove-help';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-identity-message
     */
    #[Info(name: 'application/vnd.groove-identity-message', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_IDENTITY_MESSAGE = 'application/vnd.groove-identity-message';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-injector
     */
    #[Info(name: 'application/vnd.groove-injector', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_INJECTOR = 'application/vnd.groove-injector';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-tool-message
     */
    #[Info(name: 'application/vnd.groove-tool-message', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_TOOL_MESSAGE = 'application/vnd.groove-tool-message';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-tool-template
     */
    #[Info(name: 'application/vnd.groove-tool-template', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_TOOL_TEMPLATE = 'application/vnd.groove-tool-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.groove-vcard
     */
    #[Info(name: 'application/vnd.groove-vcard', category: Category::APPLICATION)]
    case APPLICATION_VND_GROOVE_VCARD = 'application/vnd.groove-vcard';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hal+json
     */
    #[Info(name: 'application/vnd.hal+json', category: Category::APPLICATION)]
    case APPLICATION_VND_HAL_JSON = 'application/vnd.hal+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hal+xml
     */
    #[Info(name: 'application/vnd.hal+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_HAL_XML = 'application/vnd.hal+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.HandHeld-Entertainment+xml
     */
    #[Info(name: 'application/vnd.HandHeld-Entertainment+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_HANDHELD_ENTERTAINMENT_XML = 'application/vnd.handheld-entertainment+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hbci
     */
    #[Info(name: 'application/vnd.hbci', category: Category::APPLICATION)]
    case APPLICATION_VND_HBCI = 'application/vnd.hbci';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hc+json
     */
    #[Info(name: 'application/vnd.hc+json', category: Category::APPLICATION)]
    case APPLICATION_VND_HC_JSON = 'application/vnd.hc+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hcl-bireports
     */
    #[Info(name: 'application/vnd.hcl-bireports', category: Category::APPLICATION)]
    case APPLICATION_VND_HCL_BIREPORTS = 'application/vnd.hcl-bireports';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hdt
     */
    #[Info(name: 'application/vnd.hdt', category: Category::APPLICATION)]
    case APPLICATION_VND_HDT = 'application/vnd.hdt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.heroku+json
     */
    #[Info(name: 'application/vnd.heroku+json', category: Category::APPLICATION)]
    case APPLICATION_VND_HEROKU_JSON = 'application/vnd.heroku+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hhe.lesson-player
     */
    #[Info(name: 'application/vnd.hhe.lesson-player', category: Category::APPLICATION)]
    case APPLICATION_VND_HHE_LESSON_PLAYER = 'application/vnd.hhe.lesson-player';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hp-HPGL
     */
    #[Info(name: 'application/vnd.hp-HPGL', category: Category::APPLICATION)]
    case APPLICATION_VND_HP_HPGL = 'application/vnd.hp-hpgl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hp-hpid
     */
    #[Info(name: 'application/vnd.hp-hpid', category: Category::APPLICATION)]
    case APPLICATION_VND_HP_HPID = 'application/vnd.hp-hpid';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hp-hps
     */
    #[Info(name: 'application/vnd.hp-hps', category: Category::APPLICATION)]
    case APPLICATION_VND_HP_HPS = 'application/vnd.hp-hps';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hp-jlyt
     */
    #[Info(name: 'application/vnd.hp-jlyt', category: Category::APPLICATION)]
    case APPLICATION_VND_HP_JLYT = 'application/vnd.hp-jlyt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hp-PCL
     */
    #[Info(name: 'application/vnd.hp-PCL', category: Category::APPLICATION)]
    case APPLICATION_VND_HP_PCL = 'application/vnd.hp-pcl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hp-PCLXL
     */
    #[Info(name: 'application/vnd.hp-PCLXL', category: Category::APPLICATION)]
    case APPLICATION_VND_HP_PCLXL = 'application/vnd.hp-pclxl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.httphone
     */
    #[Info(name: 'application/vnd.httphone', category: Category::APPLICATION)]
    case APPLICATION_VND_HTTPHONE = 'application/vnd.httphone';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hydrostatix.sof-data
     */
    #[Info(name: 'application/vnd.hydrostatix.sof-data', category: Category::APPLICATION)]
    case APPLICATION_VND_HYDROSTATIX_SOF_DATA = 'application/vnd.hydrostatix.sof-data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hyper-item+json
     */
    #[Info(name: 'application/vnd.hyper-item+json', category: Category::APPLICATION)]
    case APPLICATION_VND_HYPER_ITEM_JSON = 'application/vnd.hyper-item+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hyper+json
     */
    #[Info(name: 'application/vnd.hyper+json', category: Category::APPLICATION)]
    case APPLICATION_VND_HYPER_JSON = 'application/vnd.hyper+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hyperdrive+json
     */
    #[Info(name: 'application/vnd.hyperdrive+json', category: Category::APPLICATION)]
    case APPLICATION_VND_HYPERDRIVE_JSON = 'application/vnd.hyperdrive+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.hzn-3d-crossword
     */
    #[Info(name: 'application/vnd.hzn-3d-crossword', category: Category::APPLICATION)]
    case APPLICATION_VND_HZN_3D_CROSSWORD = 'application/vnd.hzn-3d-crossword';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ibm.afplinedata
     */
    #[Info(name: 'application/vnd.ibm.afplinedata', category: Category::APPLICATION)]
    case APPLICATION_VND_IBM_AFPLINEDATA = 'application/vnd.ibm.afplinedata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ibm.electronic-media
     */
    #[Info(name: 'application/vnd.ibm.electronic-media', category: Category::APPLICATION)]
    case APPLICATION_VND_IBM_ELECTRONIC_MEDIA = 'application/vnd.ibm.electronic-media';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ibm.MiniPay
     */
    #[Info(name: 'application/vnd.ibm.MiniPay', category: Category::APPLICATION)]
    case APPLICATION_VND_IBM_MINIPAY = 'application/vnd.ibm.minipay';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ibm.modcap
     */
    #[Info(name: 'application/vnd.ibm.modcap', category: Category::APPLICATION)]
    case APPLICATION_VND_IBM_MODCAP = 'application/vnd.ibm.modcap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ibm.rights-management
     */
    #[Info(name: 'application/vnd.ibm.rights-management', category: Category::APPLICATION)]
    case APPLICATION_VND_IBM_RIGHTS_MANAGEMENT = 'application/vnd.ibm.rights-management';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ibm.secure-container
     */
    #[Info(name: 'application/vnd.ibm.secure-container', category: Category::APPLICATION)]
    case APPLICATION_VND_IBM_SECURE_CONTAINER = 'application/vnd.ibm.secure-container';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iccprofile
     */
    #[Info(name: 'application/vnd.iccprofile', category: Category::APPLICATION)]
    case APPLICATION_VND_ICCPROFILE = 'application/vnd.iccprofile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ieee.1905
     */
    #[Info(name: 'application/vnd.ieee.1905', category: Category::APPLICATION)]
    case APPLICATION_VND_IEEE_1905 = 'application/vnd.ieee.1905';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.igloader
     */
    #[Info(name: 'application/vnd.igloader', category: Category::APPLICATION)]
    case APPLICATION_VND_IGLOADER = 'application/vnd.igloader';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.imagemeter.folder+zip
     */
    #[Info(name: 'application/vnd.imagemeter.folder+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_IMAGEMETER_FOLDER_ZIP = 'application/vnd.imagemeter.folder+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.imagemeter.image+zip
     */
    #[Info(name: 'application/vnd.imagemeter.image+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_IMAGEMETER_IMAGE_ZIP = 'application/vnd.imagemeter.image+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.immervision-ivp
     */
    #[Info(name: 'application/vnd.immervision-ivp', category: Category::APPLICATION)]
    case APPLICATION_VND_IMMERVISION_IVP = 'application/vnd.immervision-ivp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.immervision-ivu
     */
    #[Info(name: 'application/vnd.immervision-ivu', category: Category::APPLICATION)]
    case APPLICATION_VND_IMMERVISION_IVU = 'application/vnd.immervision-ivu';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.imsccv1p1
     */
    #[Info(name: 'application/vnd.ims.imsccv1p1', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_IMSCCV1P1 = 'application/vnd.ims.imsccv1p1';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.imsccv1p2
     */
    #[Info(name: 'application/vnd.ims.imsccv1p2', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_IMSCCV1P2 = 'application/vnd.ims.imsccv1p2';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.imsccv1p3
     */
    #[Info(name: 'application/vnd.ims.imsccv1p3', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_IMSCCV1P3 = 'application/vnd.ims.imsccv1p3';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.lis.v2.result+json
     */
    #[Info(name: 'application/vnd.ims.lis.v2.result+json', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_LIS_V2_RESULT_JSON = 'application/vnd.ims.lis.v2.result+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.lti.v2.toolconsumerprofile+json
     */
    #[Info(name: 'application/vnd.ims.lti.v2.toolconsumerprofile+json', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_LTI_V2_TOOLCONSUMERPROFILE_JSON = 'application/vnd.ims.lti.v2.toolconsumerprofile+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.lti.v2.toolproxy.id+json
     */
    #[Info(name: 'application/vnd.ims.lti.v2.toolproxy.id+json', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_LTI_V2_TOOLPROXY_ID_JSON = 'application/vnd.ims.lti.v2.toolproxy.id+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.lti.v2.toolproxy+json
     */
    #[Info(name: 'application/vnd.ims.lti.v2.toolproxy+json', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_LTI_V2_TOOLPROXY_JSON = 'application/vnd.ims.lti.v2.toolproxy+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.lti.v2.toolsettings+json
     */
    #[Info(name: 'application/vnd.ims.lti.v2.toolsettings+json', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_LTI_V2_TOOLSETTINGS_JSON = 'application/vnd.ims.lti.v2.toolsettings+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ims.lti.v2.toolsettings.simple+json
     */
    #[Info(name: 'application/vnd.ims.lti.v2.toolsettings.simple+json', category: Category::APPLICATION)]
    case APPLICATION_VND_IMS_LTI_V2_TOOLSETTINGS_SIMPLE_JSON = 'application/vnd.ims.lti.v2.toolsettings.simple+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.informedcontrol.rms+xml
     */
    #[Info(name: 'application/vnd.informedcontrol.rms+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_INFORMEDCONTROL_RMS_XML = 'application/vnd.informedcontrol.rms+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.infotech.project
     */
    #[Info(name: 'application/vnd.infotech.project', category: Category::APPLICATION)]
    case APPLICATION_VND_INFOTECH_PROJECT = 'application/vnd.infotech.project';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.infotech.project+xml
     */
    #[Info(name: 'application/vnd.infotech.project+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_INFOTECH_PROJECT_XML = 'application/vnd.infotech.project+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.informix-visionary
     */
    #[Info(name: 'application/vnd.informix-visionary', category: Category::APPLICATION)]
    case APPLICATION_VND_INFORMIX_VISIONARY = 'application/vnd.informix-visionary';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.innopath.wamp.notification
     */
    #[Info(name: 'application/vnd.innopath.wamp.notification', category: Category::APPLICATION)]
    case APPLICATION_VND_INNOPATH_WAMP_NOTIFICATION = 'application/vnd.innopath.wamp.notification';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.insors.igm
     */
    #[Info(name: 'application/vnd.insors.igm', category: Category::APPLICATION)]
    case APPLICATION_VND_INSORS_IGM = 'application/vnd.insors.igm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.intercon.formnet
     */
    #[Info(name: 'application/vnd.intercon.formnet', category: Category::APPLICATION)]
    case APPLICATION_VND_INTERCON_FORMNET = 'application/vnd.intercon.formnet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.intergeo
     */
    #[Info(name: 'application/vnd.intergeo', category: Category::APPLICATION)]
    case APPLICATION_VND_INTERGEO = 'application/vnd.intergeo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.intertrust.digibox
     */
    #[Info(name: 'application/vnd.intertrust.digibox', category: Category::APPLICATION)]
    case APPLICATION_VND_INTERTRUST_DIGIBOX = 'application/vnd.intertrust.digibox';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.intertrust.nncp
     */
    #[Info(name: 'application/vnd.intertrust.nncp', category: Category::APPLICATION)]
    case APPLICATION_VND_INTERTRUST_NNCP = 'application/vnd.intertrust.nncp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.intu.qbo
     */
    #[Info(name: 'application/vnd.intu.qbo', category: Category::APPLICATION)]
    case APPLICATION_VND_INTU_QBO = 'application/vnd.intu.qbo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.intu.qfx
     */
    #[Info(name: 'application/vnd.intu.qfx', category: Category::APPLICATION)]
    case APPLICATION_VND_INTU_QFX = 'application/vnd.intu.qfx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ipld.car
     */
    #[Info(name: 'application/vnd.ipld.car', category: Category::APPLICATION)]
    case APPLICATION_VND_IPLD_CAR = 'application/vnd.ipld.car';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ipld.raw
     */
    #[Info(name: 'application/vnd.ipld.raw', category: Category::APPLICATION)]
    case APPLICATION_VND_IPLD_RAW = 'application/vnd.ipld.raw';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.catalogitem+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.catalogitem+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_CATALOGITEM_XML = 'application/vnd.iptc.g2.catalogitem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.conceptitem+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.conceptitem+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_CONCEPTITEM_XML = 'application/vnd.iptc.g2.conceptitem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.knowledgeitem+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.knowledgeitem+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_KNOWLEDGEITEM_XML = 'application/vnd.iptc.g2.knowledgeitem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.newsitem+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.newsitem+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_NEWSITEM_XML = 'application/vnd.iptc.g2.newsitem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.newsmessage+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.newsmessage+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_NEWSMESSAGE_XML = 'application/vnd.iptc.g2.newsmessage+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.packageitem+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.packageitem+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_PACKAGEITEM_XML = 'application/vnd.iptc.g2.packageitem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iptc.g2.planningitem+xml
     */
    #[Info(name: 'application/vnd.iptc.g2.planningitem+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IPTC_G2_PLANNINGITEM_XML = 'application/vnd.iptc.g2.planningitem+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ipunplugged.rcprofile
     */
    #[Info(name: 'application/vnd.ipunplugged.rcprofile', category: Category::APPLICATION)]
    case APPLICATION_VND_IPUNPLUGGED_RCPROFILE = 'application/vnd.ipunplugged.rcprofile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.irepository.package+xml
     */
    #[Info(name: 'application/vnd.irepository.package+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_IREPOSITORY_PACKAGE_XML = 'application/vnd.irepository.package+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.is-xpr
     */
    #[Info(name: 'application/vnd.is-xpr', category: Category::APPLICATION)]
    case APPLICATION_VND_IS_XPR = 'application/vnd.is-xpr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.isac.fcs
     */
    #[Info(name: 'application/vnd.isac.fcs', category: Category::APPLICATION)]
    case APPLICATION_VND_ISAC_FCS = 'application/vnd.isac.fcs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.jam
     */
    #[Info(name: 'application/vnd.jam', category: Category::APPLICATION)]
    case APPLICATION_VND_JAM = 'application/vnd.jam';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.iso11783-10+zip
     */
    #[Info(name: 'application/vnd.iso11783-10+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_ISO11783_10_ZIP = 'application/vnd.iso11783-10+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-directory-service
     */
    #[Info(name: 'application/vnd.japannet-directory-service', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_DIRECTORY_SERVICE = 'application/vnd.japannet-directory-service';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-jpnstore-wakeup
     */
    #[Info(name: 'application/vnd.japannet-jpnstore-wakeup', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_JPNSTORE_WAKEUP = 'application/vnd.japannet-jpnstore-wakeup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-payment-wakeup
     */
    #[Info(name: 'application/vnd.japannet-payment-wakeup', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_PAYMENT_WAKEUP = 'application/vnd.japannet-payment-wakeup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-registration
     */
    #[Info(name: 'application/vnd.japannet-registration', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_REGISTRATION = 'application/vnd.japannet-registration';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-registration-wakeup
     */
    #[Info(name: 'application/vnd.japannet-registration-wakeup', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_REGISTRATION_WAKEUP = 'application/vnd.japannet-registration-wakeup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-setstore-wakeup
     */
    #[Info(name: 'application/vnd.japannet-setstore-wakeup', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_SETSTORE_WAKEUP = 'application/vnd.japannet-setstore-wakeup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-verification
     */
    #[Info(name: 'application/vnd.japannet-verification', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_VERIFICATION = 'application/vnd.japannet-verification';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.japannet-verification-wakeup
     */
    #[Info(name: 'application/vnd.japannet-verification-wakeup', category: Category::APPLICATION)]
    case APPLICATION_VND_JAPANNET_VERIFICATION_WAKEUP = 'application/vnd.japannet-verification-wakeup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.jcp.javame.midlet-rms
     */
    #[Info(name: 'application/vnd.jcp.javame.midlet-rms', category: Category::APPLICATION)]
    case APPLICATION_VND_JCP_JAVAME_MIDLET_RMS = 'application/vnd.jcp.javame.midlet-rms';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.jisp
     */
    #[Info(name: 'application/vnd.jisp', category: Category::APPLICATION)]
    case APPLICATION_VND_JISP = 'application/vnd.jisp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.joost.joda-archive
     */
    #[Info(name: 'application/vnd.joost.joda-archive', category: Category::APPLICATION)]
    case APPLICATION_VND_JOOST_JODA_ARCHIVE = 'application/vnd.joost.joda-archive';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.jsk.isdn-ngn
     */
    #[Info(name: 'application/vnd.jsk.isdn-ngn', category: Category::APPLICATION)]
    case APPLICATION_VND_JSK_ISDN_NGN = 'application/vnd.jsk.isdn-ngn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kahootz
     */
    #[Info(name: 'application/vnd.kahootz', category: Category::APPLICATION)]
    case APPLICATION_VND_KAHOOTZ = 'application/vnd.kahootz';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.karbon
     */
    #[Info(name: 'application/vnd.kde.karbon', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KARBON = 'application/vnd.kde.karbon';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kchart
     */
    #[Info(name: 'application/vnd.kde.kchart', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KCHART = 'application/vnd.kde.kchart';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kformula
     */
    #[Info(name: 'application/vnd.kde.kformula', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KFORMULA = 'application/vnd.kde.kformula';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kivio
     */
    #[Info(name: 'application/vnd.kde.kivio', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KIVIO = 'application/vnd.kde.kivio';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kontour
     */
    #[Info(name: 'application/vnd.kde.kontour', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KONTOUR = 'application/vnd.kde.kontour';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kpresenter
     */
    #[Info(name: 'application/vnd.kde.kpresenter', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KPRESENTER = 'application/vnd.kde.kpresenter';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kspread
     */
    #[Info(name: 'application/vnd.kde.kspread', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KSPREAD = 'application/vnd.kde.kspread';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kde.kword
     */
    #[Info(name: 'application/vnd.kde.kword', category: Category::APPLICATION)]
    case APPLICATION_VND_KDE_KWORD = 'application/vnd.kde.kword';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kenameaapp
     */
    #[Info(name: 'application/vnd.kenameaapp', category: Category::APPLICATION)]
    case APPLICATION_VND_KENAMEAAPP = 'application/vnd.kenameaapp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kidspiration
     */
    #[Info(name: 'application/vnd.kidspiration', category: Category::APPLICATION)]
    case APPLICATION_VND_KIDSPIRATION = 'application/vnd.kidspiration';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Kinar
     */
    #[Info(name: 'application/vnd.Kinar', category: Category::APPLICATION)]
    case APPLICATION_VND_KINAR = 'application/vnd.kinar';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.koan
     */
    #[Info(name: 'application/vnd.koan', category: Category::APPLICATION)]
    case APPLICATION_VND_KOAN = 'application/vnd.koan';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.kodak-descriptor
     */
    #[Info(name: 'application/vnd.kodak-descriptor', category: Category::APPLICATION)]
    case APPLICATION_VND_KODAK_DESCRIPTOR = 'application/vnd.kodak-descriptor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.las
     */
    #[Info(name: 'application/vnd.las', category: Category::APPLICATION)]
    case APPLICATION_VND_LAS = 'application/vnd.las';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.las.las+json
     */
    #[Info(name: 'application/vnd.las.las+json', category: Category::APPLICATION)]
    case APPLICATION_VND_LAS_LAS_JSON = 'application/vnd.las.las+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.las.las+xml
     */
    #[Info(name: 'application/vnd.las.las+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_LAS_LAS_XML = 'application/vnd.las.las+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.laszip
     */
    #[Info(name: 'application/vnd.laszip', category: Category::APPLICATION)]
    case APPLICATION_VND_LASZIP = 'application/vnd.laszip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.leap+json
     */
    #[Info(name: 'application/vnd.leap+json', category: Category::APPLICATION)]
    case APPLICATION_VND_LEAP_JSON = 'application/vnd.leap+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.liberty-request+xml
     */
    #[Info(name: 'application/vnd.liberty-request+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_LIBERTY_REQUEST_XML = 'application/vnd.liberty-request+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.llamagraphics.life-balance.desktop
     */
    #[Info(name: 'application/vnd.llamagraphics.life-balance.desktop', category: Category::APPLICATION)]
    case APPLICATION_VND_LLAMAGRAPHICS_LIFE_BALANCE_DESKTOP = 'application/vnd.llamagraphics.life-balance.desktop';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.llamagraphics.life-balance.exchange+xml
     */
    #[Info(name: 'application/vnd.llamagraphics.life-balance.exchange+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_LLAMAGRAPHICS_LIFE_BALANCE_EXCHANGE_XML = 'application/vnd.llamagraphics.life-balance.exchange+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.logipipe.circuit+zip
     */
    #[Info(name: 'application/vnd.logipipe.circuit+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_LOGIPIPE_CIRCUIT_ZIP = 'application/vnd.logipipe.circuit+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.loom
     */
    #[Info(name: 'application/vnd.loom', category: Category::APPLICATION)]
    case APPLICATION_VND_LOOM = 'application/vnd.loom';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-1-2-3
     */
    #[Info(name: 'application/vnd.lotus-1-2-3', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_1_2_3 = 'application/vnd.lotus-1-2-3';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-approach
     */
    #[Info(name: 'application/vnd.lotus-approach', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_APPROACH = 'application/vnd.lotus-approach';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-freelance
     */
    #[Info(name: 'application/vnd.lotus-freelance', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_FREELANCE = 'application/vnd.lotus-freelance';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-notes
     */
    #[Info(name: 'application/vnd.lotus-notes', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_NOTES = 'application/vnd.lotus-notes';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-organizer
     */
    #[Info(name: 'application/vnd.lotus-organizer', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_ORGANIZER = 'application/vnd.lotus-organizer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-screencam
     */
    #[Info(name: 'application/vnd.lotus-screencam', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_SCREENCAM = 'application/vnd.lotus-screencam';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.lotus-wordpro
     */
    #[Info(name: 'application/vnd.lotus-wordpro', category: Category::APPLICATION)]
    case APPLICATION_VND_LOTUS_WORDPRO = 'application/vnd.lotus-wordpro';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.macports.portpkg
     */
    #[Info(name: 'application/vnd.macports.portpkg', category: Category::APPLICATION)]
    case APPLICATION_VND_MACPORTS_PORTPKG = 'application/vnd.macports.portpkg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mapbox-vector-tile
     */
    #[Info(name: 'application/vnd.mapbox-vector-tile', category: Category::APPLICATION)]
    case APPLICATION_VND_MAPBOX_VECTOR_TILE = 'application/vnd.mapbox-vector-tile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.marlin.drm.actiontoken+xml
     */
    #[Info(name: 'application/vnd.marlin.drm.actiontoken+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MARLIN_DRM_ACTIONTOKEN_XML = 'application/vnd.marlin.drm.actiontoken+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.marlin.drm.conftoken+xml
     */
    #[Info(name: 'application/vnd.marlin.drm.conftoken+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MARLIN_DRM_CONFTOKEN_XML = 'application/vnd.marlin.drm.conftoken+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.marlin.drm.license+xml
     */
    #[Info(name: 'application/vnd.marlin.drm.license+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MARLIN_DRM_LICENSE_XML = 'application/vnd.marlin.drm.license+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.marlin.drm.mdcf
     */
    #[Info(name: 'application/vnd.marlin.drm.mdcf', category: Category::APPLICATION)]
    case APPLICATION_VND_MARLIN_DRM_MDCF = 'application/vnd.marlin.drm.mdcf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mason+json
     */
    #[Info(name: 'application/vnd.mason+json', category: Category::APPLICATION)]
    case APPLICATION_VND_MASON_JSON = 'application/vnd.mason+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.maxar.archive.3tz+zip
     */
    #[Info(name: 'application/vnd.maxar.archive.3tz+zip', category: Category::APPLICATION)]
    case APPLICATION_VND_MAXAR_ARCHIVE_3TZ_ZIP = 'application/vnd.maxar.archive.3tz+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.maxmind.maxmind-db
     */
    #[Info(name: 'application/vnd.maxmind.maxmind-db', category: Category::APPLICATION)]
    case APPLICATION_VND_MAXMIND_MAXMIND_DB = 'application/vnd.maxmind.maxmind-db';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mcd
     */
    #[Info(name: 'application/vnd.mcd', category: Category::APPLICATION)]
    case APPLICATION_VND_MCD = 'application/vnd.mcd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.medcalcdata
     */
    #[Info(name: 'application/vnd.medcalcdata', category: Category::APPLICATION)]
    case APPLICATION_VND_MEDCALCDATA = 'application/vnd.medcalcdata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mediastation.cdkey
     */
    #[Info(name: 'application/vnd.mediastation.cdkey', category: Category::APPLICATION)]
    case APPLICATION_VND_MEDIASTATION_CDKEY = 'application/vnd.mediastation.cdkey';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.meridian-slingshot
     */
    #[Info(name: 'application/vnd.meridian-slingshot', category: Category::APPLICATION)]
    case APPLICATION_VND_MERIDIAN_SLINGSHOT = 'application/vnd.meridian-slingshot';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.MFER
     */
    #[Info(name: 'application/vnd.MFER', category: Category::APPLICATION)]
    case APPLICATION_VND_MFER = 'application/vnd.mfer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mfmp
     */
    #[Info(name: 'application/vnd.mfmp', category: Category::APPLICATION)]
    case APPLICATION_VND_MFMP = 'application/vnd.mfmp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.micro+json
     */
    #[Info(name: 'application/vnd.micro+json', category: Category::APPLICATION)]
    case APPLICATION_VND_MICRO_JSON = 'application/vnd.micro+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.micrografx.flo
     */
    #[Info(name: 'application/vnd.micrografx.flo', category: Category::APPLICATION)]
    case APPLICATION_VND_MICROGRAFX_FLO = 'application/vnd.micrografx.flo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.micrografx.igx
     */
    #[Info(name: 'application/vnd.micrografx.igx', category: Category::APPLICATION)]
    case APPLICATION_VND_MICROGRAFX_IGX = 'application/vnd.micrografx.igx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.microsoft.portable-executable
     */
    #[Info(name: 'application/vnd.microsoft.portable-executable', category: Category::APPLICATION)]
    case APPLICATION_VND_MICROSOFT_PORTABLE_EXECUTABLE = 'application/vnd.microsoft.portable-executable';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.microsoft.windows.thumbnail-cache
     */
    #[Info(name: 'application/vnd.microsoft.windows.thumbnail-cache', category: Category::APPLICATION)]
    case APPLICATION_VND_MICROSOFT_WINDOWS_THUMBNAIL_CACHE = 'application/vnd.microsoft.windows.thumbnail-cache';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.miele+json
     */
    #[Info(name: 'application/vnd.miele+json', category: Category::APPLICATION)]
    case APPLICATION_VND_MIELE_JSON = 'application/vnd.miele+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mif
     */
    #[Info(name: 'application/vnd.mif', category: Category::APPLICATION)]
    case APPLICATION_VND_MIF = 'application/vnd.mif';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.minisoft-hp3000-save
     */
    #[Info(name: 'application/vnd.minisoft-hp3000-save', category: Category::APPLICATION)]
    case APPLICATION_VND_MINISOFT_HP3000_SAVE = 'application/vnd.minisoft-hp3000-save';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mitsubishi.misty-guard.trustweb
     */
    #[Info(name: 'application/vnd.mitsubishi.misty-guard.trustweb', category: Category::APPLICATION)]
    case APPLICATION_VND_MITSUBISHI_MISTY_GUARD_TRUSTWEB = 'application/vnd.mitsubishi.misty-guard.trustweb';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.DAF
     */
    #[Info(name: 'application/vnd.Mobius.DAF', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_DAF = 'application/vnd.mobius.daf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.DIS
     */
    #[Info(name: 'application/vnd.Mobius.DIS', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_DIS = 'application/vnd.mobius.dis';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.MBK
     */
    #[Info(name: 'application/vnd.Mobius.MBK', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_MBK = 'application/vnd.mobius.mbk';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.MQY
     */
    #[Info(name: 'application/vnd.Mobius.MQY', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_MQY = 'application/vnd.mobius.mqy';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.MSL
     */
    #[Info(name: 'application/vnd.Mobius.MSL', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_MSL = 'application/vnd.mobius.msl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.PLC
     */
    #[Info(name: 'application/vnd.Mobius.PLC', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_PLC = 'application/vnd.mobius.plc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Mobius.TXF
     */
    #[Info(name: 'application/vnd.Mobius.TXF', category: Category::APPLICATION)]
    case APPLICATION_VND_MOBIUS_TXF = 'application/vnd.mobius.txf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mophun.application
     */
    #[Info(name: 'application/vnd.mophun.application', category: Category::APPLICATION)]
    case APPLICATION_VND_MOPHUN_APPLICATION = 'application/vnd.mophun.application';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mophun.certificate
     */
    #[Info(name: 'application/vnd.mophun.certificate', category: Category::APPLICATION)]
    case APPLICATION_VND_MOPHUN_CERTIFICATE = 'application/vnd.mophun.certificate';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite
     */
    #[Info(name: 'application/vnd.motorola.flexsuite', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE = 'application/vnd.motorola.flexsuite';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite.adsi
     */
    #[Info(name: 'application/vnd.motorola.flexsuite.adsi', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE_ADSI = 'application/vnd.motorola.flexsuite.adsi';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite.fis
     */
    #[Info(name: 'application/vnd.motorola.flexsuite.fis', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE_FIS = 'application/vnd.motorola.flexsuite.fis';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite.gotap
     */
    #[Info(name: 'application/vnd.motorola.flexsuite.gotap', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE_GOTAP = 'application/vnd.motorola.flexsuite.gotap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite.kmr
     */
    #[Info(name: 'application/vnd.motorola.flexsuite.kmr', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE_KMR = 'application/vnd.motorola.flexsuite.kmr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite.ttc
     */
    #[Info(name: 'application/vnd.motorola.flexsuite.ttc', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE_TTC = 'application/vnd.motorola.flexsuite.ttc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.flexsuite.wem
     */
    #[Info(name: 'application/vnd.motorola.flexsuite.wem', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_FLEXSUITE_WEM = 'application/vnd.motorola.flexsuite.wem';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.motorola.iprm
     */
    #[Info(name: 'application/vnd.motorola.iprm', category: Category::APPLICATION)]
    case APPLICATION_VND_MOTOROLA_IPRM = 'application/vnd.motorola.iprm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mozilla.xul+xml
     */
    #[Info(name: 'application/vnd.mozilla.xul+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MOZILLA_XUL_XML = 'application/vnd.mozilla.xul+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-artgalry
     */
    #[Info(name: 'application/vnd.ms-artgalry', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_ARTGALRY = 'application/vnd.ms-artgalry';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-asf
     */
    #[Info(name: 'application/vnd.ms-asf', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_ASF = 'application/vnd.ms-asf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-cab-compressed
     */
    #[Info(name: 'application/vnd.ms-cab-compressed', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_CAB_COMPRESSED = 'application/vnd.ms-cab-compressed';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-3mfdocument
     */
    #[Info(name: 'application/vnd.ms-3mfdocument', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_3MFDOCUMENT = 'application/vnd.ms-3mfdocument';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-excel
     */
    #[Info(name: 'application/vnd.ms-excel', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_EXCEL = 'application/vnd.ms-excel';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-excel.addin.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-excel.addin.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_EXCEL_ADDIN_MACROENABLED_12 = 'application/vnd.ms-excel.addin.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-excel.sheet.binary.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-excel.sheet.binary.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_EXCEL_SHEET_BINARY_MACROENABLED_12 = 'application/vnd.ms-excel.sheet.binary.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-excel.sheet.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-excel.sheet.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_EXCEL_SHEET_MACROENABLED_12 = 'application/vnd.ms-excel.sheet.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-excel.template.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-excel.template.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_EXCEL_TEMPLATE_MACROENABLED_12 = 'application/vnd.ms-excel.template.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-fontobject
     */
    #[Info(name: 'application/vnd.ms-fontobject', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_FONTOBJECT = 'application/vnd.ms-fontobject';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-htmlhelp
     */
    #[Info(name: 'application/vnd.ms-htmlhelp', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_HTMLHELP = 'application/vnd.ms-htmlhelp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-ims
     */
    #[Info(name: 'application/vnd.ms-ims', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_IMS = 'application/vnd.ms-ims';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-lrm
     */
    #[Info(name: 'application/vnd.ms-lrm', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_LRM = 'application/vnd.ms-lrm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-office.activeX+xml
     */
    #[Info(name: 'application/vnd.ms-office.activeX+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_OFFICE_ACTIVEX_XML = 'application/vnd.ms-office.activex+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-officetheme
     */
    #[Info(name: 'application/vnd.ms-officetheme', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_OFFICETHEME = 'application/vnd.ms-officetheme';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-playready.initiator+xml
     */
    #[Info(name: 'application/vnd.ms-playready.initiator+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_PLAYREADY_INITIATOR_XML = 'application/vnd.ms-playready.initiator+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-powerpoint
     */
    #[Info(name: 'application/vnd.ms-powerpoint', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_POWERPOINT = 'application/vnd.ms-powerpoint';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-powerpoint.addin.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-powerpoint.addin.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_POWERPOINT_ADDIN_MACROENABLED_12 = 'application/vnd.ms-powerpoint.addin.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-powerpoint.presentation.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-powerpoint.presentation.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_POWERPOINT_PRESENTATION_MACROENABLED_12 = 'application/vnd.ms-powerpoint.presentation.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-powerpoint.slide.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-powerpoint.slide.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_POWERPOINT_SLIDE_MACROENABLED_12 = 'application/vnd.ms-powerpoint.slide.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-powerpoint.slideshow.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_POWERPOINT_SLIDESHOW_MACROENABLED_12 = 'application/vnd.ms-powerpoint.slideshow.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-powerpoint.template.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-powerpoint.template.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_POWERPOINT_TEMPLATE_MACROENABLED_12 = 'application/vnd.ms-powerpoint.template.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-PrintDeviceCapabilities+xml
     */
    #[Info(name: 'application/vnd.ms-PrintDeviceCapabilities+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_PRINTDEVICECAPABILITIES_XML = 'application/vnd.ms-printdevicecapabilities+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-PrintSchemaTicket+xml
     */
    #[Info(name: 'application/vnd.ms-PrintSchemaTicket+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_PRINTSCHEMATICKET_XML = 'application/vnd.ms-printschematicket+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-project
     */
    #[Info(name: 'application/vnd.ms-project', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_PROJECT = 'application/vnd.ms-project';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-tnef
     */
    #[Info(name: 'application/vnd.ms-tnef', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_TNEF = 'application/vnd.ms-tnef';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-windows.devicepairing
     */
    #[Info(name: 'application/vnd.ms-windows.devicepairing', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WINDOWS_DEVICEPAIRING = 'application/vnd.ms-windows.devicepairing';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-windows.nwprinting.oob
     */
    #[Info(name: 'application/vnd.ms-windows.nwprinting.oob', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WINDOWS_NWPRINTING_OOB = 'application/vnd.ms-windows.nwprinting.oob';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-windows.printerpairing
     */
    #[Info(name: 'application/vnd.ms-windows.printerpairing', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WINDOWS_PRINTERPAIRING = 'application/vnd.ms-windows.printerpairing';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-windows.wsd.oob
     */
    #[Info(name: 'application/vnd.ms-windows.wsd.oob', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WINDOWS_WSD_OOB = 'application/vnd.ms-windows.wsd.oob';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-wmdrm.lic-chlg-req
     */
    #[Info(name: 'application/vnd.ms-wmdrm.lic-chlg-req', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WMDRM_LIC_CHLG_REQ = 'application/vnd.ms-wmdrm.lic-chlg-req';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-wmdrm.lic-resp
     */
    #[Info(name: 'application/vnd.ms-wmdrm.lic-resp', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WMDRM_LIC_RESP = 'application/vnd.ms-wmdrm.lic-resp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-wmdrm.meter-chlg-req
     */
    #[Info(name: 'application/vnd.ms-wmdrm.meter-chlg-req', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WMDRM_METER_CHLG_REQ = 'application/vnd.ms-wmdrm.meter-chlg-req';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-wmdrm.meter-resp
     */
    #[Info(name: 'application/vnd.ms-wmdrm.meter-resp', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WMDRM_METER_RESP = 'application/vnd.ms-wmdrm.meter-resp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-word.document.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-word.document.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WORD_DOCUMENT_MACROENABLED_12 = 'application/vnd.ms-word.document.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-word.template.macroEnabled.12
     */
    #[Info(name: 'application/vnd.ms-word.template.macroEnabled.12', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WORD_TEMPLATE_MACROENABLED_12 = 'application/vnd.ms-word.template.macroenabled.12';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-works
     */
    #[Info(name: 'application/vnd.ms-works', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WORKS = 'application/vnd.ms-works';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-wpl
     */
    #[Info(name: 'application/vnd.ms-wpl', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_WPL = 'application/vnd.ms-wpl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ms-xpsdocument
     */
    #[Info(name: 'application/vnd.ms-xpsdocument', category: Category::APPLICATION)]
    case APPLICATION_VND_MS_XPSDOCUMENT = 'application/vnd.ms-xpsdocument';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.msa-disk-image
     */
    #[Info(name: 'application/vnd.msa-disk-image', category: Category::APPLICATION)]
    case APPLICATION_VND_MSA_DISK_IMAGE = 'application/vnd.msa-disk-image';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mseq
     */
    #[Info(name: 'application/vnd.mseq', category: Category::APPLICATION)]
    case APPLICATION_VND_MSEQ = 'application/vnd.mseq';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.msign
     */
    #[Info(name: 'application/vnd.msign', category: Category::APPLICATION)]
    case APPLICATION_VND_MSIGN = 'application/vnd.msign';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.multiad.creator
     */
    #[Info(name: 'application/vnd.multiad.creator', category: Category::APPLICATION)]
    case APPLICATION_VND_MULTIAD_CREATOR = 'application/vnd.multiad.creator';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.multiad.creator.cif
     */
    #[Info(name: 'application/vnd.multiad.creator.cif', category: Category::APPLICATION)]
    case APPLICATION_VND_MULTIAD_CREATOR_CIF = 'application/vnd.multiad.creator.cif';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.musician
     */
    #[Info(name: 'application/vnd.musician', category: Category::APPLICATION)]
    case APPLICATION_VND_MUSICIAN = 'application/vnd.musician';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.music-niff
     */
    #[Info(name: 'application/vnd.music-niff', category: Category::APPLICATION)]
    case APPLICATION_VND_MUSIC_NIFF = 'application/vnd.music-niff';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.muvee.style
     */
    #[Info(name: 'application/vnd.muvee.style', category: Category::APPLICATION)]
    case APPLICATION_VND_MUVEE_STYLE = 'application/vnd.muvee.style';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.mynfc
     */
    #[Info(name: 'application/vnd.mynfc', category: Category::APPLICATION)]
    case APPLICATION_VND_MYNFC = 'application/vnd.mynfc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nacamar.ybrid+json
     */
    #[Info(name: 'application/vnd.nacamar.ybrid+json', category: Category::APPLICATION)]
    case APPLICATION_VND_NACAMAR_YBRID_JSON = 'application/vnd.nacamar.ybrid+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ncd.control
     */
    #[Info(name: 'application/vnd.ncd.control', category: Category::APPLICATION)]
    case APPLICATION_VND_NCD_CONTROL = 'application/vnd.ncd.control';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ncd.reference
     */
    #[Info(name: 'application/vnd.ncd.reference', category: Category::APPLICATION)]
    case APPLICATION_VND_NCD_REFERENCE = 'application/vnd.ncd.reference';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nearst.inv+json
     */
    #[Info(name: 'application/vnd.nearst.inv+json', category: Category::APPLICATION)]
    case APPLICATION_VND_NEARST_INV_JSON = 'application/vnd.nearst.inv+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nebumind.line
     */
    #[Info(name: 'application/vnd.nebumind.line', category: Category::APPLICATION)]
    case APPLICATION_VND_NEBUMIND_LINE = 'application/vnd.nebumind.line';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nervana
     */
    #[Info(name: 'application/vnd.nervana', category: Category::APPLICATION)]
    case APPLICATION_VND_NERVANA = 'application/vnd.nervana';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.netfpx
     */
    #[Info(name: 'application/vnd.netfpx', category: Category::APPLICATION)]
    case APPLICATION_VND_NETFPX = 'application/vnd.netfpx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.neurolanguage.nlu
     */
    #[Info(name: 'application/vnd.neurolanguage.nlu', category: Category::APPLICATION)]
    case APPLICATION_VND_NEUROLANGUAGE_NLU = 'application/vnd.neurolanguage.nlu';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nimn
     */
    #[Info(name: 'application/vnd.nimn', category: Category::APPLICATION)]
    case APPLICATION_VND_NIMN = 'application/vnd.nimn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nintendo.snes.rom
     */
    #[Info(name: 'application/vnd.nintendo.snes.rom', category: Category::APPLICATION)]
    case APPLICATION_VND_NINTENDO_SNES_ROM = 'application/vnd.nintendo.snes.rom';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nintendo.nitro.rom
     */
    #[Info(name: 'application/vnd.nintendo.nitro.rom', category: Category::APPLICATION)]
    case APPLICATION_VND_NINTENDO_NITRO_ROM = 'application/vnd.nintendo.nitro.rom';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nitf
     */
    #[Info(name: 'application/vnd.nitf', category: Category::APPLICATION)]
    case APPLICATION_VND_NITF = 'application/vnd.nitf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.noblenet-directory
     */
    #[Info(name: 'application/vnd.noblenet-directory', category: Category::APPLICATION)]
    case APPLICATION_VND_NOBLENET_DIRECTORY = 'application/vnd.noblenet-directory';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.noblenet-sealer
     */
    #[Info(name: 'application/vnd.noblenet-sealer', category: Category::APPLICATION)]
    case APPLICATION_VND_NOBLENET_SEALER = 'application/vnd.noblenet-sealer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.noblenet-web
     */
    #[Info(name: 'application/vnd.noblenet-web', category: Category::APPLICATION)]
    case APPLICATION_VND_NOBLENET_WEB = 'application/vnd.noblenet-web';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.catalogs
     */
    #[Info(name: 'application/vnd.nokia.catalogs', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_CATALOGS = 'application/vnd.nokia.catalogs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.conml+wbxml
     */
    #[Info(name: 'application/vnd.nokia.conml+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_CONML_WBXML = 'application/vnd.nokia.conml+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.conml+xml
     */
    #[Info(name: 'application/vnd.nokia.conml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_CONML_XML = 'application/vnd.nokia.conml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.iptv.config+xml
     */
    #[Info(name: 'application/vnd.nokia.iptv.config+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_IPTV_CONFIG_XML = 'application/vnd.nokia.iptv.config+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.iSDS-radio-presets
     */
    #[Info(name: 'application/vnd.nokia.iSDS-radio-presets', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_ISDS_RADIO_PRESETS = 'application/vnd.nokia.isds-radio-presets';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.landmark+wbxml
     */
    #[Info(name: 'application/vnd.nokia.landmark+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_LANDMARK_WBXML = 'application/vnd.nokia.landmark+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.landmark+xml
     */
    #[Info(name: 'application/vnd.nokia.landmark+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_LANDMARK_XML = 'application/vnd.nokia.landmark+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.landmarkcollection+xml
     */
    #[Info(name: 'application/vnd.nokia.landmarkcollection+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_LANDMARKCOLLECTION_XML = 'application/vnd.nokia.landmarkcollection+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.ncd
     */
    #[Info(name: 'application/vnd.nokia.ncd', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_NCD = 'application/vnd.nokia.ncd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.n-gage.ac+xml
     */
    #[Info(name: 'application/vnd.nokia.n-gage.ac+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_N_GAGE_AC_XML = 'application/vnd.nokia.n-gage.ac+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.n-gage.data
     */
    #[Info(name: 'application/vnd.nokia.n-gage.data', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_N_GAGE_DATA = 'application/vnd.nokia.n-gage.data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.n-gage.symbian.install
     */
    #[Info(name: 'application/vnd.nokia.n-gage.symbian.install', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_N_GAGE_SYMBIAN_INSTALL = 'application/vnd.nokia.n-gage.symbian.install';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.pcd+wbxml
     */
    #[Info(name: 'application/vnd.nokia.pcd+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_PCD_WBXML = 'application/vnd.nokia.pcd+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.pcd+xml
     */
    #[Info(name: 'application/vnd.nokia.pcd+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_PCD_XML = 'application/vnd.nokia.pcd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.radio-preset
     */
    #[Info(name: 'application/vnd.nokia.radio-preset', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_RADIO_PRESET = 'application/vnd.nokia.radio-preset';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.nokia.radio-presets
     */
    #[Info(name: 'application/vnd.nokia.radio-presets', category: Category::APPLICATION)]
    case APPLICATION_VND_NOKIA_RADIO_PRESETS = 'application/vnd.nokia.radio-presets';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.novadigm.EDM
     */
    #[Info(name: 'application/vnd.novadigm.EDM', category: Category::APPLICATION)]
    case APPLICATION_VND_NOVADIGM_EDM = 'application/vnd.novadigm.edm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.novadigm.EDX
     */
    #[Info(name: 'application/vnd.novadigm.EDX', category: Category::APPLICATION)]
    case APPLICATION_VND_NOVADIGM_EDX = 'application/vnd.novadigm.edx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.novadigm.EXT
     */
    #[Info(name: 'application/vnd.novadigm.EXT', category: Category::APPLICATION)]
    case APPLICATION_VND_NOVADIGM_EXT = 'application/vnd.novadigm.ext';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ntt-local.content-share
     */
    #[Info(name: 'application/vnd.ntt-local.content-share', category: Category::APPLICATION)]
    case APPLICATION_VND_NTT_LOCAL_CONTENT_SHARE = 'application/vnd.ntt-local.content-share';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ntt-local.file-transfer
     */
    #[Info(name: 'application/vnd.ntt-local.file-transfer', category: Category::APPLICATION)]
    case APPLICATION_VND_NTT_LOCAL_FILE_TRANSFER = 'application/vnd.ntt-local.file-transfer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ntt-local.ogw_remote-access
     */
    #[Info(name: 'application/vnd.ntt-local.ogw_remote-access', category: Category::APPLICATION)]
    case APPLICATION_VND_NTT_LOCAL_OGW_REMOTE_ACCESS = 'application/vnd.ntt-local.ogw_remote-access';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ntt-local.sip-ta_remote
     */
    #[Info(name: 'application/vnd.ntt-local.sip-ta_remote', category: Category::APPLICATION)]
    case APPLICATION_VND_NTT_LOCAL_SIP_TA_REMOTE = 'application/vnd.ntt-local.sip-ta_remote';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ntt-local.sip-ta_tcp_stream
     */
    #[Info(name: 'application/vnd.ntt-local.sip-ta_tcp_stream', category: Category::APPLICATION)]
    case APPLICATION_VND_NTT_LOCAL_SIP_TA_TCP_STREAM = 'application/vnd.ntt-local.sip-ta_tcp_stream';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.chart
     */
    #[Info(name: 'application/vnd.oasis.opendocument.chart', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_CHART = 'application/vnd.oasis.opendocument.chart';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.chart-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.chart-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_CHART_TEMPLATE = 'application/vnd.oasis.opendocument.chart-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.database
     */
    #[Info(name: 'application/vnd.oasis.opendocument.database', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_DATABASE = 'application/vnd.oasis.opendocument.database';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.formula
     */
    #[Info(name: 'application/vnd.oasis.opendocument.formula', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_FORMULA = 'application/vnd.oasis.opendocument.formula';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.formula-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.formula-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_FORMULA_TEMPLATE = 'application/vnd.oasis.opendocument.formula-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.graphics
     */
    #[Info(name: 'application/vnd.oasis.opendocument.graphics', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_GRAPHICS = 'application/vnd.oasis.opendocument.graphics';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.graphics-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.graphics-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_GRAPHICS_TEMPLATE = 'application/vnd.oasis.opendocument.graphics-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.image
     */
    #[Info(name: 'application/vnd.oasis.opendocument.image', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_IMAGE = 'application/vnd.oasis.opendocument.image';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.image-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.image-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_IMAGE_TEMPLATE = 'application/vnd.oasis.opendocument.image-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.presentation
     */
    #[Info(name: 'application/vnd.oasis.opendocument.presentation', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_PRESENTATION = 'application/vnd.oasis.opendocument.presentation';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.presentation-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.presentation-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_PRESENTATION_TEMPLATE = 'application/vnd.oasis.opendocument.presentation-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.spreadsheet
     */
    #[Info(name: 'application/vnd.oasis.opendocument.spreadsheet', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_SPREADSHEET = 'application/vnd.oasis.opendocument.spreadsheet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.spreadsheet-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.spreadsheet-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_SPREADSHEET_TEMPLATE = 'application/vnd.oasis.opendocument.spreadsheet-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.text
     */
    #[Info(name: 'application/vnd.oasis.opendocument.text', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_TEXT = 'application/vnd.oasis.opendocument.text';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.text-master
     */
    #[Info(name: 'application/vnd.oasis.opendocument.text-master', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_TEXT_MASTER = 'application/vnd.oasis.opendocument.text-master';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.text-template
     */
    #[Info(name: 'application/vnd.oasis.opendocument.text-template', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_TEXT_TEMPLATE = 'application/vnd.oasis.opendocument.text-template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oasis.opendocument.text-web
     */
    #[Info(name: 'application/vnd.oasis.opendocument.text-web', category: Category::APPLICATION)]
    case APPLICATION_VND_OASIS_OPENDOCUMENT_TEXT_WEB = 'application/vnd.oasis.opendocument.text-web';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.obn
     */
    #[Info(name: 'application/vnd.obn', category: Category::APPLICATION)]
    case APPLICATION_VND_OBN = 'application/vnd.obn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ocf+cbor
     */
    #[Info(name: 'application/vnd.ocf+cbor', category: Category::APPLICATION)]
    case APPLICATION_VND_OCF_CBOR = 'application/vnd.ocf+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oci.image.manifest.v1+json
     */
    #[Info(name: 'application/vnd.oci.image.manifest.v1+json', category: Category::APPLICATION)]
    case APPLICATION_VND_OCI_IMAGE_MANIFEST_V1_JSON = 'application/vnd.oci.image.manifest.v1+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oftn.l10n+json
     */
    #[Info(name: 'application/vnd.oftn.l10n+json', category: Category::APPLICATION)]
    case APPLICATION_VND_OFTN_L10N_JSON = 'application/vnd.oftn.l10n+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.contentaccessdownload+xml
     */
    #[Info(name: 'application/vnd.oipf.contentaccessdownload+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_CONTENTACCESSDOWNLOAD_XML = 'application/vnd.oipf.contentaccessdownload+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.contentaccessstreaming+xml
     */
    #[Info(name: 'application/vnd.oipf.contentaccessstreaming+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_CONTENTACCESSSTREAMING_XML = 'application/vnd.oipf.contentaccessstreaming+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.cspg-hexbinary
     */
    #[Info(name: 'application/vnd.oipf.cspg-hexbinary', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_CSPG_HEXBINARY = 'application/vnd.oipf.cspg-hexbinary';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.dae.svg+xml
     */
    #[Info(name: 'application/vnd.oipf.dae.svg+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_DAE_SVG_XML = 'application/vnd.oipf.dae.svg+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.dae.xhtml+xml
     */
    #[Info(name: 'application/vnd.oipf.dae.xhtml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_DAE_XHTML_XML = 'application/vnd.oipf.dae.xhtml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.mippvcontrolmessage+xml
     */
    #[Info(name: 'application/vnd.oipf.mippvcontrolmessage+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_MIPPVCONTROLMESSAGE_XML = 'application/vnd.oipf.mippvcontrolmessage+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.pae.gem
     */
    #[Info(name: 'application/vnd.oipf.pae.gem', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_PAE_GEM = 'application/vnd.oipf.pae.gem';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.spdiscovery+xml
     */
    #[Info(name: 'application/vnd.oipf.spdiscovery+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_SPDISCOVERY_XML = 'application/vnd.oipf.spdiscovery+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.spdlist+xml
     */
    #[Info(name: 'application/vnd.oipf.spdlist+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_SPDLIST_XML = 'application/vnd.oipf.spdlist+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.ueprofile+xml
     */
    #[Info(name: 'application/vnd.oipf.ueprofile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_UEPROFILE_XML = 'application/vnd.oipf.ueprofile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oipf.userprofile+xml
     */
    #[Info(name: 'application/vnd.oipf.userprofile+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OIPF_USERPROFILE_XML = 'application/vnd.oipf.userprofile+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.olpc-sugar
     */
    #[Info(name: 'application/vnd.olpc-sugar', category: Category::APPLICATION)]
    case APPLICATION_VND_OLPC_SUGAR = 'application/vnd.olpc-sugar';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.associated-procedure-parameter+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.associated-procedure-parameter+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_ASSOCIATED_PROCEDURE_PARAMETER_XML = 'application/vnd.oma.bcast.associated-procedure-parameter+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.drm-trigger+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.drm-trigger+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_DRM_TRIGGER_XML = 'application/vnd.oma.bcast.drm-trigger+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.imd+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.imd+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_IMD_XML = 'application/vnd.oma.bcast.imd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.ltkm
     */
    #[Info(name: 'application/vnd.oma.bcast.ltkm', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_LTKM = 'application/vnd.oma.bcast.ltkm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.notification+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.notification+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_NOTIFICATION_XML = 'application/vnd.oma.bcast.notification+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.provisioningtrigger
     */
    #[Info(name: 'application/vnd.oma.bcast.provisioningtrigger', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_PROVISIONINGTRIGGER = 'application/vnd.oma.bcast.provisioningtrigger';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.sgboot
     */
    #[Info(name: 'application/vnd.oma.bcast.sgboot', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_SGBOOT = 'application/vnd.oma.bcast.sgboot';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.sgdd+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.sgdd+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_SGDD_XML = 'application/vnd.oma.bcast.sgdd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.sgdu
     */
    #[Info(name: 'application/vnd.oma.bcast.sgdu', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_SGDU = 'application/vnd.oma.bcast.sgdu';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.simple-symbol-container
     */
    #[Info(name: 'application/vnd.oma.bcast.simple-symbol-container', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_SIMPLE_SYMBOL_CONTAINER = 'application/vnd.oma.bcast.simple-symbol-container';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.smartcard-trigger+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.smartcard-trigger+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_SMARTCARD_TRIGGER_XML = 'application/vnd.oma.bcast.smartcard-trigger+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.sprov+xml
     */
    #[Info(name: 'application/vnd.oma.bcast.sprov+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_SPROV_XML = 'application/vnd.oma.bcast.sprov+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.bcast.stkm
     */
    #[Info(name: 'application/vnd.oma.bcast.stkm', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_BCAST_STKM = 'application/vnd.oma.bcast.stkm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.cab-address-book+xml
     */
    #[Info(name: 'application/vnd.oma.cab-address-book+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_CAB_ADDRESS_BOOK_XML = 'application/vnd.oma.cab-address-book+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.cab-feature-handler+xml
     */
    #[Info(name: 'application/vnd.oma.cab-feature-handler+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_CAB_FEATURE_HANDLER_XML = 'application/vnd.oma.cab-feature-handler+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.cab-pcc+xml
     */
    #[Info(name: 'application/vnd.oma.cab-pcc+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_CAB_PCC_XML = 'application/vnd.oma.cab-pcc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.cab-subs-invite+xml
     */
    #[Info(name: 'application/vnd.oma.cab-subs-invite+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_CAB_SUBS_INVITE_XML = 'application/vnd.oma.cab-subs-invite+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.cab-user-prefs+xml
     */
    #[Info(name: 'application/vnd.oma.cab-user-prefs+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_CAB_USER_PREFS_XML = 'application/vnd.oma.cab-user-prefs+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.dcd
     */
    #[Info(name: 'application/vnd.oma.dcd', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_DCD = 'application/vnd.oma.dcd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.dcdc
     */
    #[Info(name: 'application/vnd.oma.dcdc', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_DCDC = 'application/vnd.oma.dcdc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.dd2+xml
     */
    #[Info(name: 'application/vnd.oma.dd2+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_DD2_XML = 'application/vnd.oma.dd2+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.drm.risd+xml
     */
    #[Info(name: 'application/vnd.oma.drm.risd+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_DRM_RISD_XML = 'application/vnd.oma.drm.risd+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.group-usage-list+xml
     */
    #[Info(name: 'application/vnd.oma.group-usage-list+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_GROUP_USAGE_LIST_XML = 'application/vnd.oma.group-usage-list+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.lwm2m+cbor
     */
    #[Info(name: 'application/vnd.oma.lwm2m+cbor', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_LWM2M_CBOR = 'application/vnd.oma.lwm2m+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.lwm2m+json
     */
    #[Info(name: 'application/vnd.oma.lwm2m+json', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_LWM2M_JSON = 'application/vnd.oma.lwm2m+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.lwm2m+tlv
     */
    #[Info(name: 'application/vnd.oma.lwm2m+tlv', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_LWM2M_TLV = 'application/vnd.oma.lwm2m+tlv';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.pal+xml
     */
    #[Info(name: 'application/vnd.oma.pal+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_PAL_XML = 'application/vnd.oma.pal+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.poc.detailed-progress-report+xml
     */
    #[Info(name: 'application/vnd.oma.poc.detailed-progress-report+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_POC_DETAILED_PROGRESS_REPORT_XML = 'application/vnd.oma.poc.detailed-progress-report+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.poc.final-report+xml
     */
    #[Info(name: 'application/vnd.oma.poc.final-report+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_POC_FINAL_REPORT_XML = 'application/vnd.oma.poc.final-report+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.poc.groups+xml
     */
    #[Info(name: 'application/vnd.oma.poc.groups+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_POC_GROUPS_XML = 'application/vnd.oma.poc.groups+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.poc.invocation-descriptor+xml
     */
    #[Info(name: 'application/vnd.oma.poc.invocation-descriptor+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_POC_INVOCATION_DESCRIPTOR_XML = 'application/vnd.oma.poc.invocation-descriptor+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.poc.optimized-progress-report+xml
     */
    #[Info(name: 'application/vnd.oma.poc.optimized-progress-report+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_POC_OPTIMIZED_PROGRESS_REPORT_XML = 'application/vnd.oma.poc.optimized-progress-report+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.push
     */
    #[Info(name: 'application/vnd.oma.push', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_PUSH = 'application/vnd.oma.push';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.scidm.messages+xml
     */
    #[Info(name: 'application/vnd.oma.scidm.messages+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_SCIDM_MESSAGES_XML = 'application/vnd.oma.scidm.messages+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma.xcap-directory+xml
     */
    #[Info(name: 'application/vnd.oma.xcap-directory+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_XCAP_DIRECTORY_XML = 'application/vnd.oma.xcap-directory+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.omads-email+xml
     */
    #[Info(name: 'application/vnd.omads-email+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMADS_EMAIL_XML = 'application/vnd.omads-email+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.omads-file+xml
     */
    #[Info(name: 'application/vnd.omads-file+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMADS_FILE_XML = 'application/vnd.omads-file+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.omads-folder+xml
     */
    #[Info(name: 'application/vnd.omads-folder+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OMADS_FOLDER_XML = 'application/vnd.omads-folder+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.omaloc-supl-init
     */
    #[Info(name: 'application/vnd.omaloc-supl-init', category: Category::APPLICATION)]
    case APPLICATION_VND_OMALOC_SUPL_INIT = 'application/vnd.omaloc-supl-init';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma-scws-config
     */
    #[Info(name: 'application/vnd.oma-scws-config', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_SCWS_CONFIG = 'application/vnd.oma-scws-config';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma-scws-http-request
     */
    #[Info(name: 'application/vnd.oma-scws-http-request', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_SCWS_HTTP_REQUEST = 'application/vnd.oma-scws-http-request';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oma-scws-http-response
     */
    #[Info(name: 'application/vnd.oma-scws-http-response', category: Category::APPLICATION)]
    case APPLICATION_VND_OMA_SCWS_HTTP_RESPONSE = 'application/vnd.oma-scws-http-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onepager
     */
    #[Info(name: 'application/vnd.onepager', category: Category::APPLICATION)]
    case APPLICATION_VND_ONEPAGER = 'application/vnd.onepager';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onepagertamp
     */
    #[Info(name: 'application/vnd.onepagertamp', category: Category::APPLICATION)]
    case APPLICATION_VND_ONEPAGERTAMP = 'application/vnd.onepagertamp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onepagertamx
     */
    #[Info(name: 'application/vnd.onepagertamx', category: Category::APPLICATION)]
    case APPLICATION_VND_ONEPAGERTAMX = 'application/vnd.onepagertamx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onepagertat
     */
    #[Info(name: 'application/vnd.onepagertat', category: Category::APPLICATION)]
    case APPLICATION_VND_ONEPAGERTAT = 'application/vnd.onepagertat';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onepagertatp
     */
    #[Info(name: 'application/vnd.onepagertatp', category: Category::APPLICATION)]
    case APPLICATION_VND_ONEPAGERTATP = 'application/vnd.onepagertatp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onepagertatx
     */
    #[Info(name: 'application/vnd.onepagertatx', category: Category::APPLICATION)]
    case APPLICATION_VND_ONEPAGERTATX = 'application/vnd.onepagertatx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.onvif.metadata
     */
    #[Info(name: 'application/vnd.onvif.metadata', category: Category::APPLICATION)]
    case APPLICATION_VND_ONVIF_METADATA = 'application/vnd.onvif.metadata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openblox.game-binary
     */
    #[Info(name: 'application/vnd.openblox.game-binary', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENBLOX_GAME_BINARY = 'application/vnd.openblox.game-binary';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openblox.game+xml
     */
    #[Info(name: 'application/vnd.openblox.game+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENBLOX_GAME_XML = 'application/vnd.openblox.game+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openeye.oeb
     */
    #[Info(name: 'application/vnd.openeye.oeb', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENEYE_OEB = 'application/vnd.openeye.oeb';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openstreetmap.data+xml
     */
    #[Info(name: 'application/vnd.openstreetmap.data+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENSTREETMAP_DATA_XML = 'application/vnd.openstreetmap.data+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.opentimestamps.ots
     */
    #[Info(name: 'application/vnd.opentimestamps.ots', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENTIMESTAMPS_OTS = 'application/vnd.opentimestamps.ots';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.custom-properties+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.custom-properties+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_CUSTOM_PROPERTIES_XML = 'application/vnd.openxmlformats-officedocument.custom-properties+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.customXmlProperties+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.customXmlProperties+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_CUSTOMXMLPROPERTIES_XML = 'application/vnd.openxmlformats-officedocument.customxmlproperties+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawing+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawing+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWING_XML = 'application/vnd.openxmlformats-officedocument.drawing+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawingml.chart+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawingml.chart+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWINGML_CHART_XML = 'application/vnd.openxmlformats-officedocument.drawingml.chart+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawingml.chartshapes+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawingml.chartshapes+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWINGML_CHARTSHAPES_XML = 'application/vnd.openxmlformats-officedocument.drawingml.chartshapes+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawingml.diagramColors+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawingml.diagramColors+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWINGML_DIAGRAMCOLORS_XML = 'application/vnd.openxmlformats-officedocument.drawingml.diagramcolors+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawingml.diagramData+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawingml.diagramData+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWINGML_DIAGRAMDATA_XML = 'application/vnd.openxmlformats-officedocument.drawingml.diagramdata+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawingml.diagramLayout+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawingml.diagramLayout+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWINGML_DIAGRAMLAYOUT_XML = 'application/vnd.openxmlformats-officedocument.drawingml.diagramlayout+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.drawingml.diagramStyle+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.drawingml.diagramStyle+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_DRAWINGML_DIAGRAMSTYLE_XML = 'application/vnd.openxmlformats-officedocument.drawingml.diagramstyle+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.extended-properties+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.extended-properties+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_EXTENDED_PROPERTIES_XML = 'application/vnd.openxmlformats-officedocument.extended-properties+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.commentAuthors+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.commentAuthors+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_COMMENTAUTHORS_XML = 'application/vnd.openxmlformats-officedocument.presentationml.commentauthors+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.comments+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.comments+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_COMMENTS_XML = 'application/vnd.openxmlformats-officedocument.presentationml.comments+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.handoutMaster+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.handoutMaster+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_HANDOUTMASTER_XML = 'application/vnd.openxmlformats-officedocument.presentationml.handoutmaster+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.notesMaster+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.notesMaster+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_NOTESMASTER_XML = 'application/vnd.openxmlformats-officedocument.presentationml.notesmaster+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.notesSlide+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.notesSlide+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_NOTESSLIDE_XML = 'application/vnd.openxmlformats-officedocument.presentationml.notesslide+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.presentation
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.presentation', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_PRESENTATION = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.presentation.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.presentation.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_PRESENTATION_MAIN_XML = 'application/vnd.openxmlformats-officedocument.presentationml.presentation.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.presProps+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.presProps+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_PRESPROPS_XML = 'application/vnd.openxmlformats-officedocument.presentationml.presprops+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slide
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slide', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDE = 'application/vnd.openxmlformats-officedocument.presentationml.slide';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slide+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slide+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDE_XML = 'application/vnd.openxmlformats-officedocument.presentationml.slide+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slideLayout+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slideLayout+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDELAYOUT_XML = 'application/vnd.openxmlformats-officedocument.presentationml.slidelayout+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slideMaster+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slideMaster+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDEMASTER_XML = 'application/vnd.openxmlformats-officedocument.presentationml.slidemaster+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slideshow
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slideshow', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDESHOW = 'application/vnd.openxmlformats-officedocument.presentationml.slideshow';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slideshow.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slideshow.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDESHOW_MAIN_XML = 'application/vnd.openxmlformats-officedocument.presentationml.slideshow.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.slideUpdateInfo+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.slideUpdateInfo+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_SLIDEUPDATEINFO_XML = 'application/vnd.openxmlformats-officedocument.presentationml.slideupdateinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.tableStyles+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.tableStyles+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_TABLESTYLES_XML = 'application/vnd.openxmlformats-officedocument.presentationml.tablestyles+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.tags+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.tags+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_TAGS_XML = 'application/vnd.openxmlformats-officedocument.presentationml.tags+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.template
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.template', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_TEMPLATE = 'application/vnd.openxmlformats-officedocument.presentationml.template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.template.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.template.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_TEMPLATE_MAIN_XML = 'application/vnd.openxmlformats-officedocument.presentationml.template.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.presentationml.viewProps+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.presentationml.viewProps+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_PRESENTATIONML_VIEWPROPS_XML = 'application/vnd.openxmlformats-officedocument.presentationml.viewprops+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.calcChain+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.calcChain+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_CALCCHAIN_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.calcchain+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.chartsheet+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.chartsheet+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_CHARTSHEET_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.chartsheet+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.comments+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.comments+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_COMMENTS_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.comments+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.connections+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.connections+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_CONNECTIONS_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.connections+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.dialogsheet+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.dialogsheet+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_DIALOGSHEET_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.dialogsheet+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.externalLink+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.externalLink+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_EXTERNALLINK_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.externallink+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.pivotCacheDefinition+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.pivotCacheDefinition+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_PIVOTCACHEDEFINITION_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.pivotcachedefinition+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.pivotCacheRecords+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.pivotCacheRecords+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_PIVOTCACHERECORDS_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.pivotcacherecords+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.pivotTable+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.pivotTable+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_PIVOTTABLE_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.pivottable+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.queryTable+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.queryTable+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_QUERYTABLE_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.querytable+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.revisionHeaders+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.revisionHeaders+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_REVISIONHEADERS_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.revisionheaders+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.revisionLog+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.revisionLog+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_REVISIONLOG_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.revisionlog+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.sharedStrings+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sharedStrings+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_SHAREDSTRINGS_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sharedstrings+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_SHEET = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_SHEET_MAIN_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.sheetMetadata+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheetMetadata+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_SHEETMETADATA_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheetmetadata+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_STYLES_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.table+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.table+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_TABLE_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.table+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.tableSingleCells+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.tableSingleCells+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_TABLESINGLECELLS_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.tablesinglecells+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.template
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.template', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_TEMPLATE = 'application/vnd.openxmlformats-officedocument.spreadsheetml.template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.template.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.template.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_TEMPLATE_MAIN_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.template.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.userNames+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.userNames+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_USERNAMES_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.usernames+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.volatileDependencies+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.volatileDependencies+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_VOLATILEDEPENDENCIES_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.volatiledependencies+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_SPREADSHEETML_WORKSHEET_XML = 'application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.theme+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.theme+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_THEME_XML = 'application/vnd.openxmlformats-officedocument.theme+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.themeOverride+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.themeOverride+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_THEMEOVERRIDE_XML = 'application/vnd.openxmlformats-officedocument.themeoverride+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.vmlDrawing
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.vmlDrawing', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_VMLDRAWING = 'application/vnd.openxmlformats-officedocument.vmldrawing';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.comments+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.comments+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_COMMENTS_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.comments+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.document
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_DOCUMENT = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.document.glossary+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document.glossary+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_DOCUMENT_GLOSSARY_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document.glossary+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_DOCUMENT_MAIN_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.endnotes+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.endnotes+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_ENDNOTES_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.endnotes+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.fontTable+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.fontTable+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_FONTTABLE_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.fonttable+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.footer+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.footer+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_FOOTER_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.footer+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.footnotes+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.footnotes+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_FOOTNOTES_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.footnotes+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.numbering+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.numbering+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_NUMBERING_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.numbering+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.settings+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.settings+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_SETTINGS_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.settings+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.styles+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.styles+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_STYLES_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.styles+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.template
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.template', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_TEMPLATE = 'application/vnd.openxmlformats-officedocument.wordprocessingml.template';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.template.main+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.template.main+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_TEMPLATE_MAIN_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.template.main+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-officedocument.wordprocessingml.webSettings+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-officedocument.wordprocessingml.webSettings+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_OFFICEDOCUMENT_WORDPROCESSINGML_WEBSETTINGS_XML = 'application/vnd.openxmlformats-officedocument.wordprocessingml.websettings+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-package.core-properties+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-package.core-properties+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_PACKAGE_CORE_PROPERTIES_XML = 'application/vnd.openxmlformats-package.core-properties+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-package.digital-signature-xmlsignature+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-package.digital-signature-xmlsignature+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_PACKAGE_DIGITAL_SIGNATURE_XMLSIGNATURE_XML = 'application/vnd.openxmlformats-package.digital-signature-xmlsignature+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.openxmlformats-package.relationships+xml
     */
    #[Info(name: 'application/vnd.openxmlformats-package.relationships+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OPENXMLFORMATS_PACKAGE_RELATIONSHIPS_XML = 'application/vnd.openxmlformats-package.relationships+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oracle.resource+json
     */
    #[Info(name: 'application/vnd.oracle.resource+json', category: Category::APPLICATION)]
    case APPLICATION_VND_ORACLE_RESOURCE_JSON = 'application/vnd.oracle.resource+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.orange.indata
     */
    #[Info(name: 'application/vnd.orange.indata', category: Category::APPLICATION)]
    case APPLICATION_VND_ORANGE_INDATA = 'application/vnd.orange.indata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.osa.netdeploy
     */
    #[Info(name: 'application/vnd.osa.netdeploy', category: Category::APPLICATION)]
    case APPLICATION_VND_OSA_NETDEPLOY = 'application/vnd.osa.netdeploy';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.osgeo.mapguide.package
     */
    #[Info(name: 'application/vnd.osgeo.mapguide.package', category: Category::APPLICATION)]
    case APPLICATION_VND_OSGEO_MAPGUIDE_PACKAGE = 'application/vnd.osgeo.mapguide.package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.osgi.bundle
     */
    #[Info(name: 'application/vnd.osgi.bundle', category: Category::APPLICATION)]
    case APPLICATION_VND_OSGI_BUNDLE = 'application/vnd.osgi.bundle';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.osgi.dp
     */
    #[Info(name: 'application/vnd.osgi.dp', category: Category::APPLICATION)]
    case APPLICATION_VND_OSGI_DP = 'application/vnd.osgi.dp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.osgi.subsystem
     */
    #[Info(name: 'application/vnd.osgi.subsystem', category: Category::APPLICATION)]
    case APPLICATION_VND_OSGI_SUBSYSTEM = 'application/vnd.osgi.subsystem';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.otps.ct-kip+xml
     */
    #[Info(name: 'application/vnd.otps.ct-kip+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_OTPS_CT_KIP_XML = 'application/vnd.otps.ct-kip+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.oxli.countgraph
     */
    #[Info(name: 'application/vnd.oxli.countgraph', category: Category::APPLICATION)]
    case APPLICATION_VND_OXLI_COUNTGRAPH = 'application/vnd.oxli.countgraph';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pagerduty+json
     */
    #[Info(name: 'application/vnd.pagerduty+json', category: Category::APPLICATION)]
    case APPLICATION_VND_PAGERDUTY_JSON = 'application/vnd.pagerduty+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.palm
     */
    #[Info(name: 'application/vnd.palm', category: Category::APPLICATION)]
    case APPLICATION_VND_PALM = 'application/vnd.palm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.panoply
     */
    #[Info(name: 'application/vnd.panoply', category: Category::APPLICATION)]
    case APPLICATION_VND_PANOPLY = 'application/vnd.panoply';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.paos.xml
     */
    #[Info(name: 'application/vnd.paos.xml', category: Category::APPLICATION)]
    case APPLICATION_VND_PAOS_XML = 'application/vnd.paos.xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.patentdive
     */
    #[Info(name: 'application/vnd.patentdive', category: Category::APPLICATION)]
    case APPLICATION_VND_PATENTDIVE = 'application/vnd.patentdive';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.patientecommsdoc
     */
    #[Info(name: 'application/vnd.patientecommsdoc', category: Category::APPLICATION)]
    case APPLICATION_VND_PATIENTECOMMSDOC = 'application/vnd.patientecommsdoc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pawaafile
     */
    #[Info(name: 'application/vnd.pawaafile', category: Category::APPLICATION)]
    case APPLICATION_VND_PAWAAFILE = 'application/vnd.pawaafile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pcos
     */
    #[Info(name: 'application/vnd.pcos', category: Category::APPLICATION)]
    case APPLICATION_VND_PCOS = 'application/vnd.pcos';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pg.format
     */
    #[Info(name: 'application/vnd.pg.format', category: Category::APPLICATION)]
    case APPLICATION_VND_PG_FORMAT = 'application/vnd.pg.format';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pg.osasli
     */
    #[Info(name: 'application/vnd.pg.osasli', category: Category::APPLICATION)]
    case APPLICATION_VND_PG_OSASLI = 'application/vnd.pg.osasli';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.piaccess.application-licence
     */
    #[Info(name: 'application/vnd.piaccess.application-licence', category: Category::APPLICATION)]
    case APPLICATION_VND_PIACCESS_APPLICATION_LICENCE = 'application/vnd.piaccess.application-licence';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.picsel
     */
    #[Info(name: 'application/vnd.picsel', category: Category::APPLICATION)]
    case APPLICATION_VND_PICSEL = 'application/vnd.picsel';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pmi.widget
     */
    #[Info(name: 'application/vnd.pmi.widget', category: Category::APPLICATION)]
    case APPLICATION_VND_PMI_WIDGET = 'application/vnd.pmi.widget';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.poc.group-advertisement+xml
     */
    #[Info(name: 'application/vnd.poc.group-advertisement+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_POC_GROUP_ADVERTISEMENT_XML = 'application/vnd.poc.group-advertisement+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pocketlearn
     */
    #[Info(name: 'application/vnd.pocketlearn', category: Category::APPLICATION)]
    case APPLICATION_VND_POCKETLEARN = 'application/vnd.pocketlearn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.powerbuilder6
     */
    #[Info(name: 'application/vnd.powerbuilder6', category: Category::APPLICATION)]
    case APPLICATION_VND_POWERBUILDER6 = 'application/vnd.powerbuilder6';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.powerbuilder6-s
     */
    #[Info(name: 'application/vnd.powerbuilder6-s', category: Category::APPLICATION)]
    case APPLICATION_VND_POWERBUILDER6_S = 'application/vnd.powerbuilder6-s';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.powerbuilder7
     */
    #[Info(name: 'application/vnd.powerbuilder7', category: Category::APPLICATION)]
    case APPLICATION_VND_POWERBUILDER7 = 'application/vnd.powerbuilder7';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.powerbuilder75
     */
    #[Info(name: 'application/vnd.powerbuilder75', category: Category::APPLICATION)]
    case APPLICATION_VND_POWERBUILDER75 = 'application/vnd.powerbuilder75';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.powerbuilder75-s
     */
    #[Info(name: 'application/vnd.powerbuilder75-s', category: Category::APPLICATION)]
    case APPLICATION_VND_POWERBUILDER75_S = 'application/vnd.powerbuilder75-s';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.powerbuilder7-s
     */
    #[Info(name: 'application/vnd.powerbuilder7-s', category: Category::APPLICATION)]
    case APPLICATION_VND_POWERBUILDER7_S = 'application/vnd.powerbuilder7-s';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.preminet
     */
    #[Info(name: 'application/vnd.preminet', category: Category::APPLICATION)]
    case APPLICATION_VND_PREMINET = 'application/vnd.preminet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.previewsystems.box
     */
    #[Info(name: 'application/vnd.previewsystems.box', category: Category::APPLICATION)]
    case APPLICATION_VND_PREVIEWSYSTEMS_BOX = 'application/vnd.previewsystems.box';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.proteus.magazine
     */
    #[Info(name: 'application/vnd.proteus.magazine', category: Category::APPLICATION)]
    case APPLICATION_VND_PROTEUS_MAGAZINE = 'application/vnd.proteus.magazine';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.psfs
     */
    #[Info(name: 'application/vnd.psfs', category: Category::APPLICATION)]
    case APPLICATION_VND_PSFS = 'application/vnd.psfs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.publishare-delta-tree
     */
    #[Info(name: 'application/vnd.publishare-delta-tree', category: Category::APPLICATION)]
    case APPLICATION_VND_PUBLISHARE_DELTA_TREE = 'application/vnd.publishare-delta-tree';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pvi.ptid1
     */
    #[Info(name: 'application/vnd.pvi.ptid1', category: Category::APPLICATION)]
    case APPLICATION_VND_PVI_PTID1 = 'application/vnd.pvi.ptid1';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pwg-multiplexed
     */
    #[Info(name: 'application/vnd.pwg-multiplexed', category: Category::APPLICATION)]
    case APPLICATION_VND_PWG_MULTIPLEXED = 'application/vnd.pwg-multiplexed';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.pwg-xhtml-print+xml
     */
    #[Info(name: 'application/vnd.pwg-xhtml-print+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_PWG_XHTML_PRINT_XML = 'application/vnd.pwg-xhtml-print+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.qualcomm.brew-app-res
     */
    #[Info(name: 'application/vnd.qualcomm.brew-app-res', category: Category::APPLICATION)]
    case APPLICATION_VND_QUALCOMM_BREW_APP_RES = 'application/vnd.qualcomm.brew-app-res';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.quarantainenet
     */
    #[Info(name: 'application/vnd.quarantainenet', category: Category::APPLICATION)]
    case APPLICATION_VND_QUARANTAINENET = 'application/vnd.quarantainenet';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.Quark.QuarkXPress
     */
    #[Info(name: 'application/vnd.Quark.QuarkXPress', category: Category::APPLICATION)]
    case APPLICATION_VND_QUARK_QUARKXPRESS = 'application/vnd.quark.quarkxpress';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.quobject-quoxdocument
     */
    #[Info(name: 'application/vnd.quobject-quoxdocument', category: Category::APPLICATION)]
    case APPLICATION_VND_QUOBJECT_QUOXDOCUMENT = 'application/vnd.quobject-quoxdocument';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.moml+xml
     */
    #[Info(name: 'application/vnd.radisys.moml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MOML_XML = 'application/vnd.radisys.moml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-audit-conf+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-audit-conf+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_AUDIT_CONF_XML = 'application/vnd.radisys.msml-audit-conf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-audit-conn+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-audit-conn+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_AUDIT_CONN_XML = 'application/vnd.radisys.msml-audit-conn+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-audit-dialog+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-audit-dialog+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_AUDIT_DIALOG_XML = 'application/vnd.radisys.msml-audit-dialog+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-audit-stream+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-audit-stream+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_AUDIT_STREAM_XML = 'application/vnd.radisys.msml-audit-stream+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-audit+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-audit+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_AUDIT_XML = 'application/vnd.radisys.msml-audit+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-conf+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-conf+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_CONF_XML = 'application/vnd.radisys.msml-conf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog-base+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog-base+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_BASE_XML = 'application/vnd.radisys.msml-dialog-base+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog-fax-detect+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog-fax-detect+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_FAX_DETECT_XML = 'application/vnd.radisys.msml-dialog-fax-detect+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog-fax-sendrecv+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog-fax-sendrecv+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_FAX_SENDRECV_XML = 'application/vnd.radisys.msml-dialog-fax-sendrecv+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog-group+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog-group+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_GROUP_XML = 'application/vnd.radisys.msml-dialog-group+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog-speech+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog-speech+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_SPEECH_XML = 'application/vnd.radisys.msml-dialog-speech+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog-transform+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog-transform+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_TRANSFORM_XML = 'application/vnd.radisys.msml-dialog-transform+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml-dialog+xml
     */
    #[Info(name: 'application/vnd.radisys.msml-dialog+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_DIALOG_XML = 'application/vnd.radisys.msml-dialog+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.radisys.msml+xml
     */
    #[Info(name: 'application/vnd.radisys.msml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RADISYS_MSML_XML = 'application/vnd.radisys.msml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.rainstor.data
     */
    #[Info(name: 'application/vnd.rainstor.data', category: Category::APPLICATION)]
    case APPLICATION_VND_RAINSTOR_DATA = 'application/vnd.rainstor.data';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.rapid
     */
    #[Info(name: 'application/vnd.rapid', category: Category::APPLICATION)]
    case APPLICATION_VND_RAPID = 'application/vnd.rapid';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.rar
     */
    #[Info(name: 'application/vnd.rar', category: Category::APPLICATION)]
    case APPLICATION_VND_RAR = 'application/vnd.rar';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.realvnc.bed
     */
    #[Info(name: 'application/vnd.realvnc.bed', category: Category::APPLICATION)]
    case APPLICATION_VND_REALVNC_BED = 'application/vnd.realvnc.bed';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.recordare.musicxml
     */
    #[Info(name: 'application/vnd.recordare.musicxml', category: Category::APPLICATION)]
    case APPLICATION_VND_RECORDARE_MUSICXML = 'application/vnd.recordare.musicxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.recordare.musicxml+xml
     */
    #[Info(name: 'application/vnd.recordare.musicxml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_RECORDARE_MUSICXML_XML = 'application/vnd.recordare.musicxml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.RenLearn.rlprint
     */
    #[Info(name: 'application/vnd.RenLearn.rlprint', category: Category::APPLICATION)]
    case APPLICATION_VND_RENLEARN_RLPRINT = 'application/vnd.renlearn.rlprint';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.resilient.logic
     */
    #[Info(name: 'application/vnd.resilient.logic', category: Category::APPLICATION)]
    case APPLICATION_VND_RESILIENT_LOGIC = 'application/vnd.resilient.logic';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.restful+json
     */
    #[Info(name: 'application/vnd.restful+json', category: Category::APPLICATION)]
    case APPLICATION_VND_RESTFUL_JSON = 'application/vnd.restful+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.rig.cryptonote
     */
    #[Info(name: 'application/vnd.rig.cryptonote', category: Category::APPLICATION)]
    case APPLICATION_VND_RIG_CRYPTONOTE = 'application/vnd.rig.cryptonote';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.route66.link66+xml
     */
    #[Info(name: 'application/vnd.route66.link66+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ROUTE66_LINK66_XML = 'application/vnd.route66.link66+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.rs-274x
     */
    #[Info(name: 'application/vnd.rs-274x', category: Category::APPLICATION)]
    case APPLICATION_VND_RS_274X = 'application/vnd.rs-274x';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ruckus.download
     */
    #[Info(name: 'application/vnd.ruckus.download', category: Category::APPLICATION)]
    case APPLICATION_VND_RUCKUS_DOWNLOAD = 'application/vnd.ruckus.download';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.s3sms
     */
    #[Info(name: 'application/vnd.s3sms', category: Category::APPLICATION)]
    case APPLICATION_VND_S3SMS = 'application/vnd.s3sms';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sailingtracker.track
     */
    #[Info(name: 'application/vnd.sailingtracker.track', category: Category::APPLICATION)]
    case APPLICATION_VND_SAILINGTRACKER_TRACK = 'application/vnd.sailingtracker.track';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sar
     */
    #[Info(name: 'application/vnd.sar', category: Category::APPLICATION)]
    case APPLICATION_VND_SAR = 'application/vnd.sar';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sbm.cid
     */
    #[Info(name: 'application/vnd.sbm.cid', category: Category::APPLICATION)]
    case APPLICATION_VND_SBM_CID = 'application/vnd.sbm.cid';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sbm.mid2
     */
    #[Info(name: 'application/vnd.sbm.mid2', category: Category::APPLICATION)]
    case APPLICATION_VND_SBM_MID2 = 'application/vnd.sbm.mid2';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.scribus
     */
    #[Info(name: 'application/vnd.scribus', category: Category::APPLICATION)]
    case APPLICATION_VND_SCRIBUS = 'application/vnd.scribus';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.3df
     */
    #[Info(name: 'application/vnd.sealed.3df', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_3DF = 'application/vnd.sealed.3df';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.csf
     */
    #[Info(name: 'application/vnd.sealed.csf', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_CSF = 'application/vnd.sealed.csf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.doc
     */
    #[Info(name: 'application/vnd.sealed.doc', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_DOC = 'application/vnd.sealed.doc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.eml
     */
    #[Info(name: 'application/vnd.sealed.eml', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_EML = 'application/vnd.sealed.eml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.mht
     */
    #[Info(name: 'application/vnd.sealed.mht', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_MHT = 'application/vnd.sealed.mht';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.net
     */
    #[Info(name: 'application/vnd.sealed.net', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_NET = 'application/vnd.sealed.net';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.ppt
     */
    #[Info(name: 'application/vnd.sealed.ppt', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_PPT = 'application/vnd.sealed.ppt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.tiff
     */
    #[Info(name: 'application/vnd.sealed.tiff', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_TIFF = 'application/vnd.sealed.tiff';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealed.xls
     */
    #[Info(name: 'application/vnd.sealed.xls', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALED_XLS = 'application/vnd.sealed.xls';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealedmedia.softseal.html
     */
    #[Info(name: 'application/vnd.sealedmedia.softseal.html', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALEDMEDIA_SOFTSEAL_HTML = 'application/vnd.sealedmedia.softseal.html';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sealedmedia.softseal.pdf
     */
    #[Info(name: 'application/vnd.sealedmedia.softseal.pdf', category: Category::APPLICATION)]
    case APPLICATION_VND_SEALEDMEDIA_SOFTSEAL_PDF = 'application/vnd.sealedmedia.softseal.pdf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.seemail
     */
    #[Info(name: 'application/vnd.seemail', category: Category::APPLICATION)]
    case APPLICATION_VND_SEEMAIL = 'application/vnd.seemail';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.seis+json
     */
    #[Info(name: 'application/vnd.seis+json', category: Category::APPLICATION)]
    case APPLICATION_VND_SEIS_JSON = 'application/vnd.seis+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sema
     */
    #[Info(name: 'application/vnd.sema', category: Category::APPLICATION)]
    case APPLICATION_VND_SEMA = 'application/vnd.sema';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.semd
     */
    #[Info(name: 'application/vnd.semd', category: Category::APPLICATION)]
    case APPLICATION_VND_SEMD = 'application/vnd.semd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.semf
     */
    #[Info(name: 'application/vnd.semf', category: Category::APPLICATION)]
    case APPLICATION_VND_SEMF = 'application/vnd.semf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shade-save-file
     */
    #[Info(name: 'application/vnd.shade-save-file', category: Category::APPLICATION)]
    case APPLICATION_VND_SHADE_SAVE_FILE = 'application/vnd.shade-save-file';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shana.informed.formdata
     */
    #[Info(name: 'application/vnd.shana.informed.formdata', category: Category::APPLICATION)]
    case APPLICATION_VND_SHANA_INFORMED_FORMDATA = 'application/vnd.shana.informed.formdata';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shana.informed.formtemplate
     */
    #[Info(name: 'application/vnd.shana.informed.formtemplate', category: Category::APPLICATION)]
    case APPLICATION_VND_SHANA_INFORMED_FORMTEMPLATE = 'application/vnd.shana.informed.formtemplate';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shana.informed.interchange
     */
    #[Info(name: 'application/vnd.shana.informed.interchange', category: Category::APPLICATION)]
    case APPLICATION_VND_SHANA_INFORMED_INTERCHANGE = 'application/vnd.shana.informed.interchange';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shana.informed.package
     */
    #[Info(name: 'application/vnd.shana.informed.package', category: Category::APPLICATION)]
    case APPLICATION_VND_SHANA_INFORMED_PACKAGE = 'application/vnd.shana.informed.package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shootproof+json
     */
    #[Info(name: 'application/vnd.shootproof+json', category: Category::APPLICATION)]
    case APPLICATION_VND_SHOOTPROOF_JSON = 'application/vnd.shootproof+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shopkick+json
     */
    #[Info(name: 'application/vnd.shopkick+json', category: Category::APPLICATION)]
    case APPLICATION_VND_SHOPKICK_JSON = 'application/vnd.shopkick+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shp
     */
    #[Info(name: 'application/vnd.shp', category: Category::APPLICATION)]
    case APPLICATION_VND_SHP = 'application/vnd.shp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.shx
     */
    #[Info(name: 'application/vnd.shx', category: Category::APPLICATION)]
    case APPLICATION_VND_SHX = 'application/vnd.shx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sigrok.session
     */
    #[Info(name: 'application/vnd.sigrok.session', category: Category::APPLICATION)]
    case APPLICATION_VND_SIGROK_SESSION = 'application/vnd.sigrok.session';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.SimTech-MindMapper
     */
    #[Info(name: 'application/vnd.SimTech-MindMapper', category: Category::APPLICATION)]
    case APPLICATION_VND_SIMTECH_MINDMAPPER = 'application/vnd.simtech-mindmapper';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.siren+json
     */
    #[Info(name: 'application/vnd.siren+json', category: Category::APPLICATION)]
    case APPLICATION_VND_SIREN_JSON = 'application/vnd.siren+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.smaf
     */
    #[Info(name: 'application/vnd.smaf', category: Category::APPLICATION)]
    case APPLICATION_VND_SMAF = 'application/vnd.smaf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.smart.notebook
     */
    #[Info(name: 'application/vnd.smart.notebook', category: Category::APPLICATION)]
    case APPLICATION_VND_SMART_NOTEBOOK = 'application/vnd.smart.notebook';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.smart.teacher
     */
    #[Info(name: 'application/vnd.smart.teacher', category: Category::APPLICATION)]
    case APPLICATION_VND_SMART_TEACHER = 'application/vnd.smart.teacher';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.snesdev-page-table
     */
    #[Info(name: 'application/vnd.snesdev-page-table', category: Category::APPLICATION)]
    case APPLICATION_VND_SNESDEV_PAGE_TABLE = 'application/vnd.snesdev-page-table';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.software602.filler.form+xml
     */
    #[Info(name: 'application/vnd.software602.filler.form+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SOFTWARE602_FILLER_FORM_XML = 'application/vnd.software602.filler.form+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.software602.filler.form-xml-zip
     */
    #[Info(name: 'application/vnd.software602.filler.form-xml-zip', category: Category::APPLICATION)]
    case APPLICATION_VND_SOFTWARE602_FILLER_FORM_XML_ZIP = 'application/vnd.software602.filler.form-xml-zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.solent.sdkm+xml
     */
    #[Info(name: 'application/vnd.solent.sdkm+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SOLENT_SDKM_XML = 'application/vnd.solent.sdkm+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.spotfire.dxp
     */
    #[Info(name: 'application/vnd.spotfire.dxp', category: Category::APPLICATION)]
    case APPLICATION_VND_SPOTFIRE_DXP = 'application/vnd.spotfire.dxp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.spotfire.sfs
     */
    #[Info(name: 'application/vnd.spotfire.sfs', category: Category::APPLICATION)]
    case APPLICATION_VND_SPOTFIRE_SFS = 'application/vnd.spotfire.sfs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sqlite3
     */
    #[Info(name: 'application/vnd.sqlite3', category: Category::APPLICATION)]
    case APPLICATION_VND_SQLITE3 = 'application/vnd.sqlite3';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sss-cod
     */
    #[Info(name: 'application/vnd.sss-cod', category: Category::APPLICATION)]
    case APPLICATION_VND_SSS_COD = 'application/vnd.sss-cod';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sss-dtf
     */
    #[Info(name: 'application/vnd.sss-dtf', category: Category::APPLICATION)]
    case APPLICATION_VND_SSS_DTF = 'application/vnd.sss-dtf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sss-ntf
     */
    #[Info(name: 'application/vnd.sss-ntf', category: Category::APPLICATION)]
    case APPLICATION_VND_SSS_NTF = 'application/vnd.sss-ntf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.stepmania.package
     */
    #[Info(name: 'application/vnd.stepmania.package', category: Category::APPLICATION)]
    case APPLICATION_VND_STEPMANIA_PACKAGE = 'application/vnd.stepmania.package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.stepmania.stepchart
     */
    #[Info(name: 'application/vnd.stepmania.stepchart', category: Category::APPLICATION)]
    case APPLICATION_VND_STEPMANIA_STEPCHART = 'application/vnd.stepmania.stepchart';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.street-stream
     */
    #[Info(name: 'application/vnd.street-stream', category: Category::APPLICATION)]
    case APPLICATION_VND_STREET_STREAM = 'application/vnd.street-stream';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sun.wadl+xml
     */
    #[Info(name: 'application/vnd.sun.wadl+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SUN_WADL_XML = 'application/vnd.sun.wadl+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sus-calendar
     */
    #[Info(name: 'application/vnd.sus-calendar', category: Category::APPLICATION)]
    case APPLICATION_VND_SUS_CALENDAR = 'application/vnd.sus-calendar';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.svd
     */
    #[Info(name: 'application/vnd.svd', category: Category::APPLICATION)]
    case APPLICATION_VND_SVD = 'application/vnd.svd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.swiftview-ics
     */
    #[Info(name: 'application/vnd.swiftview-ics', category: Category::APPLICATION)]
    case APPLICATION_VND_SWIFTVIEW_ICS = 'application/vnd.swiftview-ics';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.sycle+xml
     */
    #[Info(name: 'application/vnd.sycle+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYCLE_XML = 'application/vnd.sycle+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syft+json
     */
    #[Info(name: 'application/vnd.syft+json', category: Category::APPLICATION)]
    case APPLICATION_VND_SYFT_JSON = 'application/vnd.syft+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dm.notification
     */
    #[Info(name: 'application/vnd.syncml.dm.notification', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DM_NOTIFICATION = 'application/vnd.syncml.dm.notification';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dmddf+xml
     */
    #[Info(name: 'application/vnd.syncml.dmddf+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DMDDF_XML = 'application/vnd.syncml.dmddf+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dmtnds+wbxml
     */
    #[Info(name: 'application/vnd.syncml.dmtnds+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DMTNDS_WBXML = 'application/vnd.syncml.dmtnds+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dmtnds+xml
     */
    #[Info(name: 'application/vnd.syncml.dmtnds+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DMTNDS_XML = 'application/vnd.syncml.dmtnds+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dmddf+wbxml
     */
    #[Info(name: 'application/vnd.syncml.dmddf+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DMDDF_WBXML = 'application/vnd.syncml.dmddf+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dm+wbxml
     */
    #[Info(name: 'application/vnd.syncml.dm+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DM_WBXML = 'application/vnd.syncml.dm+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.dm+xml
     */
    #[Info(name: 'application/vnd.syncml.dm+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DM_XML = 'application/vnd.syncml.dm+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml.ds.notification
     */
    #[Info(name: 'application/vnd.syncml.ds.notification', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_DS_NOTIFICATION = 'application/vnd.syncml.ds.notification';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.syncml+xml
     */
    #[Info(name: 'application/vnd.syncml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_SYNCML_XML = 'application/vnd.syncml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tableschema+json
     */
    #[Info(name: 'application/vnd.tableschema+json', category: Category::APPLICATION)]
    case APPLICATION_VND_TABLESCHEMA_JSON = 'application/vnd.tableschema+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tao.intent-module-archive
     */
    #[Info(name: 'application/vnd.tao.intent-module-archive', category: Category::APPLICATION)]
    case APPLICATION_VND_TAO_INTENT_MODULE_ARCHIVE = 'application/vnd.tao.intent-module-archive';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tcpdump.pcap
     */
    #[Info(name: 'application/vnd.tcpdump.pcap', category: Category::APPLICATION)]
    case APPLICATION_VND_TCPDUMP_PCAP = 'application/vnd.tcpdump.pcap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.think-cell.ppttc+json
     */
    #[Info(name: 'application/vnd.think-cell.ppttc+json', category: Category::APPLICATION)]
    case APPLICATION_VND_THINK_CELL_PPTTC_JSON = 'application/vnd.think-cell.ppttc+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tml
     */
    #[Info(name: 'application/vnd.tml', category: Category::APPLICATION)]
    case APPLICATION_VND_TML = 'application/vnd.tml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tmd.mediaflex.api+xml
     */
    #[Info(name: 'application/vnd.tmd.mediaflex.api+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_TMD_MEDIAFLEX_API_XML = 'application/vnd.tmd.mediaflex.api+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tmobile-livetv
     */
    #[Info(name: 'application/vnd.tmobile-livetv', category: Category::APPLICATION)]
    case APPLICATION_VND_TMOBILE_LIVETV = 'application/vnd.tmobile-livetv';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.tri.onesource
     */
    #[Info(name: 'application/vnd.tri.onesource', category: Category::APPLICATION)]
    case APPLICATION_VND_TRI_ONESOURCE = 'application/vnd.tri.onesource';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.trid.tpt
     */
    #[Info(name: 'application/vnd.trid.tpt', category: Category::APPLICATION)]
    case APPLICATION_VND_TRID_TPT = 'application/vnd.trid.tpt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.triscape.mxs
     */
    #[Info(name: 'application/vnd.triscape.mxs', category: Category::APPLICATION)]
    case APPLICATION_VND_TRISCAPE_MXS = 'application/vnd.triscape.mxs';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.trueapp
     */
    #[Info(name: 'application/vnd.trueapp', category: Category::APPLICATION)]
    case APPLICATION_VND_TRUEAPP = 'application/vnd.trueapp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.truedoc
     */
    #[Info(name: 'application/vnd.truedoc', category: Category::APPLICATION)]
    case APPLICATION_VND_TRUEDOC = 'application/vnd.truedoc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ubisoft.webplayer
     */
    #[Info(name: 'application/vnd.ubisoft.webplayer', category: Category::APPLICATION)]
    case APPLICATION_VND_UBISOFT_WEBPLAYER = 'application/vnd.ubisoft.webplayer';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ufdl
     */
    #[Info(name: 'application/vnd.ufdl', category: Category::APPLICATION)]
    case APPLICATION_VND_UFDL = 'application/vnd.ufdl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uiq.theme
     */
    #[Info(name: 'application/vnd.uiq.theme', category: Category::APPLICATION)]
    case APPLICATION_VND_UIQ_THEME = 'application/vnd.uiq.theme';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.umajin
     */
    #[Info(name: 'application/vnd.umajin', category: Category::APPLICATION)]
    case APPLICATION_VND_UMAJIN = 'application/vnd.umajin';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.unity
     */
    #[Info(name: 'application/vnd.unity', category: Category::APPLICATION)]
    case APPLICATION_VND_UNITY = 'application/vnd.unity';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uoml+xml
     */
    #[Info(name: 'application/vnd.uoml+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_UOML_XML = 'application/vnd.uoml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.alert
     */
    #[Info(name: 'application/vnd.uplanet.alert', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_ALERT = 'application/vnd.uplanet.alert';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.alert-wbxml
     */
    #[Info(name: 'application/vnd.uplanet.alert-wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_ALERT_WBXML = 'application/vnd.uplanet.alert-wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.bearer-choice
     */
    #[Info(name: 'application/vnd.uplanet.bearer-choice', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_BEARER_CHOICE = 'application/vnd.uplanet.bearer-choice';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.bearer-choice-wbxml
     */
    #[Info(name: 'application/vnd.uplanet.bearer-choice-wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_BEARER_CHOICE_WBXML = 'application/vnd.uplanet.bearer-choice-wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.cacheop
     */
    #[Info(name: 'application/vnd.uplanet.cacheop', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_CACHEOP = 'application/vnd.uplanet.cacheop';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.cacheop-wbxml
     */
    #[Info(name: 'application/vnd.uplanet.cacheop-wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_CACHEOP_WBXML = 'application/vnd.uplanet.cacheop-wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.channel
     */
    #[Info(name: 'application/vnd.uplanet.channel', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_CHANNEL = 'application/vnd.uplanet.channel';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.channel-wbxml
     */
    #[Info(name: 'application/vnd.uplanet.channel-wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_CHANNEL_WBXML = 'application/vnd.uplanet.channel-wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.list
     */
    #[Info(name: 'application/vnd.uplanet.list', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_LIST = 'application/vnd.uplanet.list';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.listcmd
     */
    #[Info(name: 'application/vnd.uplanet.listcmd', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_LISTCMD = 'application/vnd.uplanet.listcmd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.listcmd-wbxml
     */
    #[Info(name: 'application/vnd.uplanet.listcmd-wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_LISTCMD_WBXML = 'application/vnd.uplanet.listcmd-wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.list-wbxml
     */
    #[Info(name: 'application/vnd.uplanet.list-wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_LIST_WBXML = 'application/vnd.uplanet.list-wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uri-map
     */
    #[Info(name: 'application/vnd.uri-map', category: Category::APPLICATION)]
    case APPLICATION_VND_URI_MAP = 'application/vnd.uri-map';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.uplanet.signal
     */
    #[Info(name: 'application/vnd.uplanet.signal', category: Category::APPLICATION)]
    case APPLICATION_VND_UPLANET_SIGNAL = 'application/vnd.uplanet.signal';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.valve.source.material
     */
    #[Info(name: 'application/vnd.valve.source.material', category: Category::APPLICATION)]
    case APPLICATION_VND_VALVE_SOURCE_MATERIAL = 'application/vnd.valve.source.material';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vcx
     */
    #[Info(name: 'application/vnd.vcx', category: Category::APPLICATION)]
    case APPLICATION_VND_VCX = 'application/vnd.vcx';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vd-study
     */
    #[Info(name: 'application/vnd.vd-study', category: Category::APPLICATION)]
    case APPLICATION_VND_VD_STUDY = 'application/vnd.vd-study';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vectorworks
     */
    #[Info(name: 'application/vnd.vectorworks', category: Category::APPLICATION)]
    case APPLICATION_VND_VECTORWORKS = 'application/vnd.vectorworks';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vel+json
     */
    #[Info(name: 'application/vnd.vel+json', category: Category::APPLICATION)]
    case APPLICATION_VND_VEL_JSON = 'application/vnd.vel+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.verimatrix.vcas
     */
    #[Info(name: 'application/vnd.verimatrix.vcas', category: Category::APPLICATION)]
    case APPLICATION_VND_VERIMATRIX_VCAS = 'application/vnd.verimatrix.vcas';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.veritone.aion+json
     */
    #[Info(name: 'application/vnd.veritone.aion+json', category: Category::APPLICATION)]
    case APPLICATION_VND_VERITONE_AION_JSON = 'application/vnd.veritone.aion+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.veryant.thin
     */
    #[Info(name: 'application/vnd.veryant.thin', category: Category::APPLICATION)]
    case APPLICATION_VND_VERYANT_THIN = 'application/vnd.veryant.thin';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.ves.encrypted
     */
    #[Info(name: 'application/vnd.ves.encrypted', category: Category::APPLICATION)]
    case APPLICATION_VND_VES_ENCRYPTED = 'application/vnd.ves.encrypted';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vidsoft.vidconference
     */
    #[Info(name: 'application/vnd.vidsoft.vidconference', category: Category::APPLICATION)]
    case APPLICATION_VND_VIDSOFT_VIDCONFERENCE = 'application/vnd.vidsoft.vidconference';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.visio
     */
    #[Info(name: 'application/vnd.visio', category: Category::APPLICATION)]
    case APPLICATION_VND_VISIO = 'application/vnd.visio';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.visionary
     */
    #[Info(name: 'application/vnd.visionary', category: Category::APPLICATION)]
    case APPLICATION_VND_VISIONARY = 'application/vnd.visionary';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vividence.scriptfile
     */
    #[Info(name: 'application/vnd.vividence.scriptfile', category: Category::APPLICATION)]
    case APPLICATION_VND_VIVIDENCE_SCRIPTFILE = 'application/vnd.vividence.scriptfile';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.vsf
     */
    #[Info(name: 'application/vnd.vsf', category: Category::APPLICATION)]
    case APPLICATION_VND_VSF = 'application/vnd.vsf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wap.sic
     */
    #[Info(name: 'application/vnd.wap.sic', category: Category::APPLICATION)]
    case APPLICATION_VND_WAP_SIC = 'application/vnd.wap.sic';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wap.slc
     */
    #[Info(name: 'application/vnd.wap.slc', category: Category::APPLICATION)]
    case APPLICATION_VND_WAP_SLC = 'application/vnd.wap.slc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wap.wbxml
     */
    #[Info(name: 'application/vnd.wap.wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_WAP_WBXML = 'application/vnd.wap.wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wap.wmlc
     */
    #[Info(name: 'application/vnd.wap.wmlc', category: Category::APPLICATION)]
    case APPLICATION_VND_WAP_WMLC = 'application/vnd.wap.wmlc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wap.wmlscriptc
     */
    #[Info(name: 'application/vnd.wap.wmlscriptc', category: Category::APPLICATION)]
    case APPLICATION_VND_WAP_WMLSCRIPTC = 'application/vnd.wap.wmlscriptc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.webturbo
     */
    #[Info(name: 'application/vnd.webturbo', category: Category::APPLICATION)]
    case APPLICATION_VND_WEBTURBO = 'application/vnd.webturbo';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wfa.dpp
     */
    #[Info(name: 'application/vnd.wfa.dpp', category: Category::APPLICATION)]
    case APPLICATION_VND_WFA_DPP = 'application/vnd.wfa.dpp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wfa.p2p
     */
    #[Info(name: 'application/vnd.wfa.p2p', category: Category::APPLICATION)]
    case APPLICATION_VND_WFA_P2P = 'application/vnd.wfa.p2p';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wfa.wsc
     */
    #[Info(name: 'application/vnd.wfa.wsc', category: Category::APPLICATION)]
    case APPLICATION_VND_WFA_WSC = 'application/vnd.wfa.wsc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.windows.devicepairing
     */
    #[Info(name: 'application/vnd.windows.devicepairing', category: Category::APPLICATION)]
    case APPLICATION_VND_WINDOWS_DEVICEPAIRING = 'application/vnd.windows.devicepairing';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wmc
     */
    #[Info(name: 'application/vnd.wmc', category: Category::APPLICATION)]
    case APPLICATION_VND_WMC = 'application/vnd.wmc';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wmf.bootstrap
     */
    #[Info(name: 'application/vnd.wmf.bootstrap', category: Category::APPLICATION)]
    case APPLICATION_VND_WMF_BOOTSTRAP = 'application/vnd.wmf.bootstrap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wolfram.mathematica
     */
    #[Info(name: 'application/vnd.wolfram.mathematica', category: Category::APPLICATION)]
    case APPLICATION_VND_WOLFRAM_MATHEMATICA = 'application/vnd.wolfram.mathematica';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wolfram.mathematica.package
     */
    #[Info(name: 'application/vnd.wolfram.mathematica.package', category: Category::APPLICATION)]
    case APPLICATION_VND_WOLFRAM_MATHEMATICA_PACKAGE = 'application/vnd.wolfram.mathematica.package';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wolfram.player
     */
    #[Info(name: 'application/vnd.wolfram.player', category: Category::APPLICATION)]
    case APPLICATION_VND_WOLFRAM_PLAYER = 'application/vnd.wolfram.player';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wordperfect
     */
    #[Info(name: 'application/vnd.wordperfect', category: Category::APPLICATION)]
    case APPLICATION_VND_WORDPERFECT = 'application/vnd.wordperfect';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wqd
     */
    #[Info(name: 'application/vnd.wqd', category: Category::APPLICATION)]
    case APPLICATION_VND_WQD = 'application/vnd.wqd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wrq-hp3000-labelled
     */
    #[Info(name: 'application/vnd.wrq-hp3000-labelled', category: Category::APPLICATION)]
    case APPLICATION_VND_WRQ_HP3000_LABELLED = 'application/vnd.wrq-hp3000-labelled';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wt.stf
     */
    #[Info(name: 'application/vnd.wt.stf', category: Category::APPLICATION)]
    case APPLICATION_VND_WT_STF = 'application/vnd.wt.stf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wv.csp+xml
     */
    #[Info(name: 'application/vnd.wv.csp+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_WV_CSP_XML = 'application/vnd.wv.csp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wv.csp+wbxml
     */
    #[Info(name: 'application/vnd.wv.csp+wbxml', category: Category::APPLICATION)]
    case APPLICATION_VND_WV_CSP_WBXML = 'application/vnd.wv.csp+wbxml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.wv.ssp+xml
     */
    #[Info(name: 'application/vnd.wv.ssp+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_WV_SSP_XML = 'application/vnd.wv.ssp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xacml+json
     */
    #[Info(name: 'application/vnd.xacml+json', category: Category::APPLICATION)]
    case APPLICATION_VND_XACML_JSON = 'application/vnd.xacml+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xara
     */
    #[Info(name: 'application/vnd.xara', category: Category::APPLICATION)]
    case APPLICATION_VND_XARA = 'application/vnd.xara';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xfdl
     */
    #[Info(name: 'application/vnd.xfdl', category: Category::APPLICATION)]
    case APPLICATION_VND_XFDL = 'application/vnd.xfdl';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xfdl.webform
     */
    #[Info(name: 'application/vnd.xfdl.webform', category: Category::APPLICATION)]
    case APPLICATION_VND_XFDL_WEBFORM = 'application/vnd.xfdl.webform';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xmi+xml
     */
    #[Info(name: 'application/vnd.xmi+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_XMI_XML = 'application/vnd.xmi+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xmpie.cpkg
     */
    #[Info(name: 'application/vnd.xmpie.cpkg', category: Category::APPLICATION)]
    case APPLICATION_VND_XMPIE_CPKG = 'application/vnd.xmpie.cpkg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xmpie.dpkg
     */
    #[Info(name: 'application/vnd.xmpie.dpkg', category: Category::APPLICATION)]
    case APPLICATION_VND_XMPIE_DPKG = 'application/vnd.xmpie.dpkg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xmpie.plan
     */
    #[Info(name: 'application/vnd.xmpie.plan', category: Category::APPLICATION)]
    case APPLICATION_VND_XMPIE_PLAN = 'application/vnd.xmpie.plan';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xmpie.ppkg
     */
    #[Info(name: 'application/vnd.xmpie.ppkg', category: Category::APPLICATION)]
    case APPLICATION_VND_XMPIE_PPKG = 'application/vnd.xmpie.ppkg';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.xmpie.xlim
     */
    #[Info(name: 'application/vnd.xmpie.xlim', category: Category::APPLICATION)]
    case APPLICATION_VND_XMPIE_XLIM = 'application/vnd.xmpie.xlim';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.hv-dic
     */
    #[Info(name: 'application/vnd.yamaha.hv-dic', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_HV_DIC = 'application/vnd.yamaha.hv-dic';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.hv-script
     */
    #[Info(name: 'application/vnd.yamaha.hv-script', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_HV_SCRIPT = 'application/vnd.yamaha.hv-script';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.hv-voice
     */
    #[Info(name: 'application/vnd.yamaha.hv-voice', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_HV_VOICE = 'application/vnd.yamaha.hv-voice';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.openscoreformat.osfpvg+xml
     */
    #[Info(name: 'application/vnd.yamaha.openscoreformat.osfpvg+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_OPENSCOREFORMAT_OSFPVG_XML = 'application/vnd.yamaha.openscoreformat.osfpvg+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.openscoreformat
     */
    #[Info(name: 'application/vnd.yamaha.openscoreformat', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_OPENSCOREFORMAT = 'application/vnd.yamaha.openscoreformat';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.remote-setup
     */
    #[Info(name: 'application/vnd.yamaha.remote-setup', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_REMOTE_SETUP = 'application/vnd.yamaha.remote-setup';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.smaf-audio
     */
    #[Info(name: 'application/vnd.yamaha.smaf-audio', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_SMAF_AUDIO = 'application/vnd.yamaha.smaf-audio';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.smaf-phrase
     */
    #[Info(name: 'application/vnd.yamaha.smaf-phrase', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_SMAF_PHRASE = 'application/vnd.yamaha.smaf-phrase';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.through-ngn
     */
    #[Info(name: 'application/vnd.yamaha.through-ngn', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_THROUGH_NGN = 'application/vnd.yamaha.through-ngn';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yamaha.tunnel-udpencap
     */
    #[Info(name: 'application/vnd.yamaha.tunnel-udpencap', category: Category::APPLICATION)]
    case APPLICATION_VND_YAMAHA_TUNNEL_UDPENCAP = 'application/vnd.yamaha.tunnel-udpencap';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yaoweme
     */
    #[Info(name: 'application/vnd.yaoweme', category: Category::APPLICATION)]
    case APPLICATION_VND_YAOWEME = 'application/vnd.yaoweme';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.yellowriver-custom-menu
     */
    #[Info(name: 'application/vnd.yellowriver-custom-menu', category: Category::APPLICATION)]
    case APPLICATION_VND_YELLOWRIVER_CUSTOM_MENU = 'application/vnd.yellowriver-custom-menu';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.youtube.yt
     */
    #[Info(name: 'application/vnd.youtube.yt', category: Category::APPLICATION)]
    case APPLICATION_VND_YOUTUBE_YT = 'application/vnd.youtube.yt';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.zul
     */
    #[Info(name: 'application/vnd.zul', category: Category::APPLICATION)]
    case APPLICATION_VND_ZUL = 'application/vnd.zul';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vnd.zzazz.deck+xml
     */
    #[Info(name: 'application/vnd.zzazz.deck+xml', category: Category::APPLICATION)]
    case APPLICATION_VND_ZZAZZ_DECK_XML = 'application/vnd.zzazz.deck+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/voicexml+xml
     */
    #[Info(name: 'application/voicexml+xml', category: Category::APPLICATION)]
    case APPLICATION_VOICEXML_XML = 'application/voicexml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/voucher-cms+json
     */
    #[Info(name: 'application/voucher-cms+json', category: Category::APPLICATION)]
    case APPLICATION_VOUCHER_CMS_JSON = 'application/voucher-cms+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/vq-rtcpxr
     */
    #[Info(name: 'application/vq-rtcpxr', category: Category::APPLICATION)]
    case APPLICATION_VQ_RTCPXR = 'application/vq-rtcpxr';

    /**
     * @link https://www.iana.org/assignments/media-types/application/wasm
     */
    #[Info(name: 'application/wasm', category: Category::APPLICATION)]
    case APPLICATION_WASM = 'application/wasm';

    /**
     * @link https://www.iana.org/assignments/media-types/application/watcherinfo+xml
     */
    #[Info(name: 'application/watcherinfo+xml', category: Category::APPLICATION)]
    case APPLICATION_WATCHERINFO_XML = 'application/watcherinfo+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/webpush-options+json
     */
    #[Info(name: 'application/webpush-options+json', category: Category::APPLICATION)]
    case APPLICATION_WEBPUSH_OPTIONS_JSON = 'application/webpush-options+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/whoispp-query
     */
    #[Info(name: 'application/whoispp-query', category: Category::APPLICATION)]
    case APPLICATION_WHOISPP_QUERY = 'application/whoispp-query';

    /**
     * @link https://www.iana.org/assignments/media-types/application/whoispp-response
     */
    #[Info(name: 'application/whoispp-response', category: Category::APPLICATION)]
    case APPLICATION_WHOISPP_RESPONSE = 'application/whoispp-response';

    /**
     * @link https://www.iana.org/assignments/media-types/application/widget
     */
    #[Info(name: 'application/widget', category: Category::APPLICATION)]
    case APPLICATION_WIDGET = 'application/widget';

    /**
     * @link https://www.iana.org/assignments/media-types/application/wita
     */
    #[Info(name: 'application/wita', category: Category::APPLICATION)]
    case APPLICATION_WITA = 'application/wita';

    /**
     * @link https://www.iana.org/assignments/media-types/application/wordperfect5.1
     */
    #[Info(name: 'application/wordperfect5.1', category: Category::APPLICATION)]
    case APPLICATION_WORDPERFECT5_1 = 'application/wordperfect5.1';

    /**
     * @link https://www.iana.org/assignments/media-types/application/wsdl+xml
     */
    #[Info(name: 'application/wsdl+xml', category: Category::APPLICATION)]
    case APPLICATION_WSDL_XML = 'application/wsdl+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/wspolicy+xml
     */
    #[Info(name: 'application/wspolicy+xml', category: Category::APPLICATION)]
    case APPLICATION_WSPOLICY_XML = 'application/wspolicy+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/x-pki-message
     */
    #[Info(name: 'application/x-pki-message', category: Category::APPLICATION)]
    case APPLICATION_X_PKI_MESSAGE = 'application/x-pki-message';

    /**
     * @link https://www.iana.org/assignments/media-types/application/x-www-form-urlencoded
     */
    #[Info(name: 'application/x-www-form-urlencoded', category: Category::APPLICATION)]
    case APPLICATION_X_WWW_FORM_URLENCODED = 'application/x-www-form-urlencoded';

    /**
     * @link https://www.iana.org/assignments/media-types/application/x-x509-ca-cert
     */
    #[Info(name: 'application/x-x509-ca-cert', category: Category::APPLICATION)]
    case APPLICATION_X_X509_CA_CERT = 'application/x-x509-ca-cert';

    /**
     * @link https://www.iana.org/assignments/media-types/application/x-x509-ca-ra-cert
     */
    #[Info(name: 'application/x-x509-ca-ra-cert', category: Category::APPLICATION)]
    case APPLICATION_X_X509_CA_RA_CERT = 'application/x-x509-ca-ra-cert';

    /**
     * @link https://www.iana.org/assignments/media-types/application/x-x509-next-ca-cert
     */
    #[Info(name: 'application/x-x509-next-ca-cert', category: Category::APPLICATION)]
    case APPLICATION_X_X509_NEXT_CA_CERT = 'application/x-x509-next-ca-cert';

    /**
     * @link https://www.iana.org/assignments/media-types/application/x400-bp
     */
    #[Info(name: 'application/x400-bp', category: Category::APPLICATION)]
    case APPLICATION_X400_BP = 'application/x400-bp';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xacml+xml
     */
    #[Info(name: 'application/xacml+xml', category: Category::APPLICATION)]
    case APPLICATION_XACML_XML = 'application/xacml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcap-att+xml
     */
    #[Info(name: 'application/xcap-att+xml', category: Category::APPLICATION)]
    case APPLICATION_XCAP_ATT_XML = 'application/xcap-att+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcap-caps+xml
     */
    #[Info(name: 'application/xcap-caps+xml', category: Category::APPLICATION)]
    case APPLICATION_XCAP_CAPS_XML = 'application/xcap-caps+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcap-diff+xml
     */
    #[Info(name: 'application/xcap-diff+xml', category: Category::APPLICATION)]
    case APPLICATION_XCAP_DIFF_XML = 'application/xcap-diff+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcap-el+xml
     */
    #[Info(name: 'application/xcap-el+xml', category: Category::APPLICATION)]
    case APPLICATION_XCAP_EL_XML = 'application/xcap-el+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcap-error+xml
     */
    #[Info(name: 'application/xcap-error+xml', category: Category::APPLICATION)]
    case APPLICATION_XCAP_ERROR_XML = 'application/xcap-error+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcap-ns+xml
     */
    #[Info(name: 'application/xcap-ns+xml', category: Category::APPLICATION)]
    case APPLICATION_XCAP_NS_XML = 'application/xcap-ns+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcon-conference-info-diff+xml
     */
    #[Info(name: 'application/xcon-conference-info-diff+xml', category: Category::APPLICATION)]
    case APPLICATION_XCON_CONFERENCE_INFO_DIFF_XML = 'application/xcon-conference-info-diff+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xcon-conference-info+xml
     */
    #[Info(name: 'application/xcon-conference-info+xml', category: Category::APPLICATION)]
    case APPLICATION_XCON_CONFERENCE_INFO_XML = 'application/xcon-conference-info+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xenc+xml
     */
    #[Info(name: 'application/xenc+xml', category: Category::APPLICATION)]
    case APPLICATION_XENC_XML = 'application/xenc+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xfdf
     */
    #[Info(name: 'application/xfdf', category: Category::APPLICATION)]
    case APPLICATION_XFDF = 'application/xfdf';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xhtml+xml
     */
    #[Info(name: 'application/xhtml+xml', category: Category::APPLICATION)]
    case APPLICATION_XHTML_XML = 'application/xhtml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xliff+xml
     */
    #[Info(name: 'application/xliff+xml', category: Category::APPLICATION)]
    case APPLICATION_XLIFF_XML = 'application/xliff+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xml
     */
    #[Info(name: 'application/xml', category: Category::APPLICATION)]
    case APPLICATION_XML = 'application/xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xml-dtd
     */
    #[Info(name: 'application/xml-dtd', category: Category::APPLICATION)]
    case APPLICATION_XML_DTD = 'application/xml-dtd';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xml-external-parsed-entity
     */
    #[Info(name: 'application/xml-external-parsed-entity', category: Category::APPLICATION)]
    case APPLICATION_XML_EXTERNAL_PARSED_ENTITY = 'application/xml-external-parsed-entity';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xml-patch+xml
     */
    #[Info(name: 'application/xml-patch+xml', category: Category::APPLICATION)]
    case APPLICATION_XML_PATCH_XML = 'application/xml-patch+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xmpp+xml
     */
    #[Info(name: 'application/xmpp+xml', category: Category::APPLICATION)]
    case APPLICATION_XMPP_XML = 'application/xmpp+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xop+xml
     */
    #[Info(name: 'application/xop+xml', category: Category::APPLICATION)]
    case APPLICATION_XOP_XML = 'application/xop+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xslt+xml
     */
    #[Info(name: 'application/xslt+xml', category: Category::APPLICATION)]
    case APPLICATION_XSLT_XML = 'application/xslt+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/xv+xml
     */
    #[Info(name: 'application/xv+xml', category: Category::APPLICATION)]
    case APPLICATION_XV_XML = 'application/xv+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yang
     */
    #[Info(name: 'application/yang', category: Category::APPLICATION)]
    case APPLICATION_YANG = 'application/yang';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yang-data+cbor
     */
    #[Info(name: 'application/yang-data+cbor', category: Category::APPLICATION)]
    case APPLICATION_YANG_DATA_CBOR = 'application/yang-data+cbor';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yang-data+json
     */
    #[Info(name: 'application/yang-data+json', category: Category::APPLICATION)]
    case APPLICATION_YANG_DATA_JSON = 'application/yang-data+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yang-data+xml
     */
    #[Info(name: 'application/yang-data+xml', category: Category::APPLICATION)]
    case APPLICATION_YANG_DATA_XML = 'application/yang-data+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yang-patch+json
     */
    #[Info(name: 'application/yang-patch+json', category: Category::APPLICATION)]
    case APPLICATION_YANG_PATCH_JSON = 'application/yang-patch+json';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yang-patch+xml
     */
    #[Info(name: 'application/yang-patch+xml', category: Category::APPLICATION)]
    case APPLICATION_YANG_PATCH_XML = 'application/yang-patch+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/yin+xml
     */
    #[Info(name: 'application/yin+xml', category: Category::APPLICATION)]
    case APPLICATION_YIN_XML = 'application/yin+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/application/zip
     */
    #[Info(name: 'application/zip', category: Category::APPLICATION)]
    case APPLICATION_ZIP = 'application/zip';

    /**
     * @link https://www.iana.org/assignments/media-types/application/zlib
     */
    #[Info(name: 'application/zlib', category: Category::APPLICATION)]
    case APPLICATION_ZLIB = 'application/zlib';

    /**
     * @link https://www.iana.org/assignments/media-types/application/zstd
     */
    #[Info(name: 'application/zstd', category: Category::APPLICATION)]
    case APPLICATION_ZSTD = 'application/zstd';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/1d-interleaved-parityfec
     */
    #[Info(name: 'audio/1d-interleaved-parityfec', category: Category::AUDIO)]
    case AUDIO_1D_INTERLEAVED_PARITYFEC = 'audio/1d-interleaved-parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/32kadpcm
     */
    #[Info(name: 'audio/32kadpcm', category: Category::AUDIO)]
    case AUDIO_32KADPCM = 'audio/32kadpcm';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/3gpp
     */
    #[Info(name: 'audio/3gpp', category: Category::AUDIO)]
    case AUDIO_3GPP = 'audio/3gpp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/3gpp2
     */
    #[Info(name: 'audio/3gpp2', category: Category::AUDIO)]
    case AUDIO_3GPP2 = 'audio/3gpp2';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/aac
     */
    #[Info(name: 'audio/aac', category: Category::AUDIO)]
    case AUDIO_AAC = 'audio/aac';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ac3
     */
    #[Info(name: 'audio/ac3', category: Category::AUDIO)]
    case AUDIO_AC3 = 'audio/ac3';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/AMR
     */
    #[Info(name: 'audio/AMR', category: Category::AUDIO)]
    case AUDIO_AMR = 'audio/amr';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/AMR-WB
     */
    #[Info(name: 'audio/AMR-WB', category: Category::AUDIO)]
    case AUDIO_AMR_WB = 'audio/amr-wb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/amr-wb+
     */
    #[Info(name: 'audio/amr-wb+', category: Category::AUDIO)]
    case AUDIO_AMR_WB_ = 'audio/amr-wb+';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/aptx
     */
    #[Info(name: 'audio/aptx', category: Category::AUDIO)]
    case AUDIO_APTX = 'audio/aptx';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/asc
     */
    #[Info(name: 'audio/asc', category: Category::AUDIO)]
    case AUDIO_ASC = 'audio/asc';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ATRAC-ADVANCED-LOSSLESS
     */
    #[Info(name: 'audio/ATRAC-ADVANCED-LOSSLESS', category: Category::AUDIO)]
    case AUDIO_ATRAC_ADVANCED_LOSSLESS = 'audio/atrac-advanced-lossless';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ATRAC-X
     */
    #[Info(name: 'audio/ATRAC-X', category: Category::AUDIO)]
    case AUDIO_ATRAC_X = 'audio/atrac-x';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ATRAC3
     */
    #[Info(name: 'audio/ATRAC3', category: Category::AUDIO)]
    case AUDIO_ATRAC3 = 'audio/atrac3';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/basic
     */
    #[Info(name: 'audio/basic', category: Category::AUDIO)]
    case AUDIO_BASIC = 'audio/basic';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/BV16
     */
    #[Info(name: 'audio/BV16', category: Category::AUDIO)]
    case AUDIO_BV16 = 'audio/bv16';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/BV32
     */
    #[Info(name: 'audio/BV32', category: Category::AUDIO)]
    case AUDIO_BV32 = 'audio/bv32';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/clearmode
     */
    #[Info(name: 'audio/clearmode', category: Category::AUDIO)]
    case AUDIO_CLEARMODE = 'audio/clearmode';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/CN
     */
    #[Info(name: 'audio/CN', category: Category::AUDIO)]
    case AUDIO_CN = 'audio/cn';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/DAT12
     */
    #[Info(name: 'audio/DAT12', category: Category::AUDIO)]
    case AUDIO_DAT12 = 'audio/dat12';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/dls
     */
    #[Info(name: 'audio/dls', category: Category::AUDIO)]
    case AUDIO_DLS = 'audio/dls';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/dsr-es201108
     */
    #[Info(name: 'audio/dsr-es201108', category: Category::AUDIO)]
    case AUDIO_DSR_ES201108 = 'audio/dsr-es201108';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/dsr-es202050
     */
    #[Info(name: 'audio/dsr-es202050', category: Category::AUDIO)]
    case AUDIO_DSR_ES202050 = 'audio/dsr-es202050';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/dsr-es202211
     */
    #[Info(name: 'audio/dsr-es202211', category: Category::AUDIO)]
    case AUDIO_DSR_ES202211 = 'audio/dsr-es202211';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/dsr-es202212
     */
    #[Info(name: 'audio/dsr-es202212', category: Category::AUDIO)]
    case AUDIO_DSR_ES202212 = 'audio/dsr-es202212';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/DV
     */
    #[Info(name: 'audio/DV', category: Category::AUDIO)]
    case AUDIO_DV = 'audio/dv';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/DVI4
     */
    #[Info(name: 'audio/DVI4', category: Category::AUDIO)]
    case AUDIO_DVI4 = 'audio/dvi4';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/eac3
     */
    #[Info(name: 'audio/eac3', category: Category::AUDIO)]
    case AUDIO_EAC3 = 'audio/eac3';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/encaprtp
     */
    #[Info(name: 'audio/encaprtp', category: Category::AUDIO)]
    case AUDIO_ENCAPRTP = 'audio/encaprtp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRC
     */
    #[Info(name: 'audio/EVRC', category: Category::AUDIO)]
    case AUDIO_EVRC = 'audio/evrc';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRC-QCP
     */
    #[Info(name: 'audio/EVRC-QCP', category: Category::AUDIO)]
    case AUDIO_EVRC_QCP = 'audio/evrc-qcp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRC0
     */
    #[Info(name: 'audio/EVRC0', category: Category::AUDIO)]
    case AUDIO_EVRC0 = 'audio/evrc0';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRC1
     */
    #[Info(name: 'audio/EVRC1', category: Category::AUDIO)]
    case AUDIO_EVRC1 = 'audio/evrc1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCB
     */
    #[Info(name: 'audio/EVRCB', category: Category::AUDIO)]
    case AUDIO_EVRCB = 'audio/evrcb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCB0
     */
    #[Info(name: 'audio/EVRCB0', category: Category::AUDIO)]
    case AUDIO_EVRCB0 = 'audio/evrcb0';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCB1
     */
    #[Info(name: 'audio/EVRCB1', category: Category::AUDIO)]
    case AUDIO_EVRCB1 = 'audio/evrcb1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCNW
     */
    #[Info(name: 'audio/EVRCNW', category: Category::AUDIO)]
    case AUDIO_EVRCNW = 'audio/evrcnw';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCNW0
     */
    #[Info(name: 'audio/EVRCNW0', category: Category::AUDIO)]
    case AUDIO_EVRCNW0 = 'audio/evrcnw0';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCNW1
     */
    #[Info(name: 'audio/EVRCNW1', category: Category::AUDIO)]
    case AUDIO_EVRCNW1 = 'audio/evrcnw1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCWB
     */
    #[Info(name: 'audio/EVRCWB', category: Category::AUDIO)]
    case AUDIO_EVRCWB = 'audio/evrcwb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCWB0
     */
    #[Info(name: 'audio/EVRCWB0', category: Category::AUDIO)]
    case AUDIO_EVRCWB0 = 'audio/evrcwb0';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVRCWB1
     */
    #[Info(name: 'audio/EVRCWB1', category: Category::AUDIO)]
    case AUDIO_EVRCWB1 = 'audio/evrcwb1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/EVS
     */
    #[Info(name: 'audio/EVS', category: Category::AUDIO)]
    case AUDIO_EVS = 'audio/evs';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/example
     */
    #[Info(name: 'audio/example', category: Category::AUDIO)]
    case AUDIO_EXAMPLE = 'audio/example';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/flexfec
     */
    #[Info(name: 'audio/flexfec', category: Category::AUDIO)]
    case AUDIO_FLEXFEC = 'audio/flexfec';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/fwdred
     */
    #[Info(name: 'audio/fwdred', category: Category::AUDIO)]
    case AUDIO_FWDRED = 'audio/fwdred';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G711-0
     */
    #[Info(name: 'audio/G711-0', category: Category::AUDIO)]
    case AUDIO_G711_0 = 'audio/g711-0';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G719
     */
    #[Info(name: 'audio/G719', category: Category::AUDIO)]
    case AUDIO_G719 = 'audio/g719';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G7221
     */
    #[Info(name: 'audio/G7221', category: Category::AUDIO)]
    case AUDIO_G7221 = 'audio/g7221';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G722
     */
    #[Info(name: 'audio/G722', category: Category::AUDIO)]
    case AUDIO_G722 = 'audio/g722';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G723
     */
    #[Info(name: 'audio/G723', category: Category::AUDIO)]
    case AUDIO_G723 = 'audio/g723';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G726-16
     */
    #[Info(name: 'audio/G726-16', category: Category::AUDIO)]
    case AUDIO_G726_16 = 'audio/g726-16';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G726-24
     */
    #[Info(name: 'audio/G726-24', category: Category::AUDIO)]
    case AUDIO_G726_24 = 'audio/g726-24';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G726-32
     */
    #[Info(name: 'audio/G726-32', category: Category::AUDIO)]
    case AUDIO_G726_32 = 'audio/g726-32';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G726-40
     */
    #[Info(name: 'audio/G726-40', category: Category::AUDIO)]
    case AUDIO_G726_40 = 'audio/g726-40';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G728
     */
    #[Info(name: 'audio/G728', category: Category::AUDIO)]
    case AUDIO_G728 = 'audio/g728';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G729
     */
    #[Info(name: 'audio/G729', category: Category::AUDIO)]
    case AUDIO_G729 = 'audio/g729';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G7291
     */
    #[Info(name: 'audio/G7291', category: Category::AUDIO)]
    case AUDIO_G7291 = 'audio/g7291';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G729D
     */
    #[Info(name: 'audio/G729D', category: Category::AUDIO)]
    case AUDIO_G729D = 'audio/g729d';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/G729E
     */
    #[Info(name: 'audio/G729E', category: Category::AUDIO)]
    case AUDIO_G729E = 'audio/g729e';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/GSM
     */
    #[Info(name: 'audio/GSM', category: Category::AUDIO)]
    case AUDIO_GSM = 'audio/gsm';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/GSM-EFR
     */
    #[Info(name: 'audio/GSM-EFR', category: Category::AUDIO)]
    case AUDIO_GSM_EFR = 'audio/gsm-efr';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/GSM-HR-08
     */
    #[Info(name: 'audio/GSM-HR-08', category: Category::AUDIO)]
    case AUDIO_GSM_HR_08 = 'audio/gsm-hr-08';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/iLBC
     */
    #[Info(name: 'audio/iLBC', category: Category::AUDIO)]
    case AUDIO_ILBC = 'audio/ilbc';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ip-mr_v2.5
     */
    #[Info(name: 'audio/ip-mr_v2.5', category: Category::AUDIO)]
    case AUDIO_IP_MR_V2_5 = 'audio/ip-mr_v2.5';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/L8
     */
    #[Info(name: 'audio/L8', category: Category::AUDIO)]
    case AUDIO_L8 = 'audio/l8';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/L16
     */
    #[Info(name: 'audio/L16', category: Category::AUDIO)]
    case AUDIO_L16 = 'audio/l16';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/L20
     */
    #[Info(name: 'audio/L20', category: Category::AUDIO)]
    case AUDIO_L20 = 'audio/l20';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/L24
     */
    #[Info(name: 'audio/L24', category: Category::AUDIO)]
    case AUDIO_L24 = 'audio/l24';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/LPC
     */
    #[Info(name: 'audio/LPC', category: Category::AUDIO)]
    case AUDIO_LPC = 'audio/lpc';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/MELP
     */
    #[Info(name: 'audio/MELP', category: Category::AUDIO)]
    case AUDIO_MELP = 'audio/melp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/MELP600
     */
    #[Info(name: 'audio/MELP600', category: Category::AUDIO)]
    case AUDIO_MELP600 = 'audio/melp600';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/MELP1200
     */
    #[Info(name: 'audio/MELP1200', category: Category::AUDIO)]
    case AUDIO_MELP1200 = 'audio/melp1200';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/MELP2400
     */
    #[Info(name: 'audio/MELP2400', category: Category::AUDIO)]
    case AUDIO_MELP2400 = 'audio/melp2400';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/mhas
     */
    #[Info(name: 'audio/mhas', category: Category::AUDIO)]
    case AUDIO_MHAS = 'audio/mhas';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/mobile-xmf
     */
    #[Info(name: 'audio/mobile-xmf', category: Category::AUDIO)]
    case AUDIO_MOBILE_XMF = 'audio/mobile-xmf';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/MPA
     */
    #[Info(name: 'audio/MPA', category: Category::AUDIO)]
    case AUDIO_MPA = 'audio/mpa';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/mp4
     */
    #[Info(name: 'audio/mp4', category: Category::AUDIO)]
    case AUDIO_MP4 = 'audio/mp4';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/MP4A-LATM
     */
    #[Info(name: 'audio/MP4A-LATM', category: Category::AUDIO)]
    case AUDIO_MP4A_LATM = 'audio/mp4a-latm';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/mpa-robust
     */
    #[Info(name: 'audio/mpa-robust', category: Category::AUDIO)]
    case AUDIO_MPA_ROBUST = 'audio/mpa-robust';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/mpeg
     */
    #[Info(name: 'audio/mpeg', category: Category::AUDIO)]
    case AUDIO_MPEG = 'audio/mpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/mpeg4-generic
     */
    #[Info(name: 'audio/mpeg4-generic', category: Category::AUDIO)]
    case AUDIO_MPEG4_GENERIC = 'audio/mpeg4-generic';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ogg
     */
    #[Info(name: 'audio/ogg', category: Category::AUDIO)]
    case AUDIO_OGG = 'audio/ogg';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/opus
     */
    #[Info(name: 'audio/opus', category: Category::AUDIO)]
    case AUDIO_OPUS = 'audio/opus';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/parityfec
     */
    #[Info(name: 'audio/parityfec', category: Category::AUDIO)]
    case AUDIO_PARITYFEC = 'audio/parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/PCMA
     */
    #[Info(name: 'audio/PCMA', category: Category::AUDIO)]
    case AUDIO_PCMA = 'audio/pcma';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/PCMA-WB
     */
    #[Info(name: 'audio/PCMA-WB', category: Category::AUDIO)]
    case AUDIO_PCMA_WB = 'audio/pcma-wb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/PCMU
     */
    #[Info(name: 'audio/PCMU', category: Category::AUDIO)]
    case AUDIO_PCMU = 'audio/pcmu';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/PCMU-WB
     */
    #[Info(name: 'audio/PCMU-WB', category: Category::AUDIO)]
    case AUDIO_PCMU_WB = 'audio/pcmu-wb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/prs.sid
     */
    #[Info(name: 'audio/prs.sid', category: Category::AUDIO)]
    case AUDIO_PRS_SID = 'audio/prs.sid';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/QCELP
     */
    #[Info(name: 'audio/QCELP', category: Category::AUDIO)]
    case AUDIO_QCELP = 'audio/qcelp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/raptorfec
     */
    #[Info(name: 'audio/raptorfec', category: Category::AUDIO)]
    case AUDIO_RAPTORFEC = 'audio/raptorfec';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/RED
     */
    #[Info(name: 'audio/RED', category: Category::AUDIO)]
    case AUDIO_RED = 'audio/red';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/rtp-enc-aescm128
     */
    #[Info(name: 'audio/rtp-enc-aescm128', category: Category::AUDIO)]
    case AUDIO_RTP_ENC_AESCM128 = 'audio/rtp-enc-aescm128';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/rtploopback
     */
    #[Info(name: 'audio/rtploopback', category: Category::AUDIO)]
    case AUDIO_RTPLOOPBACK = 'audio/rtploopback';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/rtp-midi
     */
    #[Info(name: 'audio/rtp-midi', category: Category::AUDIO)]
    case AUDIO_RTP_MIDI = 'audio/rtp-midi';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/rtx
     */
    #[Info(name: 'audio/rtx', category: Category::AUDIO)]
    case AUDIO_RTX = 'audio/rtx';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/scip
     */
    #[Info(name: 'audio/scip', category: Category::AUDIO)]
    case AUDIO_SCIP = 'audio/scip';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/SMV
     */
    #[Info(name: 'audio/SMV', category: Category::AUDIO)]
    case AUDIO_SMV = 'audio/smv';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/SMV0
     */
    #[Info(name: 'audio/SMV0', category: Category::AUDIO)]
    case AUDIO_SMV0 = 'audio/smv0';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/SMV-QCP
     */
    #[Info(name: 'audio/SMV-QCP', category: Category::AUDIO)]
    case AUDIO_SMV_QCP = 'audio/smv-qcp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/sofa
     */
    #[Info(name: 'audio/sofa', category: Category::AUDIO)]
    case AUDIO_SOFA = 'audio/sofa';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/sp-midi
     */
    #[Info(name: 'audio/sp-midi', category: Category::AUDIO)]
    case AUDIO_SP_MIDI = 'audio/sp-midi';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/speex
     */
    #[Info(name: 'audio/speex', category: Category::AUDIO)]
    case AUDIO_SPEEX = 'audio/speex';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/t140c
     */
    #[Info(name: 'audio/t140c', category: Category::AUDIO)]
    case AUDIO_T140C = 'audio/t140c';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/t38
     */
    #[Info(name: 'audio/t38', category: Category::AUDIO)]
    case AUDIO_T38 = 'audio/t38';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/telephone-event
     */
    #[Info(name: 'audio/telephone-event', category: Category::AUDIO)]
    case AUDIO_TELEPHONE_EVENT = 'audio/telephone-event';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/TETRA_ACELP
     */
    #[Info(name: 'audio/TETRA_ACELP', category: Category::AUDIO)]
    case AUDIO_TETRA_ACELP = 'audio/tetra_acelp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/TETRA_ACELP_BB
     */
    #[Info(name: 'audio/TETRA_ACELP_BB', category: Category::AUDIO)]
    case AUDIO_TETRA_ACELP_BB = 'audio/tetra_acelp_bb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/tone
     */
    #[Info(name: 'audio/tone', category: Category::AUDIO)]
    case AUDIO_TONE = 'audio/tone';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/TSVCIS
     */
    #[Info(name: 'audio/TSVCIS', category: Category::AUDIO)]
    case AUDIO_TSVCIS = 'audio/tsvcis';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/UEMCLIP
     */
    #[Info(name: 'audio/UEMCLIP', category: Category::AUDIO)]
    case AUDIO_UEMCLIP = 'audio/uemclip';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/ulpfec
     */
    #[Info(name: 'audio/ulpfec', category: Category::AUDIO)]
    case AUDIO_ULPFEC = 'audio/ulpfec';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/usac
     */
    #[Info(name: 'audio/usac', category: Category::AUDIO)]
    case AUDIO_USAC = 'audio/usac';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/VDVI
     */
    #[Info(name: 'audio/VDVI', category: Category::AUDIO)]
    case AUDIO_VDVI = 'audio/vdvi';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/VMR-WB
     */
    #[Info(name: 'audio/VMR-WB', category: Category::AUDIO)]
    case AUDIO_VMR_WB = 'audio/vmr-wb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.3gpp.iufp
     */
    #[Info(name: 'audio/vnd.3gpp.iufp', category: Category::AUDIO)]
    case AUDIO_VND_3GPP_IUFP = 'audio/vnd.3gpp.iufp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.4SB
     */
    #[Info(name: 'audio/vnd.4SB', category: Category::AUDIO)]
    case AUDIO_VND_4SB = 'audio/vnd.4sb';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.audiokoz
     */
    #[Info(name: 'audio/vnd.audiokoz', category: Category::AUDIO)]
    case AUDIO_VND_AUDIOKOZ = 'audio/vnd.audiokoz';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.CELP
     */
    #[Info(name: 'audio/vnd.CELP', category: Category::AUDIO)]
    case AUDIO_VND_CELP = 'audio/vnd.celp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.cisco.nse
     */
    #[Info(name: 'audio/vnd.cisco.nse', category: Category::AUDIO)]
    case AUDIO_VND_CISCO_NSE = 'audio/vnd.cisco.nse';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.cmles.radio-events
     */
    #[Info(name: 'audio/vnd.cmles.radio-events', category: Category::AUDIO)]
    case AUDIO_VND_CMLES_RADIO_EVENTS = 'audio/vnd.cmles.radio-events';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.cns.anp1
     */
    #[Info(name: 'audio/vnd.cns.anp1', category: Category::AUDIO)]
    case AUDIO_VND_CNS_ANP1 = 'audio/vnd.cns.anp1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.cns.inf1
     */
    #[Info(name: 'audio/vnd.cns.inf1', category: Category::AUDIO)]
    case AUDIO_VND_CNS_INF1 = 'audio/vnd.cns.inf1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dece.audio
     */
    #[Info(name: 'audio/vnd.dece.audio', category: Category::AUDIO)]
    case AUDIO_VND_DECE_AUDIO = 'audio/vnd.dece.audio';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.digital-winds
     */
    #[Info(name: 'audio/vnd.digital-winds', category: Category::AUDIO)]
    case AUDIO_VND_DIGITAL_WINDS = 'audio/vnd.digital-winds';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dlna.adts
     */
    #[Info(name: 'audio/vnd.dlna.adts', category: Category::AUDIO)]
    case AUDIO_VND_DLNA_ADTS = 'audio/vnd.dlna.adts';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.heaac.1
     */
    #[Info(name: 'audio/vnd.dolby.heaac.1', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_HEAAC_1 = 'audio/vnd.dolby.heaac.1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.heaac.2
     */
    #[Info(name: 'audio/vnd.dolby.heaac.2', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_HEAAC_2 = 'audio/vnd.dolby.heaac.2';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.mlp
     */
    #[Info(name: 'audio/vnd.dolby.mlp', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_MLP = 'audio/vnd.dolby.mlp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.mps
     */
    #[Info(name: 'audio/vnd.dolby.mps', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_MPS = 'audio/vnd.dolby.mps';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.pl2
     */
    #[Info(name: 'audio/vnd.dolby.pl2', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_PL2 = 'audio/vnd.dolby.pl2';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.pl2x
     */
    #[Info(name: 'audio/vnd.dolby.pl2x', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_PL2X = 'audio/vnd.dolby.pl2x';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.pl2z
     */
    #[Info(name: 'audio/vnd.dolby.pl2z', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_PL2Z = 'audio/vnd.dolby.pl2z';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dolby.pulse.1
     */
    #[Info(name: 'audio/vnd.dolby.pulse.1', category: Category::AUDIO)]
    case AUDIO_VND_DOLBY_PULSE_1 = 'audio/vnd.dolby.pulse.1';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dra
     */
    #[Info(name: 'audio/vnd.dra', category: Category::AUDIO)]
    case AUDIO_VND_DRA = 'audio/vnd.dra';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dts
     */
    #[Info(name: 'audio/vnd.dts', category: Category::AUDIO)]
    case AUDIO_VND_DTS = 'audio/vnd.dts';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dts.hd
     */
    #[Info(name: 'audio/vnd.dts.hd', category: Category::AUDIO)]
    case AUDIO_VND_DTS_HD = 'audio/vnd.dts.hd';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dts.uhd
     */
    #[Info(name: 'audio/vnd.dts.uhd', category: Category::AUDIO)]
    case AUDIO_VND_DTS_UHD = 'audio/vnd.dts.uhd';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.dvb.file
     */
    #[Info(name: 'audio/vnd.dvb.file', category: Category::AUDIO)]
    case AUDIO_VND_DVB_FILE = 'audio/vnd.dvb.file';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.everad.plj
     */
    #[Info(name: 'audio/vnd.everad.plj', category: Category::AUDIO)]
    case AUDIO_VND_EVERAD_PLJ = 'audio/vnd.everad.plj';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.hns.audio
     */
    #[Info(name: 'audio/vnd.hns.audio', category: Category::AUDIO)]
    case AUDIO_VND_HNS_AUDIO = 'audio/vnd.hns.audio';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.lucent.voice
     */
    #[Info(name: 'audio/vnd.lucent.voice', category: Category::AUDIO)]
    case AUDIO_VND_LUCENT_VOICE = 'audio/vnd.lucent.voice';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.ms-playready.media.pya
     */
    #[Info(name: 'audio/vnd.ms-playready.media.pya', category: Category::AUDIO)]
    case AUDIO_VND_MS_PLAYREADY_MEDIA_PYA = 'audio/vnd.ms-playready.media.pya';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.nokia.mobile-xmf
     */
    #[Info(name: 'audio/vnd.nokia.mobile-xmf', category: Category::AUDIO)]
    case AUDIO_VND_NOKIA_MOBILE_XMF = 'audio/vnd.nokia.mobile-xmf';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.nortel.vbk
     */
    #[Info(name: 'audio/vnd.nortel.vbk', category: Category::AUDIO)]
    case AUDIO_VND_NORTEL_VBK = 'audio/vnd.nortel.vbk';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.nuera.ecelp4800
     */
    #[Info(name: 'audio/vnd.nuera.ecelp4800', category: Category::AUDIO)]
    case AUDIO_VND_NUERA_ECELP4800 = 'audio/vnd.nuera.ecelp4800';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.nuera.ecelp7470
     */
    #[Info(name: 'audio/vnd.nuera.ecelp7470', category: Category::AUDIO)]
    case AUDIO_VND_NUERA_ECELP7470 = 'audio/vnd.nuera.ecelp7470';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.nuera.ecelp9600
     */
    #[Info(name: 'audio/vnd.nuera.ecelp9600', category: Category::AUDIO)]
    case AUDIO_VND_NUERA_ECELP9600 = 'audio/vnd.nuera.ecelp9600';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.octel.sbc
     */
    #[Info(name: 'audio/vnd.octel.sbc', category: Category::AUDIO)]
    case AUDIO_VND_OCTEL_SBC = 'audio/vnd.octel.sbc';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.presonus.multitrack
     */
    #[Info(name: 'audio/vnd.presonus.multitrack', category: Category::AUDIO)]
    case AUDIO_VND_PRESONUS_MULTITRACK = 'audio/vnd.presonus.multitrack';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.qcelp
     */
    #[Info(name: 'audio/vnd.qcelp', category: Category::AUDIO)]
    case AUDIO_VND_QCELP = 'audio/vnd.qcelp';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.rhetorex.32kadpcm
     */
    #[Info(name: 'audio/vnd.rhetorex.32kadpcm', category: Category::AUDIO)]
    case AUDIO_VND_RHETOREX_32KADPCM = 'audio/vnd.rhetorex.32kadpcm';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.rip
     */
    #[Info(name: 'audio/vnd.rip', category: Category::AUDIO)]
    case AUDIO_VND_RIP = 'audio/vnd.rip';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.sealedmedia.softseal.mpeg
     */
    #[Info(name: 'audio/vnd.sealedmedia.softseal.mpeg', category: Category::AUDIO)]
    case AUDIO_VND_SEALEDMEDIA_SOFTSEAL_MPEG = 'audio/vnd.sealedmedia.softseal.mpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vnd.vmx.cvsd
     */
    #[Info(name: 'audio/vnd.vmx.cvsd', category: Category::AUDIO)]
    case AUDIO_VND_VMX_CVSD = 'audio/vnd.vmx.cvsd';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vorbis
     */
    #[Info(name: 'audio/vorbis', category: Category::AUDIO)]
    case AUDIO_VORBIS = 'audio/vorbis';

    /**
     * @link https://www.iana.org/assignments/media-types/audio/vorbis-config
     */
    #[Info(name: 'audio/vorbis-config', category: Category::AUDIO)]
    case AUDIO_VORBIS_CONFIG = 'audio/vorbis-config';

    /**
     * @link https://www.iana.org/assignments/media-types/font/collection
     */
    #[Info(name: 'font/collection', category: Category::FONT)]
    case FONT_COLLECTION = 'font/collection';

    /**
     * @link https://www.iana.org/assignments/media-types/font/otf
     */
    #[Info(name: 'font/otf', category: Category::FONT)]
    case FONT_OTF = 'font/otf';

    /**
     * @link https://www.iana.org/assignments/media-types/font/sfnt
     */
    #[Info(name: 'font/sfnt', category: Category::FONT)]
    case FONT_SFNT = 'font/sfnt';

    /**
     * @link https://www.iana.org/assignments/media-types/font/ttf
     */
    #[Info(name: 'font/ttf', category: Category::FONT)]
    case FONT_TTF = 'font/ttf';

    /**
     * @link https://www.iana.org/assignments/media-types/font/woff
     */
    #[Info(name: 'font/woff', category: Category::FONT)]
    case FONT_WOFF = 'font/woff';

    /**
     * @link https://www.iana.org/assignments/media-types/font/woff2
     */
    #[Info(name: 'font/woff2', category: Category::FONT)]
    case FONT_WOFF2 = 'font/woff2';

    /**
     * @link https://www.iana.org/assignments/media-types/image/aces
     */
    #[Info(name: 'image/aces', category: Category::IMAGE)]
    case IMAGE_ACES = 'image/aces';

    /**
     * @link https://www.iana.org/assignments/media-types/image/avci
     */
    #[Info(name: 'image/avci', category: Category::IMAGE)]
    case IMAGE_AVCI = 'image/avci';

    /**
     * @link https://www.iana.org/assignments/media-types/image/avcs
     */
    #[Info(name: 'image/avcs', category: Category::IMAGE)]
    case IMAGE_AVCS = 'image/avcs';

    /**
     * @link https://www.iana.org/assignments/media-types/image/avif
     */
    #[Info(name: 'image/avif', category: Category::IMAGE)]
    case IMAGE_AVIF = 'image/avif';

    /**
     * @link https://www.iana.org/assignments/media-types/image/bmp
     */
    #[Info(name: 'image/bmp', category: Category::IMAGE)]
    case IMAGE_BMP = 'image/bmp';

    /**
     * @link https://www.iana.org/assignments/media-types/image/cgm
     */
    #[Info(name: 'image/cgm', category: Category::IMAGE)]
    case IMAGE_CGM = 'image/cgm';

    /**
     * @link https://www.iana.org/assignments/media-types/image/dicom-rle
     */
    #[Info(name: 'image/dicom-rle', category: Category::IMAGE)]
    case IMAGE_DICOM_RLE = 'image/dicom-rle';

    /**
     * @link https://www.iana.org/assignments/media-types/image/emf
     */
    #[Info(name: 'image/emf', category: Category::IMAGE)]
    case IMAGE_EMF = 'image/emf';

    /**
     * @link https://www.iana.org/assignments/media-types/image/example
     */
    #[Info(name: 'image/example', category: Category::IMAGE)]
    case IMAGE_EXAMPLE = 'image/example';

    /**
     * @link https://www.iana.org/assignments/media-types/image/fits
     */
    #[Info(name: 'image/fits', category: Category::IMAGE)]
    case IMAGE_FITS = 'image/fits';

    /**
     * @link https://www.iana.org/assignments/media-types/image/g3fax
     */
    #[Info(name: 'image/g3fax', category: Category::IMAGE)]
    case IMAGE_G3FAX = 'image/g3fax';

    /**
     * @link https://www.iana.org/assignments/media-types/image/gif
     */
    #[Info(name: 'image/gif', category: Category::IMAGE)]
    case IMAGE_GIF = 'image/gif';

    /**
     * @link https://www.iana.org/assignments/media-types/image/heic
     */
    #[Info(name: 'image/heic', category: Category::IMAGE)]
    case IMAGE_HEIC = 'image/heic';

    /**
     * @link https://www.iana.org/assignments/media-types/image/heic-sequence
     */
    #[Info(name: 'image/heic-sequence', category: Category::IMAGE)]
    case IMAGE_HEIC_SEQUENCE = 'image/heic-sequence';

    /**
     * @link https://www.iana.org/assignments/media-types/image/heif
     */
    #[Info(name: 'image/heif', category: Category::IMAGE)]
    case IMAGE_HEIF = 'image/heif';

    /**
     * @link https://www.iana.org/assignments/media-types/image/heif-sequence
     */
    #[Info(name: 'image/heif-sequence', category: Category::IMAGE)]
    case IMAGE_HEIF_SEQUENCE = 'image/heif-sequence';

    /**
     * @link https://www.iana.org/assignments/media-types/image/hej2k
     */
    #[Info(name: 'image/hej2k', category: Category::IMAGE)]
    case IMAGE_HEJ2K = 'image/hej2k';

    /**
     * @link https://www.iana.org/assignments/media-types/image/hsj2
     */
    #[Info(name: 'image/hsj2', category: Category::IMAGE)]
    case IMAGE_HSJ2 = 'image/hsj2';

    /**
     * @link https://www.iana.org/assignments/media-types/image/ief
     */
    #[Info(name: 'image/ief', category: Category::IMAGE)]
    case IMAGE_IEF = 'image/ief';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jls
     */
    #[Info(name: 'image/jls', category: Category::IMAGE)]
    case IMAGE_JLS = 'image/jls';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jp2
     */
    #[Info(name: 'image/jp2', category: Category::IMAGE)]
    case IMAGE_JP2 = 'image/jp2';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jpeg
     */
    #[Info(name: 'image/jpeg', category: Category::IMAGE)]
    case IMAGE_JPEG = 'image/jpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jph
     */
    #[Info(name: 'image/jph', category: Category::IMAGE)]
    case IMAGE_JPH = 'image/jph';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jphc
     */
    #[Info(name: 'image/jphc', category: Category::IMAGE)]
    case IMAGE_JPHC = 'image/jphc';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jpm
     */
    #[Info(name: 'image/jpm', category: Category::IMAGE)]
    case IMAGE_JPM = 'image/jpm';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jpx
     */
    #[Info(name: 'image/jpx', category: Category::IMAGE)]
    case IMAGE_JPX = 'image/jpx';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxr
     */
    #[Info(name: 'image/jxr', category: Category::IMAGE)]
    case IMAGE_JXR = 'image/jxr';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxrA
     */
    #[Info(name: 'image/jxrA', category: Category::IMAGE)]
    case IMAGE_JXRA = 'image/jxra';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxrS
     */
    #[Info(name: 'image/jxrS', category: Category::IMAGE)]
    case IMAGE_JXRS = 'image/jxrs';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxs
     */
    #[Info(name: 'image/jxs', category: Category::IMAGE)]
    case IMAGE_JXS = 'image/jxs';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxsc
     */
    #[Info(name: 'image/jxsc', category: Category::IMAGE)]
    case IMAGE_JXSC = 'image/jxsc';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxsi
     */
    #[Info(name: 'image/jxsi', category: Category::IMAGE)]
    case IMAGE_JXSI = 'image/jxsi';

    /**
     * @link https://www.iana.org/assignments/media-types/image/jxss
     */
    #[Info(name: 'image/jxss', category: Category::IMAGE)]
    case IMAGE_JXSS = 'image/jxss';

    /**
     * @link https://www.iana.org/assignments/media-types/image/ktx
     */
    #[Info(name: 'image/ktx', category: Category::IMAGE)]
    case IMAGE_KTX = 'image/ktx';

    /**
     * @link https://www.iana.org/assignments/media-types/image/ktx2
     */
    #[Info(name: 'image/ktx2', category: Category::IMAGE)]
    case IMAGE_KTX2 = 'image/ktx2';

    /**
     * @link https://www.iana.org/assignments/media-types/image/naplps
     */
    #[Info(name: 'image/naplps', category: Category::IMAGE)]
    case IMAGE_NAPLPS = 'image/naplps';

    /**
     * @link https://www.iana.org/assignments/media-types/image/png
     */
    #[Info(name: 'image/png', category: Category::IMAGE)]
    case IMAGE_PNG = 'image/png';

    /**
     * @link https://www.iana.org/assignments/media-types/image/prs.btif
     */
    #[Info(name: 'image/prs.btif', category: Category::IMAGE)]
    case IMAGE_PRS_BTIF = 'image/prs.btif';

    /**
     * @link https://www.iana.org/assignments/media-types/image/prs.pti
     */
    #[Info(name: 'image/prs.pti', category: Category::IMAGE)]
    case IMAGE_PRS_PTI = 'image/prs.pti';

    /**
     * @link https://www.iana.org/assignments/media-types/image/pwg-raster
     */
    #[Info(name: 'image/pwg-raster', category: Category::IMAGE)]
    case IMAGE_PWG_RASTER = 'image/pwg-raster';

    /**
     * @link https://www.iana.org/assignments/media-types/image/svg+xml
     */
    #[Info(name: 'image/svg+xml', category: Category::IMAGE)]
    case IMAGE_SVG_XML = 'image/svg+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/image/t38
     */
    #[Info(name: 'image/t38', category: Category::IMAGE)]
    case IMAGE_T38 = 'image/t38';

    /**
     * @link https://www.iana.org/assignments/media-types/image/tiff
     */
    #[Info(name: 'image/tiff', category: Category::IMAGE)]
    case IMAGE_TIFF = 'image/tiff';

    /**
     * @link https://www.iana.org/assignments/media-types/image/tiff-fx
     */
    #[Info(name: 'image/tiff-fx', category: Category::IMAGE)]
    case IMAGE_TIFF_FX = 'image/tiff-fx';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.adobe.photoshop
     */
    #[Info(name: 'image/vnd.adobe.photoshop', category: Category::IMAGE)]
    case IMAGE_VND_ADOBE_PHOTOSHOP = 'image/vnd.adobe.photoshop';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.airzip.accelerator.azv
     */
    #[Info(name: 'image/vnd.airzip.accelerator.azv', category: Category::IMAGE)]
    case IMAGE_VND_AIRZIP_ACCELERATOR_AZV = 'image/vnd.airzip.accelerator.azv';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.cns.inf2
     */
    #[Info(name: 'image/vnd.cns.inf2', category: Category::IMAGE)]
    case IMAGE_VND_CNS_INF2 = 'image/vnd.cns.inf2';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.dece.graphic
     */
    #[Info(name: 'image/vnd.dece.graphic', category: Category::IMAGE)]
    case IMAGE_VND_DECE_GRAPHIC = 'image/vnd.dece.graphic';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.djvu
     */
    #[Info(name: 'image/vnd.djvu', category: Category::IMAGE)]
    case IMAGE_VND_DJVU = 'image/vnd.djvu';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.dwg
     */
    #[Info(name: 'image/vnd.dwg', category: Category::IMAGE)]
    case IMAGE_VND_DWG = 'image/vnd.dwg';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.dxf
     */
    #[Info(name: 'image/vnd.dxf', category: Category::IMAGE)]
    case IMAGE_VND_DXF = 'image/vnd.dxf';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.dvb.subtitle
     */
    #[Info(name: 'image/vnd.dvb.subtitle', category: Category::IMAGE)]
    case IMAGE_VND_DVB_SUBTITLE = 'image/vnd.dvb.subtitle';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.fastbidsheet
     */
    #[Info(name: 'image/vnd.fastbidsheet', category: Category::IMAGE)]
    case IMAGE_VND_FASTBIDSHEET = 'image/vnd.fastbidsheet';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.fpx
     */
    #[Info(name: 'image/vnd.fpx', category: Category::IMAGE)]
    case IMAGE_VND_FPX = 'image/vnd.fpx';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.fst
     */
    #[Info(name: 'image/vnd.fst', category: Category::IMAGE)]
    case IMAGE_VND_FST = 'image/vnd.fst';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.fujixerox.edmics-mmr
     */
    #[Info(name: 'image/vnd.fujixerox.edmics-mmr', category: Category::IMAGE)]
    case IMAGE_VND_FUJIXEROX_EDMICS_MMR = 'image/vnd.fujixerox.edmics-mmr';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.fujixerox.edmics-rlc
     */
    #[Info(name: 'image/vnd.fujixerox.edmics-rlc', category: Category::IMAGE)]
    case IMAGE_VND_FUJIXEROX_EDMICS_RLC = 'image/vnd.fujixerox.edmics-rlc';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.globalgraphics.pgb
     */
    #[Info(name: 'image/vnd.globalgraphics.pgb', category: Category::IMAGE)]
    case IMAGE_VND_GLOBALGRAPHICS_PGB = 'image/vnd.globalgraphics.pgb';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.microsoft.icon
     */
    #[Info(name: 'image/vnd.microsoft.icon', category: Category::IMAGE)]
    case IMAGE_VND_MICROSOFT_ICON = 'image/vnd.microsoft.icon';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.mix
     */
    #[Info(name: 'image/vnd.mix', category: Category::IMAGE)]
    case IMAGE_VND_MIX = 'image/vnd.mix';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.ms-modi
     */
    #[Info(name: 'image/vnd.ms-modi', category: Category::IMAGE)]
    case IMAGE_VND_MS_MODI = 'image/vnd.ms-modi';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.mozilla.apng
     */
    #[Info(name: 'image/vnd.mozilla.apng', category: Category::IMAGE)]
    case IMAGE_VND_MOZILLA_APNG = 'image/vnd.mozilla.apng';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.net-fpx
     */
    #[Info(name: 'image/vnd.net-fpx', category: Category::IMAGE)]
    case IMAGE_VND_NET_FPX = 'image/vnd.net-fpx';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.pco.b16
     */
    #[Info(name: 'image/vnd.pco.b16', category: Category::IMAGE)]
    case IMAGE_VND_PCO_B16 = 'image/vnd.pco.b16';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.radiance
     */
    #[Info(name: 'image/vnd.radiance', category: Category::IMAGE)]
    case IMAGE_VND_RADIANCE = 'image/vnd.radiance';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.sealed.png
     */
    #[Info(name: 'image/vnd.sealed.png', category: Category::IMAGE)]
    case IMAGE_VND_SEALED_PNG = 'image/vnd.sealed.png';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.sealedmedia.softseal.gif
     */
    #[Info(name: 'image/vnd.sealedmedia.softseal.gif', category: Category::IMAGE)]
    case IMAGE_VND_SEALEDMEDIA_SOFTSEAL_GIF = 'image/vnd.sealedmedia.softseal.gif';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.sealedmedia.softseal.jpg
     */
    #[Info(name: 'image/vnd.sealedmedia.softseal.jpg', category: Category::IMAGE)]
    case IMAGE_VND_SEALEDMEDIA_SOFTSEAL_JPG = 'image/vnd.sealedmedia.softseal.jpg';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.svf
     */
    #[Info(name: 'image/vnd.svf', category: Category::IMAGE)]
    case IMAGE_VND_SVF = 'image/vnd.svf';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.tencent.tap
     */
    #[Info(name: 'image/vnd.tencent.tap', category: Category::IMAGE)]
    case IMAGE_VND_TENCENT_TAP = 'image/vnd.tencent.tap';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.valve.source.texture
     */
    #[Info(name: 'image/vnd.valve.source.texture', category: Category::IMAGE)]
    case IMAGE_VND_VALVE_SOURCE_TEXTURE = 'image/vnd.valve.source.texture';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.wap.wbmp
     */
    #[Info(name: 'image/vnd.wap.wbmp', category: Category::IMAGE)]
    case IMAGE_VND_WAP_WBMP = 'image/vnd.wap.wbmp';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.xiff
     */
    #[Info(name: 'image/vnd.xiff', category: Category::IMAGE)]
    case IMAGE_VND_XIFF = 'image/vnd.xiff';

    /**
     * @link https://www.iana.org/assignments/media-types/image/vnd.zbrush.pcx
     */
    #[Info(name: 'image/vnd.zbrush.pcx', category: Category::IMAGE)]
    case IMAGE_VND_ZBRUSH_PCX = 'image/vnd.zbrush.pcx';

    /**
     * @link https://www.iana.org/assignments/media-types/image/wmf
     */
    #[Info(name: 'image/wmf', category: Category::IMAGE)]
    case IMAGE_WMF = 'image/wmf';

    /**
     * @link https://www.iana.org/assignments/media-types/message/CPIM
     */
    #[Info(name: 'message/CPIM', category: Category::MESSAGE)]
    case MESSAGE_CPIM = 'message/cpim';

    /**
     * @link https://www.iana.org/assignments/media-types/message/delivery-status
     */
    #[Info(name: 'message/delivery-status', category: Category::MESSAGE)]
    case MESSAGE_DELIVERY_STATUS = 'message/delivery-status';

    /**
     * @link https://www.iana.org/assignments/media-types/message/disposition-notification
     */
    #[Info(name: 'message/disposition-notification', category: Category::MESSAGE)]
    case MESSAGE_DISPOSITION_NOTIFICATION = 'message/disposition-notification';

    /**
     * @link https://www.iana.org/assignments/media-types/message/example
     */
    #[Info(name: 'message/example', category: Category::MESSAGE)]
    case MESSAGE_EXAMPLE = 'message/example';

    /**
     * @link https://www.iana.org/assignments/media-types/message/external-body
     */
    #[Info(name: 'message/external-body', category: Category::MESSAGE)]
    case MESSAGE_EXTERNAL_BODY = 'message/external-body';

    /**
     * @link https://www.iana.org/assignments/media-types/message/feedback-report
     */
    #[Info(name: 'message/feedback-report', category: Category::MESSAGE)]
    case MESSAGE_FEEDBACK_REPORT = 'message/feedback-report';

    /**
     * @link https://www.iana.org/assignments/media-types/message/global
     */
    #[Info(name: 'message/global', category: Category::MESSAGE)]
    case MESSAGE_GLOBAL = 'message/global';

    /**
     * @link https://www.iana.org/assignments/media-types/message/global-delivery-status
     */
    #[Info(name: 'message/global-delivery-status', category: Category::MESSAGE)]
    case MESSAGE_GLOBAL_DELIVERY_STATUS = 'message/global-delivery-status';

    /**
     * @link https://www.iana.org/assignments/media-types/message/global-disposition-notification
     */
    #[Info(name: 'message/global-disposition-notification', category: Category::MESSAGE)]
    case MESSAGE_GLOBAL_DISPOSITION_NOTIFICATION = 'message/global-disposition-notification';

    /**
     * @link https://www.iana.org/assignments/media-types/message/global-headers
     */
    #[Info(name: 'message/global-headers', category: Category::MESSAGE)]
    case MESSAGE_GLOBAL_HEADERS = 'message/global-headers';

    /**
     * @link https://www.iana.org/assignments/media-types/message/http
     */
    #[Info(name: 'message/http', category: Category::MESSAGE)]
    case MESSAGE_HTTP = 'message/http';

    /**
     * @link https://www.iana.org/assignments/media-types/message/imdn+xml
     */
    #[Info(name: 'message/imdn+xml', category: Category::MESSAGE)]
    case MESSAGE_IMDN_XML = 'message/imdn+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/message/news
     */
    #[Info(name: 'message/news', category: Category::MESSAGE)]
    case MESSAGE_NEWS = 'message/news';

    /**
     * @link https://www.iana.org/assignments/media-types/message/partial
     */
    #[Info(name: 'message/partial', category: Category::MESSAGE)]
    case MESSAGE_PARTIAL = 'message/partial';

    /**
     * @link https://www.iana.org/assignments/media-types/message/rfc822
     */
    #[Info(name: 'message/rfc822', category: Category::MESSAGE)]
    case MESSAGE_RFC822 = 'message/rfc822';

    /**
     * @link https://www.iana.org/assignments/media-types/message/s-http
     */
    #[Info(name: 'message/s-http', category: Category::MESSAGE)]
    case MESSAGE_S_HTTP = 'message/s-http';

    /**
     * @link https://www.iana.org/assignments/media-types/message/sip
     */
    #[Info(name: 'message/sip', category: Category::MESSAGE)]
    case MESSAGE_SIP = 'message/sip';

    /**
     * @link https://www.iana.org/assignments/media-types/message/sipfrag
     */
    #[Info(name: 'message/sipfrag', category: Category::MESSAGE)]
    case MESSAGE_SIPFRAG = 'message/sipfrag';

    /**
     * @link https://www.iana.org/assignments/media-types/message/tracking-status
     */
    #[Info(name: 'message/tracking-status', category: Category::MESSAGE)]
    case MESSAGE_TRACKING_STATUS = 'message/tracking-status';

    /**
     * @link https://www.iana.org/assignments/media-types/message/vnd.si.simp
     */
    #[Info(name: 'message/vnd.si.simp', category: Category::MESSAGE)]
    case MESSAGE_VND_SI_SIMP = 'message/vnd.si.simp';

    /**
     * @link https://www.iana.org/assignments/media-types/message/vnd.wfa.wsc
     */
    #[Info(name: 'message/vnd.wfa.wsc', category: Category::MESSAGE)]
    case MESSAGE_VND_WFA_WSC = 'message/vnd.wfa.wsc';

    /**
     * @link https://www.iana.org/assignments/media-types/model/3mf
     */
    #[Info(name: 'model/3mf', category: Category::MODEL)]
    case MODEL_3MF = 'model/3mf';

    /**
     * @link https://www.iana.org/assignments/media-types/model/e57
     */
    #[Info(name: 'model/e57', category: Category::MODEL)]
    case MODEL_E57 = 'model/e57';

    /**
     * @link https://www.iana.org/assignments/media-types/model/example
     */
    #[Info(name: 'model/example', category: Category::MODEL)]
    case MODEL_EXAMPLE = 'model/example';

    /**
     * @link https://www.iana.org/assignments/media-types/model/gltf-binary
     */
    #[Info(name: 'model/gltf-binary', category: Category::MODEL)]
    case MODEL_GLTF_BINARY = 'model/gltf-binary';

    /**
     * @link https://www.iana.org/assignments/media-types/model/gltf+json
     */
    #[Info(name: 'model/gltf+json', category: Category::MODEL)]
    case MODEL_GLTF_JSON = 'model/gltf+json';

    /**
     * @link https://www.iana.org/assignments/media-types/model/iges
     */
    #[Info(name: 'model/iges', category: Category::MODEL)]
    case MODEL_IGES = 'model/iges';

    /**
     * @link https://www.iana.org/assignments/media-types/model/mesh
     */
    #[Info(name: 'model/mesh', category: Category::MODEL)]
    case MODEL_MESH = 'model/mesh';

    /**
     * @link https://www.iana.org/assignments/media-types/model/mtl
     */
    #[Info(name: 'model/mtl', category: Category::MODEL)]
    case MODEL_MTL = 'model/mtl';

    /**
     * @link https://www.iana.org/assignments/media-types/model/obj
     */
    #[Info(name: 'model/obj', category: Category::MODEL)]
    case MODEL_OBJ = 'model/obj';

    /**
     * @link https://www.iana.org/assignments/media-types/model/prc
     */
    #[Info(name: 'model/prc', category: Category::MODEL)]
    case MODEL_PRC = 'model/prc';

    /**
     * @link https://www.iana.org/assignments/media-types/model/step
     */
    #[Info(name: 'model/step', category: Category::MODEL)]
    case MODEL_STEP = 'model/step';

    /**
     * @link https://www.iana.org/assignments/media-types/model/step+xml
     */
    #[Info(name: 'model/step+xml', category: Category::MODEL)]
    case MODEL_STEP_XML = 'model/step+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/model/step+zip
     */
    #[Info(name: 'model/step+zip', category: Category::MODEL)]
    case MODEL_STEP_ZIP = 'model/step+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/model/step-xml+zip
     */
    #[Info(name: 'model/step-xml+zip', category: Category::MODEL)]
    case MODEL_STEP_XML_ZIP = 'model/step-xml+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/model/stl
     */
    #[Info(name: 'model/stl', category: Category::MODEL)]
    case MODEL_STL = 'model/stl';

    /**
     * @link https://www.iana.org/assignments/media-types/model/u3d
     */
    #[Info(name: 'model/u3d', category: Category::MODEL)]
    case MODEL_U3D = 'model/u3d';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.collada+xml
     */
    #[Info(name: 'model/vnd.collada+xml', category: Category::MODEL)]
    case MODEL_VND_COLLADA_XML = 'model/vnd.collada+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.dwf
     */
    #[Info(name: 'model/vnd.dwf', category: Category::MODEL)]
    case MODEL_VND_DWF = 'model/vnd.dwf';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.flatland.3dml
     */
    #[Info(name: 'model/vnd.flatland.3dml', category: Category::MODEL)]
    case MODEL_VND_FLATLAND_3DML = 'model/vnd.flatland.3dml';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.gdl
     */
    #[Info(name: 'model/vnd.gdl', category: Category::MODEL)]
    case MODEL_VND_GDL = 'model/vnd.gdl';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.gs-gdl
     */
    #[Info(name: 'model/vnd.gs-gdl', category: Category::MODEL)]
    case MODEL_VND_GS_GDL = 'model/vnd.gs-gdl';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.gtw
     */
    #[Info(name: 'model/vnd.gtw', category: Category::MODEL)]
    case MODEL_VND_GTW = 'model/vnd.gtw';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.moml+xml
     */
    #[Info(name: 'model/vnd.moml+xml', category: Category::MODEL)]
    case MODEL_VND_MOML_XML = 'model/vnd.moml+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.mts
     */
    #[Info(name: 'model/vnd.mts', category: Category::MODEL)]
    case MODEL_VND_MTS = 'model/vnd.mts';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.opengex
     */
    #[Info(name: 'model/vnd.opengex', category: Category::MODEL)]
    case MODEL_VND_OPENGEX = 'model/vnd.opengex';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.parasolid.transmit.binary
     */
    #[Info(name: 'model/vnd.parasolid.transmit.binary', category: Category::MODEL)]
    case MODEL_VND_PARASOLID_TRANSMIT_BINARY = 'model/vnd.parasolid.transmit.binary';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.parasolid.transmit.text
     */
    #[Info(name: 'model/vnd.parasolid.transmit.text', category: Category::MODEL)]
    case MODEL_VND_PARASOLID_TRANSMIT_TEXT = 'model/vnd.parasolid.transmit.text';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.pytha.pyox
     */
    #[Info(name: 'model/vnd.pytha.pyox', category: Category::MODEL)]
    case MODEL_VND_PYTHA_PYOX = 'model/vnd.pytha.pyox';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.rosette.annotated-data-model
     */
    #[Info(name: 'model/vnd.rosette.annotated-data-model', category: Category::MODEL)]
    case MODEL_VND_ROSETTE_ANNOTATED_DATA_MODEL = 'model/vnd.rosette.annotated-data-model';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.sap.vds
     */
    #[Info(name: 'model/vnd.sap.vds', category: Category::MODEL)]
    case MODEL_VND_SAP_VDS = 'model/vnd.sap.vds';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.usdz+zip
     */
    #[Info(name: 'model/vnd.usdz+zip', category: Category::MODEL)]
    case MODEL_VND_USDZ_ZIP = 'model/vnd.usdz+zip';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.valve.source.compiled-map
     */
    #[Info(name: 'model/vnd.valve.source.compiled-map', category: Category::MODEL)]
    case MODEL_VND_VALVE_SOURCE_COMPILED_MAP = 'model/vnd.valve.source.compiled-map';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vnd.vtu
     */
    #[Info(name: 'model/vnd.vtu', category: Category::MODEL)]
    case MODEL_VND_VTU = 'model/vnd.vtu';

    /**
     * @link https://www.iana.org/assignments/media-types/model/vrml
     */
    #[Info(name: 'model/vrml', category: Category::MODEL)]
    case MODEL_VRML = 'model/vrml';

    /**
     * @link https://www.iana.org/assignments/media-types/model/x3d-vrml
     */
    #[Info(name: 'model/x3d-vrml', category: Category::MODEL)]
    case MODEL_X3D_VRML = 'model/x3d-vrml';

    /**
     * @link https://www.iana.org/assignments/media-types/model/x3d+fastinfoset
     */
    #[Info(name: 'model/x3d+fastinfoset', category: Category::MODEL)]
    case MODEL_X3D_FASTINFOSET = 'model/x3d+fastinfoset';

    /**
     * @link https://www.iana.org/assignments/media-types/model/x3d+xml
     */
    #[Info(name: 'model/x3d+xml', category: Category::MODEL)]
    case MODEL_X3D_XML = 'model/x3d+xml';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/alternative
     */
    #[Info(name: 'multipart/alternative', category: Category::MULTIPART)]
    case MULTIPART_ALTERNATIVE = 'multipart/alternative';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/appledouble
     */
    #[Info(name: 'multipart/appledouble', category: Category::MULTIPART)]
    case MULTIPART_APPLEDOUBLE = 'multipart/appledouble';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/byteranges
     */
    #[Info(name: 'multipart/byteranges', category: Category::MULTIPART)]
    case MULTIPART_BYTERANGES = 'multipart/byteranges';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/digest
     */
    #[Info(name: 'multipart/digest', category: Category::MULTIPART)]
    case MULTIPART_DIGEST = 'multipart/digest';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/encrypted
     */
    #[Info(name: 'multipart/encrypted', category: Category::MULTIPART)]
    case MULTIPART_ENCRYPTED = 'multipart/encrypted';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/example
     */
    #[Info(name: 'multipart/example', category: Category::MULTIPART)]
    case MULTIPART_EXAMPLE = 'multipart/example';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/form-data
     */
    #[Info(name: 'multipart/form-data', category: Category::MULTIPART)]
    case MULTIPART_FORM_DATA = 'multipart/form-data';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/header-set
     */
    #[Info(name: 'multipart/header-set', category: Category::MULTIPART)]
    case MULTIPART_HEADER_SET = 'multipart/header-set';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/mixed
     */
    #[Info(name: 'multipart/mixed', category: Category::MULTIPART)]
    case MULTIPART_MIXED = 'multipart/mixed';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/multilingual
     */
    #[Info(name: 'multipart/multilingual', category: Category::MULTIPART)]
    case MULTIPART_MULTILINGUAL = 'multipart/multilingual';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/parallel
     */
    #[Info(name: 'multipart/parallel', category: Category::MULTIPART)]
    case MULTIPART_PARALLEL = 'multipart/parallel';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/related
     */
    #[Info(name: 'multipart/related', category: Category::MULTIPART)]
    case MULTIPART_RELATED = 'multipart/related';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/report
     */
    #[Info(name: 'multipart/report', category: Category::MULTIPART)]
    case MULTIPART_REPORT = 'multipart/report';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/signed
     */
    #[Info(name: 'multipart/signed', category: Category::MULTIPART)]
    case MULTIPART_SIGNED = 'multipart/signed';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/vnd.bint.med-plus
     */
    #[Info(name: 'multipart/vnd.bint.med-plus', category: Category::MULTIPART)]
    case MULTIPART_VND_BINT_MED_PLUS = 'multipart/vnd.bint.med-plus';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/voice-message
     */
    #[Info(name: 'multipart/voice-message', category: Category::MULTIPART)]
    case MULTIPART_VOICE_MESSAGE = 'multipart/voice-message';

    /**
     * @link https://www.iana.org/assignments/media-types/multipart/x-mixed-replace
     */
    #[Info(name: 'multipart/x-mixed-replace', category: Category::MULTIPART)]
    case MULTIPART_X_MIXED_REPLACE = 'multipart/x-mixed-replace';

    /**
     * @link https://www.iana.org/assignments/media-types/text/1d-interleaved-parityfec
     */
    #[Info(name: 'text/1d-interleaved-parityfec', category: Category::TEXT)]
    case TEXT_1D_INTERLEAVED_PARITYFEC = 'text/1d-interleaved-parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/text/cache-manifest
     */
    #[Info(name: 'text/cache-manifest', category: Category::TEXT)]
    case TEXT_CACHE_MANIFEST = 'text/cache-manifest';

    /**
     * @link https://www.iana.org/assignments/media-types/text/calendar
     */
    #[Info(name: 'text/calendar', category: Category::TEXT)]
    case TEXT_CALENDAR = 'text/calendar';

    /**
     * @link https://www.iana.org/assignments/media-types/text/cql
     */
    #[Info(name: 'text/cql', category: Category::TEXT)]
    case TEXT_CQL = 'text/cql';

    /**
     * @link https://www.iana.org/assignments/media-types/text/cql-expression
     */
    #[Info(name: 'text/cql-expression', category: Category::TEXT)]
    case TEXT_CQL_EXPRESSION = 'text/cql-expression';

    /**
     * @link https://www.iana.org/assignments/media-types/text/cql-identifier
     */
    #[Info(name: 'text/cql-identifier', category: Category::TEXT)]
    case TEXT_CQL_IDENTIFIER = 'text/cql-identifier';

    /**
     * @link https://www.iana.org/assignments/media-types/text/css
     */
    #[Info(name: 'text/css', category: Category::TEXT)]
    case TEXT_CSS = 'text/css';

    /**
     * @link https://www.iana.org/assignments/media-types/text/csv
     */
    #[Info(name: 'text/csv', category: Category::TEXT)]
    case TEXT_CSV = 'text/csv';

    /**
     * @link https://www.iana.org/assignments/media-types/text/csv-schema
     */
    #[Info(name: 'text/csv-schema', category: Category::TEXT)]
    case TEXT_CSV_SCHEMA = 'text/csv-schema';

    /**
     * @link https://www.iana.org/assignments/media-types/text/directory
     */
    #[Info(name: 'text/directory', category: Category::TEXT)]
    case TEXT_DIRECTORY = 'text/directory';

    /**
     * @link https://www.iana.org/assignments/media-types/text/dns
     */
    #[Info(name: 'text/dns', category: Category::TEXT)]
    case TEXT_DNS = 'text/dns';

    /**
     * @link https://www.iana.org/assignments/media-types/text/ecmascript
     */
    #[Info(name: 'text/ecmascript', category: Category::TEXT)]
    case TEXT_ECMASCRIPT = 'text/ecmascript';

    /**
     * @link https://www.iana.org/assignments/media-types/text/encaprtp
     */
    #[Info(name: 'text/encaprtp', category: Category::TEXT)]
    case TEXT_ENCAPRTP = 'text/encaprtp';

    /**
     * @link https://www.iana.org/assignments/media-types/text/enriched
     */
    #[Info(name: 'text/enriched', category: Category::TEXT)]
    case TEXT_ENRICHED = 'text/enriched';

    /**
     * @link https://www.iana.org/assignments/media-types/text/example
     */
    #[Info(name: 'text/example', category: Category::TEXT)]
    case TEXT_EXAMPLE = 'text/example';

    /**
     * @link https://www.iana.org/assignments/media-types/text/fhirpath
     */
    #[Info(name: 'text/fhirpath', category: Category::TEXT)]
    case TEXT_FHIRPATH = 'text/fhirpath';

    /**
     * @link https://www.iana.org/assignments/media-types/text/flexfec
     */
    #[Info(name: 'text/flexfec', category: Category::TEXT)]
    case TEXT_FLEXFEC = 'text/flexfec';

    /**
     * @link https://www.iana.org/assignments/media-types/text/fwdred
     */
    #[Info(name: 'text/fwdred', category: Category::TEXT)]
    case TEXT_FWDRED = 'text/fwdred';

    /**
     * @link https://www.iana.org/assignments/media-types/text/gff3
     */
    #[Info(name: 'text/gff3', category: Category::TEXT)]
    case TEXT_GFF3 = 'text/gff3';

    /**
     * @link https://www.iana.org/assignments/media-types/text/grammar-ref-list
     */
    #[Info(name: 'text/grammar-ref-list', category: Category::TEXT)]
    case TEXT_GRAMMAR_REF_LIST = 'text/grammar-ref-list';

    /**
     * @link https://www.iana.org/assignments/media-types/text/html
     */
    #[Info(name: 'text/html', category: Category::TEXT)]
    case TEXT_HTML = 'text/html';

    /**
     * @link https://www.iana.org/assignments/media-types/text/javascript
     */
    #[Info(name: 'text/javascript', category: Category::TEXT)]
    case TEXT_JAVASCRIPT = 'text/javascript';

    /**
     * @link https://www.iana.org/assignments/media-types/text/jcr-cnd
     */
    #[Info(name: 'text/jcr-cnd', category: Category::TEXT)]
    case TEXT_JCR_CND = 'text/jcr-cnd';

    /**
     * @link https://www.iana.org/assignments/media-types/text/markdown
     */
    #[Info(name: 'text/markdown', category: Category::TEXT)]
    case TEXT_MARKDOWN = 'text/markdown';

    /**
     * @link https://www.iana.org/assignments/media-types/text/mizar
     */
    #[Info(name: 'text/mizar', category: Category::TEXT)]
    case TEXT_MIZAR = 'text/mizar';

    /**
     * @link https://www.iana.org/assignments/media-types/text/n3
     */
    #[Info(name: 'text/n3', category: Category::TEXT)]
    case TEXT_N3 = 'text/n3';

    /**
     * @link https://www.iana.org/assignments/media-types/text/parameters
     */
    #[Info(name: 'text/parameters', category: Category::TEXT)]
    case TEXT_PARAMETERS = 'text/parameters';

    /**
     * @link https://www.iana.org/assignments/media-types/text/parityfec
     */
    #[Info(name: 'text/parityfec', category: Category::TEXT)]
    case TEXT_PARITYFEC = 'text/parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/text/plain
     */
    #[Info(name: 'text/plain', category: Category::TEXT)]
    case TEXT_PLAIN = 'text/plain';

    /**
     * @link https://www.iana.org/assignments/media-types/text/provenance-notation
     */
    #[Info(name: 'text/provenance-notation', category: Category::TEXT)]
    case TEXT_PROVENANCE_NOTATION = 'text/provenance-notation';

    /**
     * @link https://www.iana.org/assignments/media-types/text/prs.fallenstein.rst
     */
    #[Info(name: 'text/prs.fallenstein.rst', category: Category::TEXT)]
    case TEXT_PRS_FALLENSTEIN_RST = 'text/prs.fallenstein.rst';

    /**
     * @link https://www.iana.org/assignments/media-types/text/prs.lines.tag
     */
    #[Info(name: 'text/prs.lines.tag', category: Category::TEXT)]
    case TEXT_PRS_LINES_TAG = 'text/prs.lines.tag';

    /**
     * @link https://www.iana.org/assignments/media-types/text/prs.prop.logic
     */
    #[Info(name: 'text/prs.prop.logic', category: Category::TEXT)]
    case TEXT_PRS_PROP_LOGIC = 'text/prs.prop.logic';

    /**
     * @link https://www.iana.org/assignments/media-types/text/raptorfec
     */
    #[Info(name: 'text/raptorfec', category: Category::TEXT)]
    case TEXT_RAPTORFEC = 'text/raptorfec';

    /**
     * @link https://www.iana.org/assignments/media-types/text/RED
     */
    #[Info(name: 'text/RED', category: Category::TEXT)]
    case TEXT_RED = 'text/red';

    /**
     * @link https://www.iana.org/assignments/media-types/text/rfc822-headers
     */
    #[Info(name: 'text/rfc822-headers', category: Category::TEXT)]
    case TEXT_RFC822_HEADERS = 'text/rfc822-headers';

    /**
     * @link https://www.iana.org/assignments/media-types/text/richtext
     */
    #[Info(name: 'text/richtext', category: Category::TEXT)]
    case TEXT_RICHTEXT = 'text/richtext';

    /**
     * @link https://www.iana.org/assignments/media-types/text/rtf
     */
    #[Info(name: 'text/rtf', category: Category::TEXT)]
    case TEXT_RTF = 'text/rtf';

    /**
     * @link https://www.iana.org/assignments/media-types/text/rtp-enc-aescm128
     */
    #[Info(name: 'text/rtp-enc-aescm128', category: Category::TEXT)]
    case TEXT_RTP_ENC_AESCM128 = 'text/rtp-enc-aescm128';

    /**
     * @link https://www.iana.org/assignments/media-types/text/rtploopback
     */
    #[Info(name: 'text/rtploopback', category: Category::TEXT)]
    case TEXT_RTPLOOPBACK = 'text/rtploopback';

    /**
     * @link https://www.iana.org/assignments/media-types/text/rtx
     */
    #[Info(name: 'text/rtx', category: Category::TEXT)]
    case TEXT_RTX = 'text/rtx';

    /**
     * @link https://www.iana.org/assignments/media-types/text/SGML
     */
    #[Info(name: 'text/SGML', category: Category::TEXT)]
    case TEXT_SGML = 'text/sgml';

    /**
     * @link https://www.iana.org/assignments/media-types/text/shaclc
     */
    #[Info(name: 'text/shaclc', category: Category::TEXT)]
    case TEXT_SHACLC = 'text/shaclc';

    /**
     * @link https://www.iana.org/assignments/media-types/text/shex
     */
    #[Info(name: 'text/shex', category: Category::TEXT)]
    case TEXT_SHEX = 'text/shex';

    /**
     * @link https://www.iana.org/assignments/media-types/text/spdx
     */
    #[Info(name: 'text/spdx', category: Category::TEXT)]
    case TEXT_SPDX = 'text/spdx';

    /**
     * @link https://www.iana.org/assignments/media-types/text/strings
     */
    #[Info(name: 'text/strings', category: Category::TEXT)]
    case TEXT_STRINGS = 'text/strings';

    /**
     * @link https://www.iana.org/assignments/media-types/text/t140
     */
    #[Info(name: 'text/t140', category: Category::TEXT)]
    case TEXT_T140 = 'text/t140';

    /**
     * @link https://www.iana.org/assignments/media-types/text/tab-separated-values
     */
    #[Info(name: 'text/tab-separated-values', category: Category::TEXT)]
    case TEXT_TAB_SEPARATED_VALUES = 'text/tab-separated-values';

    /**
     * @link https://www.iana.org/assignments/media-types/text/troff
     */
    #[Info(name: 'text/troff', category: Category::TEXT)]
    case TEXT_TROFF = 'text/troff';

    /**
     * @link https://www.iana.org/assignments/media-types/text/turtle
     */
    #[Info(name: 'text/turtle', category: Category::TEXT)]
    case TEXT_TURTLE = 'text/turtle';

    /**
     * @link https://www.iana.org/assignments/media-types/text/ulpfec
     */
    #[Info(name: 'text/ulpfec', category: Category::TEXT)]
    case TEXT_ULPFEC = 'text/ulpfec';

    /**
     * @link https://www.iana.org/assignments/media-types/text/uri-list
     */
    #[Info(name: 'text/uri-list', category: Category::TEXT)]
    case TEXT_URI_LIST = 'text/uri-list';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vcard
     */
    #[Info(name: 'text/vcard', category: Category::TEXT)]
    case TEXT_VCARD = 'text/vcard';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.a
     */
    #[Info(name: 'text/vnd.a', category: Category::TEXT)]
    case TEXT_VND_A = 'text/vnd.a';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.abc
     */
    #[Info(name: 'text/vnd.abc', category: Category::TEXT)]
    case TEXT_VND_ABC = 'text/vnd.abc';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.ascii-art
     */
    #[Info(name: 'text/vnd.ascii-art', category: Category::TEXT)]
    case TEXT_VND_ASCII_ART = 'text/vnd.ascii-art';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.curl
     */
    #[Info(name: 'text/vnd.curl', category: Category::TEXT)]
    case TEXT_VND_CURL = 'text/vnd.curl';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.debian.copyright
     */
    #[Info(name: 'text/vnd.debian.copyright', category: Category::TEXT)]
    case TEXT_VND_DEBIAN_COPYRIGHT = 'text/vnd.debian.copyright';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.DMClientScript
     */
    #[Info(name: 'text/vnd.DMClientScript', category: Category::TEXT)]
    case TEXT_VND_DMCLIENTSCRIPT = 'text/vnd.dmclientscript';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.dvb.subtitle
     */
    #[Info(name: 'text/vnd.dvb.subtitle', category: Category::TEXT)]
    case TEXT_VND_DVB_SUBTITLE = 'text/vnd.dvb.subtitle';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.esmertec.theme-descriptor
     */
    #[Info(name: 'text/vnd.esmertec.theme-descriptor', category: Category::TEXT)]
    case TEXT_VND_ESMERTEC_THEME_DESCRIPTOR = 'text/vnd.esmertec.theme-descriptor';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.familysearch.gedcom
     */
    #[Info(name: 'text/vnd.familysearch.gedcom', category: Category::TEXT)]
    case TEXT_VND_FAMILYSEARCH_GEDCOM = 'text/vnd.familysearch.gedcom';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.ficlab.flt
     */
    #[Info(name: 'text/vnd.ficlab.flt', category: Category::TEXT)]
    case TEXT_VND_FICLAB_FLT = 'text/vnd.ficlab.flt';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.fly
     */
    #[Info(name: 'text/vnd.fly', category: Category::TEXT)]
    case TEXT_VND_FLY = 'text/vnd.fly';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.fmi.flexstor
     */
    #[Info(name: 'text/vnd.fmi.flexstor', category: Category::TEXT)]
    case TEXT_VND_FMI_FLEXSTOR = 'text/vnd.fmi.flexstor';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.gml
     */
    #[Info(name: 'text/vnd.gml', category: Category::TEXT)]
    case TEXT_VND_GML = 'text/vnd.gml';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.graphviz
     */
    #[Info(name: 'text/vnd.graphviz', category: Category::TEXT)]
    case TEXT_VND_GRAPHVIZ = 'text/vnd.graphviz';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.hans
     */
    #[Info(name: 'text/vnd.hans', category: Category::TEXT)]
    case TEXT_VND_HANS = 'text/vnd.hans';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.hgl
     */
    #[Info(name: 'text/vnd.hgl', category: Category::TEXT)]
    case TEXT_VND_HGL = 'text/vnd.hgl';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.in3d.3dml
     */
    #[Info(name: 'text/vnd.in3d.3dml', category: Category::TEXT)]
    case TEXT_VND_IN3D_3DML = 'text/vnd.in3d.3dml';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.in3d.spot
     */
    #[Info(name: 'text/vnd.in3d.spot', category: Category::TEXT)]
    case TEXT_VND_IN3D_SPOT = 'text/vnd.in3d.spot';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.IPTC.NewsML
     */
    #[Info(name: 'text/vnd.IPTC.NewsML', category: Category::TEXT)]
    case TEXT_VND_IPTC_NEWSML = 'text/vnd.iptc.newsml';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.IPTC.NITF
     */
    #[Info(name: 'text/vnd.IPTC.NITF', category: Category::TEXT)]
    case TEXT_VND_IPTC_NITF = 'text/vnd.iptc.nitf';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.latex-z
     */
    #[Info(name: 'text/vnd.latex-z', category: Category::TEXT)]
    case TEXT_VND_LATEX_Z = 'text/vnd.latex-z';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.motorola.reflex
     */
    #[Info(name: 'text/vnd.motorola.reflex', category: Category::TEXT)]
    case TEXT_VND_MOTOROLA_REFLEX = 'text/vnd.motorola.reflex';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.ms-mediapackage
     */
    #[Info(name: 'text/vnd.ms-mediapackage', category: Category::TEXT)]
    case TEXT_VND_MS_MEDIAPACKAGE = 'text/vnd.ms-mediapackage';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.net2phone.commcenter.command
     */
    #[Info(name: 'text/vnd.net2phone.commcenter.command', category: Category::TEXT)]
    case TEXT_VND_NET2PHONE_COMMCENTER_COMMAND = 'text/vnd.net2phone.commcenter.command';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.radisys.msml-basic-layout
     */
    #[Info(name: 'text/vnd.radisys.msml-basic-layout', category: Category::TEXT)]
    case TEXT_VND_RADISYS_MSML_BASIC_LAYOUT = 'text/vnd.radisys.msml-basic-layout';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.senx.warpscript
     */
    #[Info(name: 'text/vnd.senx.warpscript', category: Category::TEXT)]
    case TEXT_VND_SENX_WARPSCRIPT = 'text/vnd.senx.warpscript';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.si.uricatalogue
     */
    #[Info(name: 'text/vnd.si.uricatalogue', category: Category::TEXT)]
    case TEXT_VND_SI_URICATALOGUE = 'text/vnd.si.uricatalogue';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.sun.j2me.app-descriptor
     */
    #[Info(name: 'text/vnd.sun.j2me.app-descriptor', category: Category::TEXT)]
    case TEXT_VND_SUN_J2ME_APP_DESCRIPTOR = 'text/vnd.sun.j2me.app-descriptor';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.sosi
     */
    #[Info(name: 'text/vnd.sosi', category: Category::TEXT)]
    case TEXT_VND_SOSI = 'text/vnd.sosi';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.trolltech.linguist
     */
    #[Info(name: 'text/vnd.trolltech.linguist', category: Category::TEXT)]
    case TEXT_VND_TROLLTECH_LINGUIST = 'text/vnd.trolltech.linguist';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.wap.si
     */
    #[Info(name: 'text/vnd.wap.si', category: Category::TEXT)]
    case TEXT_VND_WAP_SI = 'text/vnd.wap.si';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.wap.sl
     */
    #[Info(name: 'text/vnd.wap.sl', category: Category::TEXT)]
    case TEXT_VND_WAP_SL = 'text/vnd.wap.sl';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.wap.wml
     */
    #[Info(name: 'text/vnd.wap.wml', category: Category::TEXT)]
    case TEXT_VND_WAP_WML = 'text/vnd.wap.wml';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vnd.wap.wmlscript
     */
    #[Info(name: 'text/vnd.wap.wmlscript', category: Category::TEXT)]
    case TEXT_VND_WAP_WMLSCRIPT = 'text/vnd.wap.wmlscript';

    /**
     * @link https://www.iana.org/assignments/media-types/text/vtt
     */
    #[Info(name: 'text/vtt', category: Category::TEXT)]
    case TEXT_VTT = 'text/vtt';

    /**
     * @link https://www.iana.org/assignments/media-types/text/xml
     */
    #[Info(name: 'text/xml', category: Category::TEXT)]
    case TEXT_XML = 'text/xml';

    /**
     * @link https://www.iana.org/assignments/media-types/text/xml-external-parsed-entity
     */
    #[Info(name: 'text/xml-external-parsed-entity', category: Category::TEXT)]
    case TEXT_XML_EXTERNAL_PARSED_ENTITY = 'text/xml-external-parsed-entity';

    /**
     * @link https://www.iana.org/assignments/media-types/video/1d-interleaved-parityfec
     */
    #[Info(name: 'video/1d-interleaved-parityfec', category: Category::VIDEO)]
    case VIDEO_1D_INTERLEAVED_PARITYFEC = 'video/1d-interleaved-parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/video/3gpp
     */
    #[Info(name: 'video/3gpp', category: Category::VIDEO)]
    case VIDEO_3GPP = 'video/3gpp';

    /**
     * @link https://www.iana.org/assignments/media-types/video/3gpp2
     */
    #[Info(name: 'video/3gpp2', category: Category::VIDEO)]
    case VIDEO_3GPP2 = 'video/3gpp2';

    /**
     * @link https://www.iana.org/assignments/media-types/video/3gpp-tt
     */
    #[Info(name: 'video/3gpp-tt', category: Category::VIDEO)]
    case VIDEO_3GPP_TT = 'video/3gpp-tt';

    /**
     * @link https://www.iana.org/assignments/media-types/video/AV1
     */
    #[Info(name: 'video/AV1', category: Category::VIDEO)]
    case VIDEO_AV1 = 'video/av1';

    /**
     * @link https://www.iana.org/assignments/media-types/video/BMPEG
     */
    #[Info(name: 'video/BMPEG', category: Category::VIDEO)]
    case VIDEO_BMPEG = 'video/bmpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/video/BT656
     */
    #[Info(name: 'video/BT656', category: Category::VIDEO)]
    case VIDEO_BT656 = 'video/bt656';

    /**
     * @link https://www.iana.org/assignments/media-types/video/CelB
     */
    #[Info(name: 'video/CelB', category: Category::VIDEO)]
    case VIDEO_CELB = 'video/celb';

    /**
     * @link https://www.iana.org/assignments/media-types/video/DV
     */
    #[Info(name: 'video/DV', category: Category::VIDEO)]
    case VIDEO_DV = 'video/dv';

    /**
     * @link https://www.iana.org/assignments/media-types/video/encaprtp
     */
    #[Info(name: 'video/encaprtp', category: Category::VIDEO)]
    case VIDEO_ENCAPRTP = 'video/encaprtp';

    /**
     * @link https://www.iana.org/assignments/media-types/video/example
     */
    #[Info(name: 'video/example', category: Category::VIDEO)]
    case VIDEO_EXAMPLE = 'video/example';

    /**
     * @link https://www.iana.org/assignments/media-types/video/FFV1
     */
    #[Info(name: 'video/FFV1', category: Category::VIDEO)]
    case VIDEO_FFV1 = 'video/ffv1';

    /**
     * @link https://www.iana.org/assignments/media-types/video/flexfec
     */
    #[Info(name: 'video/flexfec', category: Category::VIDEO)]
    case VIDEO_FLEXFEC = 'video/flexfec';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H261
     */
    #[Info(name: 'video/H261', category: Category::VIDEO)]
    case VIDEO_H261 = 'video/h261';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H263
     */
    #[Info(name: 'video/H263', category: Category::VIDEO)]
    case VIDEO_H263 = 'video/h263';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H263-1998
     */
    #[Info(name: 'video/H263-1998', category: Category::VIDEO)]
    case VIDEO_H263_1998 = 'video/h263-1998';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H263-2000
     */
    #[Info(name: 'video/H263-2000', category: Category::VIDEO)]
    case VIDEO_H263_2000 = 'video/h263-2000';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H264
     */
    #[Info(name: 'video/H264', category: Category::VIDEO)]
    case VIDEO_H264 = 'video/h264';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H264-RCDO
     */
    #[Info(name: 'video/H264-RCDO', category: Category::VIDEO)]
    case VIDEO_H264_RCDO = 'video/h264-rcdo';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H264-SVC
     */
    #[Info(name: 'video/H264-SVC', category: Category::VIDEO)]
    case VIDEO_H264_SVC = 'video/h264-svc';

    /**
     * @link https://www.iana.org/assignments/media-types/video/H265
     */
    #[Info(name: 'video/H265', category: Category::VIDEO)]
    case VIDEO_H265 = 'video/h265';

    /**
     * @link https://www.iana.org/assignments/media-types/video/iso.segment
     */
    #[Info(name: 'video/iso.segment', category: Category::VIDEO)]
    case VIDEO_ISO_SEGMENT = 'video/iso.segment';

    /**
     * @link https://www.iana.org/assignments/media-types/video/JPEG
     */
    #[Info(name: 'video/JPEG', category: Category::VIDEO)]
    case VIDEO_JPEG = 'video/jpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/video/jpeg2000
     */
    #[Info(name: 'video/jpeg2000', category: Category::VIDEO)]
    case VIDEO_JPEG2000 = 'video/jpeg2000';

    /**
     * @link https://www.iana.org/assignments/media-types/video/jxsv
     */
    #[Info(name: 'video/jxsv', category: Category::VIDEO)]
    case VIDEO_JXSV = 'video/jxsv';

    /**
     * @link https://www.iana.org/assignments/media-types/video/mj2
     */
    #[Info(name: 'video/mj2', category: Category::VIDEO)]
    case VIDEO_MJ2 = 'video/mj2';

    /**
     * @link https://www.iana.org/assignments/media-types/video/MP1S
     */
    #[Info(name: 'video/MP1S', category: Category::VIDEO)]
    case VIDEO_MP1S = 'video/mp1s';

    /**
     * @link https://www.iana.org/assignments/media-types/video/MP2P
     */
    #[Info(name: 'video/MP2P', category: Category::VIDEO)]
    case VIDEO_MP2P = 'video/mp2p';

    /**
     * @link https://www.iana.org/assignments/media-types/video/MP2T
     */
    #[Info(name: 'video/MP2T', category: Category::VIDEO)]
    case VIDEO_MP2T = 'video/mp2t';

    /**
     * @link https://www.iana.org/assignments/media-types/video/mp4
     */
    #[Info(name: 'video/mp4', category: Category::VIDEO)]
    case VIDEO_MP4 = 'video/mp4';

    /**
     * @link https://www.iana.org/assignments/media-types/video/MP4V-ES
     */
    #[Info(name: 'video/MP4V-ES', category: Category::VIDEO)]
    case VIDEO_MP4V_ES = 'video/mp4v-es';

    /**
     * @link https://www.iana.org/assignments/media-types/video/MPV
     */
    #[Info(name: 'video/MPV', category: Category::VIDEO)]
    case VIDEO_MPV = 'video/mpv';

    /**
     * @link https://www.iana.org/assignments/media-types/video/mpeg
     */
    #[Info(name: 'video/mpeg', category: Category::VIDEO)]
    case VIDEO_MPEG = 'video/mpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/video/mpeg4-generic
     */
    #[Info(name: 'video/mpeg4-generic', category: Category::VIDEO)]
    case VIDEO_MPEG4_GENERIC = 'video/mpeg4-generic';

    /**
     * @link https://www.iana.org/assignments/media-types/video/nv
     */
    #[Info(name: 'video/nv', category: Category::VIDEO)]
    case VIDEO_NV = 'video/nv';

    /**
     * @link https://www.iana.org/assignments/media-types/video/ogg
     */
    #[Info(name: 'video/ogg', category: Category::VIDEO)]
    case VIDEO_OGG = 'video/ogg';

    /**
     * @link https://www.iana.org/assignments/media-types/video/parityfec
     */
    #[Info(name: 'video/parityfec', category: Category::VIDEO)]
    case VIDEO_PARITYFEC = 'video/parityfec';

    /**
     * @link https://www.iana.org/assignments/media-types/video/pointer
     */
    #[Info(name: 'video/pointer', category: Category::VIDEO)]
    case VIDEO_POINTER = 'video/pointer';

    /**
     * @link https://www.iana.org/assignments/media-types/video/quicktime
     */
    #[Info(name: 'video/quicktime', category: Category::VIDEO)]
    case VIDEO_QUICKTIME = 'video/quicktime';

    /**
     * @link https://www.iana.org/assignments/media-types/video/raptorfec
     */
    #[Info(name: 'video/raptorfec', category: Category::VIDEO)]
    case VIDEO_RAPTORFEC = 'video/raptorfec';

    /**
     * @link https://www.iana.org/assignments/media-types/video/raw
     */
    #[Info(name: 'video/raw', category: Category::VIDEO)]
    case VIDEO_RAW = 'video/raw';

    /**
     * @link https://www.iana.org/assignments/media-types/video/rtp-enc-aescm128
     */
    #[Info(name: 'video/rtp-enc-aescm128', category: Category::VIDEO)]
    case VIDEO_RTP_ENC_AESCM128 = 'video/rtp-enc-aescm128';

    /**
     * @link https://www.iana.org/assignments/media-types/video/rtploopback
     */
    #[Info(name: 'video/rtploopback', category: Category::VIDEO)]
    case VIDEO_RTPLOOPBACK = 'video/rtploopback';

    /**
     * @link https://www.iana.org/assignments/media-types/video/rtx
     */
    #[Info(name: 'video/rtx', category: Category::VIDEO)]
    case VIDEO_RTX = 'video/rtx';

    /**
     * @link https://www.iana.org/assignments/media-types/video/scip
     */
    #[Info(name: 'video/scip', category: Category::VIDEO)]
    case VIDEO_SCIP = 'video/scip';

    /**
     * @link https://www.iana.org/assignments/media-types/video/smpte291
     */
    #[Info(name: 'video/smpte291', category: Category::VIDEO)]
    case VIDEO_SMPTE291 = 'video/smpte291';

    /**
     * @link https://www.iana.org/assignments/media-types/video/SMPTE292M
     */
    #[Info(name: 'video/SMPTE292M', category: Category::VIDEO)]
    case VIDEO_SMPTE292M = 'video/smpte292m';

    /**
     * @link https://www.iana.org/assignments/media-types/video/ulpfec
     */
    #[Info(name: 'video/ulpfec', category: Category::VIDEO)]
    case VIDEO_ULPFEC = 'video/ulpfec';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vc1
     */
    #[Info(name: 'video/vc1', category: Category::VIDEO)]
    case VIDEO_VC1 = 'video/vc1';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vc2
     */
    #[Info(name: 'video/vc2', category: Category::VIDEO)]
    case VIDEO_VC2 = 'video/vc2';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.CCTV
     */
    #[Info(name: 'video/vnd.CCTV', category: Category::VIDEO)]
    case VIDEO_VND_CCTV = 'video/vnd.cctv';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dece.hd
     */
    #[Info(name: 'video/vnd.dece.hd', category: Category::VIDEO)]
    case VIDEO_VND_DECE_HD = 'video/vnd.dece.hd';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dece.mobile
     */
    #[Info(name: 'video/vnd.dece.mobile', category: Category::VIDEO)]
    case VIDEO_VND_DECE_MOBILE = 'video/vnd.dece.mobile';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dece.mp4
     */
    #[Info(name: 'video/vnd.dece.mp4', category: Category::VIDEO)]
    case VIDEO_VND_DECE_MP4 = 'video/vnd.dece.mp4';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dece.pd
     */
    #[Info(name: 'video/vnd.dece.pd', category: Category::VIDEO)]
    case VIDEO_VND_DECE_PD = 'video/vnd.dece.pd';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dece.sd
     */
    #[Info(name: 'video/vnd.dece.sd', category: Category::VIDEO)]
    case VIDEO_VND_DECE_SD = 'video/vnd.dece.sd';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dece.video
     */
    #[Info(name: 'video/vnd.dece.video', category: Category::VIDEO)]
    case VIDEO_VND_DECE_VIDEO = 'video/vnd.dece.video';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.directv.mpeg
     */
    #[Info(name: 'video/vnd.directv.mpeg', category: Category::VIDEO)]
    case VIDEO_VND_DIRECTV_MPEG = 'video/vnd.directv.mpeg';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.directv.mpeg-tts
     */
    #[Info(name: 'video/vnd.directv.mpeg-tts', category: Category::VIDEO)]
    case VIDEO_VND_DIRECTV_MPEG_TTS = 'video/vnd.directv.mpeg-tts';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dlna.mpeg-tts
     */
    #[Info(name: 'video/vnd.dlna.mpeg-tts', category: Category::VIDEO)]
    case VIDEO_VND_DLNA_MPEG_TTS = 'video/vnd.dlna.mpeg-tts';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.dvb.file
     */
    #[Info(name: 'video/vnd.dvb.file', category: Category::VIDEO)]
    case VIDEO_VND_DVB_FILE = 'video/vnd.dvb.file';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.fvt
     */
    #[Info(name: 'video/vnd.fvt', category: Category::VIDEO)]
    case VIDEO_VND_FVT = 'video/vnd.fvt';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.hns.video
     */
    #[Info(name: 'video/vnd.hns.video', category: Category::VIDEO)]
    case VIDEO_VND_HNS_VIDEO = 'video/vnd.hns.video';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.iptvforum.1dparityfec-1010
     */
    #[Info(name: 'video/vnd.iptvforum.1dparityfec-1010', category: Category::VIDEO)]
    case VIDEO_VND_IPTVFORUM_1DPARITYFEC_1010 = 'video/vnd.iptvforum.1dparityfec-1010';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.iptvforum.1dparityfec-2005
     */
    #[Info(name: 'video/vnd.iptvforum.1dparityfec-2005', category: Category::VIDEO)]
    case VIDEO_VND_IPTVFORUM_1DPARITYFEC_2005 = 'video/vnd.iptvforum.1dparityfec-2005';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.iptvforum.2dparityfec-1010
     */
    #[Info(name: 'video/vnd.iptvforum.2dparityfec-1010', category: Category::VIDEO)]
    case VIDEO_VND_IPTVFORUM_2DPARITYFEC_1010 = 'video/vnd.iptvforum.2dparityfec-1010';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.iptvforum.2dparityfec-2005
     */
    #[Info(name: 'video/vnd.iptvforum.2dparityfec-2005', category: Category::VIDEO)]
    case VIDEO_VND_IPTVFORUM_2DPARITYFEC_2005 = 'video/vnd.iptvforum.2dparityfec-2005';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.iptvforum.ttsavc
     */
    #[Info(name: 'video/vnd.iptvforum.ttsavc', category: Category::VIDEO)]
    case VIDEO_VND_IPTVFORUM_TTSAVC = 'video/vnd.iptvforum.ttsavc';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.iptvforum.ttsmpeg2
     */
    #[Info(name: 'video/vnd.iptvforum.ttsmpeg2', category: Category::VIDEO)]
    case VIDEO_VND_IPTVFORUM_TTSMPEG2 = 'video/vnd.iptvforum.ttsmpeg2';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.motorola.video
     */
    #[Info(name: 'video/vnd.motorola.video', category: Category::VIDEO)]
    case VIDEO_VND_MOTOROLA_VIDEO = 'video/vnd.motorola.video';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.motorola.videop
     */
    #[Info(name: 'video/vnd.motorola.videop', category: Category::VIDEO)]
    case VIDEO_VND_MOTOROLA_VIDEOP = 'video/vnd.motorola.videop';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.mpegurl
     */
    #[Info(name: 'video/vnd.mpegurl', category: Category::VIDEO)]
    case VIDEO_VND_MPEGURL = 'video/vnd.mpegurl';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.ms-playready.media.pyv
     */
    #[Info(name: 'video/vnd.ms-playready.media.pyv', category: Category::VIDEO)]
    case VIDEO_VND_MS_PLAYREADY_MEDIA_PYV = 'video/vnd.ms-playready.media.pyv';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.nokia.interleaved-multimedia
     */
    #[Info(name: 'video/vnd.nokia.interleaved-multimedia', category: Category::VIDEO)]
    case VIDEO_VND_NOKIA_INTERLEAVED_MULTIMEDIA = 'video/vnd.nokia.interleaved-multimedia';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.nokia.mp4vr
     */
    #[Info(name: 'video/vnd.nokia.mp4vr', category: Category::VIDEO)]
    case VIDEO_VND_NOKIA_MP4VR = 'video/vnd.nokia.mp4vr';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.nokia.videovoip
     */
    #[Info(name: 'video/vnd.nokia.videovoip', category: Category::VIDEO)]
    case VIDEO_VND_NOKIA_VIDEOVOIP = 'video/vnd.nokia.videovoip';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.objectvideo
     */
    #[Info(name: 'video/vnd.objectvideo', category: Category::VIDEO)]
    case VIDEO_VND_OBJECTVIDEO = 'video/vnd.objectvideo';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.radgamettools.bink
     */
    #[Info(name: 'video/vnd.radgamettools.bink', category: Category::VIDEO)]
    case VIDEO_VND_RADGAMETTOOLS_BINK = 'video/vnd.radgamettools.bink';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.radgamettools.smacker
     */
    #[Info(name: 'video/vnd.radgamettools.smacker', category: Category::VIDEO)]
    case VIDEO_VND_RADGAMETTOOLS_SMACKER = 'video/vnd.radgamettools.smacker';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.sealed.mpeg1
     */
    #[Info(name: 'video/vnd.sealed.mpeg1', category: Category::VIDEO)]
    case VIDEO_VND_SEALED_MPEG1 = 'video/vnd.sealed.mpeg1';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.sealed.mpeg4
     */
    #[Info(name: 'video/vnd.sealed.mpeg4', category: Category::VIDEO)]
    case VIDEO_VND_SEALED_MPEG4 = 'video/vnd.sealed.mpeg4';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.sealed.swf
     */
    #[Info(name: 'video/vnd.sealed.swf', category: Category::VIDEO)]
    case VIDEO_VND_SEALED_SWF = 'video/vnd.sealed.swf';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.sealedmedia.softseal.mov
     */
    #[Info(name: 'video/vnd.sealedmedia.softseal.mov', category: Category::VIDEO)]
    case VIDEO_VND_SEALEDMEDIA_SOFTSEAL_MOV = 'video/vnd.sealedmedia.softseal.mov';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.uvvu.mp4
     */
    #[Info(name: 'video/vnd.uvvu.mp4', category: Category::VIDEO)]
    case VIDEO_VND_UVVU_MP4 = 'video/vnd.uvvu.mp4';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.youtube.yt
     */
    #[Info(name: 'video/vnd.youtube.yt', category: Category::VIDEO)]
    case VIDEO_VND_YOUTUBE_YT = 'video/vnd.youtube.yt';

    /**
     * @link https://www.iana.org/assignments/media-types/video/vnd.vivo
     */
    #[Info(name: 'video/vnd.vivo', category: Category::VIDEO)]
    case VIDEO_VND_VIVO = 'video/vnd.vivo';

    /**
     * @link https://www.iana.org/assignments/media-types/video/VP8
     */
    #[Info(name: 'video/VP8', category: Category::VIDEO)]
    case VIDEO_VP8 = 'video/vp8';

    /**
     * @link https://www.iana.org/assignments/media-types/video/VP9
     */
    #[Info(name: 'video/VP9', category: Category::VIDEO)]
    case VIDEO_VP9 = 'video/vp9';

    /**
     * @param non-empty-string $name
     * @return TypeInterface
     */
    public static function create(string $name): TypeInterface
    {
        /**
         * Local identity map for CustomType objects.
         *
         * @var array<non-empty-lowercase-string, CustomType> $memory
         */
        static $memory = [];

        $lower = \strtolower($name);

        return self::tryFrom($lower)
            ?? $memory[$lower]
            ??= CustomType::create($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        $info = $this->getInfo();

        return $info->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getCategory(): CategoryInterface
    {
        $info = $this->getInfo();

        return $info->category;
    }

    /**
     * @return Info
     */
    private function getInfo(): Info
    {
        /**
         * Local identity map for Info metadata objects.
         *
         * @var array<non-empty-string, Info> $memory
         */
        static $memory = [];

        if (isset($memory[$this->name])) {
            return $memory[$this->name];
        }

        $attributes = (new \ReflectionEnumBackedCase(self::class, $this->name))
            ->getAttributes(Info::class);

        if (isset($attributes[0])) {
            return $memory[$this->name] = $attributes[0]->newInstance();
        }

        throw new \LogicException('Could not load MIME type [' . $this->name . '] info');
    }
}
