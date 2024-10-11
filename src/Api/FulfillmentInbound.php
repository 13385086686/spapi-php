<?php
/**
* This class is autogenerated by the Spapi class generator
* Date of generation: 2022-01-09
* Specification: https://github.com/amzn/selling-partner-api-models/blob/main/models/fulfillment-inbound-api-model/fulfillmentInboundV0.json
* Source MD5 signature: 0a39b3e7ccbe17011aa94d5044a962aa
*
*
* Selling Partner API for Fulfillment Inbound
* The Selling Partner API for Fulfillment Inbound lets you create applications that create and update inbound shipments of inventory to Amazon's fulfillment network.
*/
namespace DoubleBreak\Spapi\Api;
use DoubleBreak\Spapi\Client;

class FulfillmentInbound extends Client {

  /**
  * Operation getInboundGuidance
  *
  * @param array $queryParams
  *    - *marketplaceId* string - A marketplace identifier. Specifies the marketplace where the product would be stored.
  *    - *sellerSKUList* array - A list of SellerSKU values. Used to identify items for which you want inbound guidance for shipment to Amazon's fulfillment network. Note: SellerSKU is qualified by the SellerId, which is included with every Selling Partner API operation that you submit. If you specify a SellerSKU that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold. 
  *    - *aSINList* array - A list of ASIN values. Used to identify items for which you want inbound guidance for shipment to Amazon's fulfillment network. Note: If you specify a ASIN that identifies a variation parent ASIN, this operation returns an error. A variation parent ASIN represents a generic product that cannot be sold. Variation child ASINs represent products that have specific characteristics (such as size and color) and can be sold.
  *
  */
  public function getInboundGuidance($queryParams = [])
  {
    return $this->send("/fba/inbound/v0/itemsGuidance", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getInboundGuidanceAsync($queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/itemsGuidance", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation createInboundShipmentPlan
  *
  */
  public function createInboundShipmentPlan($body = [])
  {
    return $this->send("/fba/inbound/v0/plans", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  public function createInboundShipmentPlanAsync($body = [])
  {
    return $this->sendAsync("/fba/inbound/v0/plans", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  /**
  * Operation createInboundShipment
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function createInboundShipment($shipmentId, $body = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  public function createInboundShipmentAsync($shipmentId, $body = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}", [
      'method' => 'POST',
      'json' => $body
    ]);
  }

  /**
  * Operation updateInboundShipment
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function updateInboundShipment($shipmentId, $body = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}", [
      'method' => 'PUT',
      'json' => $body
    ]);
  }

  public function updateInboundShipmentAsync($shipmentId, $body = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}", [
      'method' => 'PUT',
      'json' => $body
    ]);
  }

  /**
  * Operation getPreorderInfo
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  * @param array $queryParams
  *    - *marketplaceId* string - A marketplace identifier. Specifies the marketplace the shipment is tied to.
  *
  */
  public function getPreorderInfo($shipmentId, $queryParams = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/preorder", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getPreorderInfoAsync($shipmentId, $queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/preorder", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation confirmPreorder
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  * @param array $queryParams
  *    - *needByDate* string - Date that the shipment must arrive at the Amazon fulfillment center to avoid delivery promise breaks for pre-ordered items. Must be in YYYY-MM-DD format. The response to the getPreorderInfo operation returns this value.
  *    - *marketplaceId* string - A marketplace identifier. Specifies the marketplace the shipment is tied to.
  *
  */
  public function confirmPreorder($shipmentId, $queryParams = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/preorder/confirm", [
      'method' => 'PUT',
      'query' => $queryParams,
    ]);
  }

  public function confirmPreorderAsync($shipmentId, $queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/preorder/confirm", [
      'method' => 'PUT',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getPrepInstructions
  *
  * @param array $queryParams
  *    - *shipToCountryCode* string - The country code of the country to which the items will be shipped. Note that labeling requirements and item preparation instructions can vary by country.
  *    - *sellerSKUList* array - A list of SellerSKU values. Used to identify items for which you want labeling requirements and item preparation instructions for shipment to Amazon's fulfillment network. The SellerSKU is qualified by the Seller ID, which is included with every call to the Seller Partner API.
  *
  *Note: Include seller SKUs that you have used to list items on Amazon's retail website. If you include a seller SKU that you have never used to list an item on Amazon's retail website, the seller SKU is returned in the InvalidSKUList property in the response.
  *    - *aSINList* array - A list of ASIN values. Used to identify items for which you want item preparation instructions to help with item sourcing decisions.
  *
  *Note: ASINs must be included in the product catalog for at least one of the marketplaces that the seller  participates in. Any ASIN that is not included in the product catalog for at least one of the marketplaces that the seller participates in is returned in the InvalidASINList property in the response. You can find out which marketplaces a seller participates in by calling the getMarketplaceParticipations operation in the Selling Partner API for Sellers.
  *
  */
  public function getPrepInstructions($queryParams = [])
  {
    return $this->send("/fba/inbound/v0/prepInstructions", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getPrepInstructionsAsync($queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/prepInstructions", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getTransportDetails
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function getTransportDetails($shipmentId)
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/transport", [
      'method' => 'GET',
    ]);
  }

  public function getTransportDetailsAsync($shipmentId)
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/transport", [
      'method' => 'GET',
    ]);
  }

  /**
  * Operation putTransportDetails
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function putTransportDetails($shipmentId, $body = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/transport", [
      'method' => 'PUT',
      'json' => $body
    ]);
  }

  public function putTransportDetailsAsync($shipmentId, $body = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/transport", [
      'method' => 'PUT',
      'json' => $body
    ]);
  }

  /**
  * Operation voidTransport
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function voidTransport($shipmentId)
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/transport/void", [
      'method' => 'POST',
    ]);
  }

  public function voidTransportAsync($shipmentId)
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/transport/void", [
      'method' => 'POST',
    ]);
  }

  /**
  * Operation estimateTransport
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function estimateTransport($shipmentId)
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/transport/estimate", [
      'method' => 'POST',
    ]);
  }

  public function estimateTransportAsync($shipmentId)
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/transport/estimate", [
      'method' => 'POST',
    ]);
  }

  /**
  * Operation confirmTransport
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function confirmTransport($shipmentId)
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/transport/confirm", [
      'method' => 'POST',
    ]);
  }

  public function confirmTransportAsync($shipmentId)
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/transport/confirm", [
      'method' => 'POST',
    ]);
  }

  /**
  * Operation getLabels
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  * @param array $queryParams
  *    - *pageType* string - The page type to use to print the labels. Submitting a PageType value that is not supported in your marketplace returns an error.
  *    - *labelType* string - The type of labels requested. 
  *    - *numberOfPackages* integer - The number of packages in the shipment.
  *    - *packageLabelsToPrint* array - A list of identifiers that specify packages for which you want package labels printed.
  *
  *Must match CartonId values previously passed using the FBA Inbound Shipment Carton Information Feed. If not, the operation returns the IncorrectPackageIdentifier error code.
  *    - *numberOfPallets* integer - The number of pallets in the shipment. This returns four identical labels for each pallet.
  *    - *pageSize* integer - The page size for paginating through the total packages' labels. This is a required parameter for Non-Partnered LTL Shipments. Max value:1000.
  *    - *pageStartIndex* integer - The page start index for paginating through the total packages' labels. This is a required parameter for Non-Partnered LTL Shipments.
  *
  */
  public function getLabels($shipmentId, $queryParams = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/labels", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getLabelsAsync($shipmentId, $queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/labels", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getBillOfLading
  *
  * @param string $shipmentId A shipment identifier originally returned by the createInboundShipmentPlan operation.
  *
  */
  public function getBillOfLading($shipmentId)
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/billOfLading", [
      'method' => 'GET',
    ]);
  }

  public function getBillOfLadingAsync($shipmentId)
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/billOfLading", [
      'method' => 'GET',
    ]);
  }

  /**
  * Operation getShipments
  *
  * @param array $queryParams
  *    - *shipmentStatusList* array - A list of ShipmentStatus values. Used to select shipments with a current status that matches the status values that you specify.
  *    - *shipmentIdList* array - A list of shipment IDs used to select the shipments that you want. If both ShipmentStatusList and ShipmentIdList are specified, only shipments that match both parameters are returned.
  *    - *lastUpdatedAfter* string - A date used for selecting inbound shipments that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller.
  *    - *lastUpdatedBefore* string - A date used for selecting inbound shipments that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller.
  *    - *queryType* string - Indicates whether shipments are returned using shipment information (by providing the ShipmentStatusList or ShipmentIdList parameters), using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or by using NextToken to continue returning items specified in a previous request.
  *    - *nextToken* string - A string token returned in the response to your previous request.
  *    - *marketplaceId* string - A marketplace identifier. Specifies the marketplace where the product would be stored.
  *
  */
  public function getShipments($queryParams = [])
  {
    return $this->send("/fba/inbound/v0/shipments", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getShipmentsAsync($queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getShipmentItemsByShipmentId
  *
  * @param string $shipmentId A shipment identifier used for selecting items in a specific inbound shipment.
  *
  * @param array $queryParams
  *    - *marketplaceId* string - A marketplace identifier. Specifies the marketplace where the product would be stored.
  *
  */
  public function getShipmentItemsByShipmentId($shipmentId, $queryParams = [])
  {
    return $this->send("/fba/inbound/v0/shipments/{$shipmentId}/items", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getShipmentItemsByShipmentIdAsync($shipmentId, $queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipments/{$shipmentId}/items", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  /**
  * Operation getShipmentItems
  *
  * @param array $queryParams
  *    - *lastUpdatedAfter* string - A date used for selecting inbound shipment items that were last updated after (or at) a specified time. The selection includes updates made by Amazon and by the seller.
  *    - *lastUpdatedBefore* string - A date used for selecting inbound shipment items that were last updated before (or at) a specified time. The selection includes updates made by Amazon and by the seller.
  *    - *queryType* string - Indicates whether items are returned using a date range (by providing the LastUpdatedAfter and LastUpdatedBefore parameters), or using NextToken, which continues returning items specified in a previous request.
  *    - *nextToken* string - A string token returned in the response to your previous request.
  *    - *marketplaceId* string - A marketplace identifier. Specifies the marketplace where the product would be stored.
  *
  */
  public function getShipmentItems($queryParams = [])
  {
    return $this->send("/fba/inbound/v0/shipmentItems", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function getShipmentItemsAsync($queryParams = [])
  {
    return $this->sendAsync("/fba/inbound/v0/shipmentItems", [
      'method' => 'GET',
      'query' => $queryParams,
    ]);
  }

  public function listInboundPlans($queryParams = [])
  {
      return $this->send("/inbound/fba/2024-03-20/inboundPlans", [
          'method' => 'GET',
          'query' => $queryParams,
      ]);
  }

  public function listInboundPlansAsync($queryParams = [])
  {
      return $this->sendAsync("/inbound/fba/2024-03-20/inboundPlans", [
          'method' => 'GET',
          'query' => $queryParams,
      ]);
  }
}
