<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Services;

use \GoCardlessPro\Core\Paginator;
use \GoCardlessPro\Core\Util;
use \GoCardlessPro\Core\ListResponse;
use \GoCardlessPro\Resources\BillingRequestFlow;
use \GoCardlessPro\Core\Exception\InvalidStateException;


/**
 * Service that provides access to the BillingRequestFlow
 * endpoints of the API
 *
 * @method create()
 * @method initialise()
 */
class BillingRequestFlowsService extends BaseService
{

    protected $envelope_key   = 'billing_request_flows';
    protected $resource_class = '\GoCardlessPro\Resources\BillingRequestFlow';


    /**
     * Create a Billing Request Flow
     *
     * Example URL: /billing_request_flows
     *
     * @param  string[mixed] $params An associative array for any params
     * @return BillingRequestFlow
     **/
    public function create($params = array())
    {
        $path = "/billing_request_flows";
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array($this->envelope_key => (object)$params['params']));
        
            unset($params['params']);
        }

        
        $response = $this->api_client->post($path, $params);
        

        return $this->getResourceForResponse($response);
    }

    /**
     * Initialise a Billing Request Flow
     *
     * Example URL: /billing_request_flows/:identity/actions/initialise
     *
     * @param  string        $identity Unique identifier, beginning with "BRF".
     * @param  string[mixed] $params   An associative array for any params
     * @return BillingRequestFlow
     **/
    public function initialise($identity, $params = array())
    {
        $path = Util::subUrl(
            '/billing_request_flows/:identity/actions/initialise',
            array(
                
                'identity' => $identity
            )
        );
        if(isset($params['params'])) { 
            $params['body'] = json_encode(array("data" => (object)$params['params']));
        
            unset($params['params']);
        }

        
        $response = $this->api_client->post($path, $params);
        

        return $this->getResourceForResponse($response);
    }

}
