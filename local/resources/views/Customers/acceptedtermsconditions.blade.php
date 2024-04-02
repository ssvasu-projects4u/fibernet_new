<html>
<head>
<style>
	    .footer-bg {
    background-color: #0c243b;
    position: relative;
    z-index: 1
}

    .footer-bg::before {
        content: '';
        position: absolute;
        z-index: -1;
        top: 0;
        width: 100%;
        height: 100%;
        left: 0;
        right: 0;
        background-image: url(../images/shape/bg-shape5.png);
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: .1
    }

.footer-widget {
    margin-bottom: 30px
}

    .footer-widget .footer-logo {
        margin-bottom: 20px;
        position: relative;
        top: -5px
    }

    .footer-widget h3 {
        margin-top: 0;
        font-size: 24px;
        margin-bottom: 30px;
        color: #fff;
        line-height: 1.2
    }

    .footer-widget p {
        margin-bottom: 20px;
        color: #fff;
        max-width: 300px
    }

    .footer-widget .footer-call-content {
        background-color: #fff;
        padding: 20px 80px 20px 20px;
        border-radius: 15px;
        position: relative;
        max-width: 345px
    }

        .footer-widget .footer-call-content:hover i {
            background-color: #0071dc;
            color: #fff
        }

        .footer-widget .footer-call-content h3 {
            font-size: 24px;
            line-height: 1;
            margin-bottom: 5px;
            color: #252525
        }

        .footer-widget .footer-call-content span a {
            color: #252525;
            font-weight: 600
        }

            .footer-widget .footer-call-content span a:hover {
                color: #0071dc
            }

        .footer-widget .footer-call-content i {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            font-size: 35px;
            line-height: 60px;
            text-align: center;
            display: inline-block;
            background-color: #e5f3ff;
            color: #0071dc;
            border-radius: 50px;
            -webkit-transition: .7s;
            transition: .7s
        }

    .footer-widget .footer-list {
        list-style: none;
        margin: 0;
        padding: 0
    }

        .footer-widget .footer-list li {
            display: block;
            margin-bottom: 10px;
            font-weight: 500
        }

            .footer-widget .footer-list li:last-child {
                margin-bottom: 0
            }

            .footer-widget .footer-list li a {
                color: #fff;
                font-weight: 400
            }

                .footer-widget .footer-list li a i {
                    font-size: 11px;
                    position: relative;
                    top: 3px;
                    margin-right: 5px
                }

                .footer-widget .footer-list li a:hover {
                    color: #ffc221
                }

    .footer-widget .footer-blog {
        list-style: none;
        margin: 0;
        padding: 0
    }

        .footer-widget .footer-blog li {
            display: block;
            margin-bottom: 20px;
            padding-left: 20px;
            position: relative
        }

            .footer-widget .footer-blog li:hover h3 a {
                color: #ffc221
            }

            .footer-widget .footer-blog li:last-child {
                margin-bottom: 0
            }

            .footer-widget .footer-blog li a {
                display: block
            }

                .footer-widget .footer-blog li a img {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 70px;
                    width: 20px
                }

            .footer-widget .footer-blog li h3 {
                font-size: 16px;
                color: #fff;
                margin-bottom: 5px;
                max-width: 50px
            }

                .footer-widget .footer-blog li h3 a {
                    color: #fff;
                    line-height: 1.4
                }

                    .footer-widget .footer-blog li h3 a:hover {
                        color: #ffc221
                    }

            .footer-widget .footer-blog li span {
                font-size: 14px;
                color: #ffc221
            }

    .footer-widget .newsletter-area .newsletter-form {
        position: relative;
        max-width: 170px;
        border-radius: 5px
    }

        .footer-widget .newsletter-area .newsletter-form .form-control {
            background-color: #fff;
            height: 50px;
            line-height: 50px;
            margin: 0;
            border-radius: 5px;
            border: 0;
            padding: 0 45px 0 15px;
            max-width: 10%;
            color: #252525;
            font-weight: 400
        }

            .footer-widget .newsletter-area .newsletter-form .form-control:focus {
                outline: none;
                -webkit-box-shadow: none;
                box-shadow: none;
                border: none
            }

        .footer-widget .newsletter-area .newsletter-form .subscribe-btn {
            position: absolute;
            top: 3px;
            right: 3px;
            background-color: #0071dc;
            color: #fff;
            height: 45px;
            line-height: 50px;
            width: 15px;
            border: 0;
            border-radius: 5px;
            font-size: 20px;
            -webkit-transition: .5s;
            transition: .5s
        }

            .footer-widget .newsletter-area .newsletter-form .subscribe-btn:hover {
                background: #252525;
                color: #fff
            }

        .footer-widget .newsletter-area .newsletter-form .validation-danger {
            font-size: 18px;
            margin-top: 5px;
            color: red
        }

.copy-right-area {
    padding: 15px 0;
    border-top: 1px solid #fff
}

.copy-right-text {
    text-align: center
}

    .copy-right-text p {
        color: #fff;
        margin-bottom: 0;
		text-align: center;
    }

        .copy-right-text p a {
            color: #ffc221;
            border-bottom: 1px solid #ffc221
        }

            .copy-right-text p a:hover {
                color: #0071dc;
                border-color: #0071dc
            }
            input[type=checkbox] {
  outline: none;
  width: 58px;
  height: 23px;
  font-size: 11px;
  line-height: 2;
  display: block;
  font-weight: bold;
  border-radius: 3px;
  border: 1px solid #B9B9B9;
  -webkit-appearance: none;

  background-image: -webkit-gradient( 
    linear, left top, left bottom,
    color-stop(0, #E8E8E8),
    color-stop(0.5, #E8E8E8),
    color-stop(0.5, #FDFDFD),
    color-stop(1, #FDFDFD)
  );
  box-shadow: 0px 1px 2px #AFAFAF inset;
  color: #7F7F7F;
}

input[type=checkbox]:checked {
  background-image: -webkit-gradient( 
    linear, left top, left bottom,
    color-stop(0, #367EF8),
    color-stop(0.5, #367EF8),
    color-stop(0.5, #66A3F8),
    color-stop(1, #66A3F8)
  );
  box-shadow: 0px 1px 2px #1449A3 inset;
  color: #fff;
  text-shadow: 0px -1px 1px #000;
  border: 1px solid #99B9E8;
}

input[type=checkbox]:before {
  content: 'OFF';
  border-radius: 3px;
  border-top: 1px solid #F7F7F7;
  border-right: 1px solid #999999;
  border-bottom: 1px solid: #BABABA;
  border-left: 1px solid #BDBDBD;
  background-image: -webkit-gradient( 
    linear, left top, left bottom,
    color-stop(0, #D8D8D8),
    color-stop(1, #FBFBFB)
  );
  height: 20px;
  width: 22px;
  display: inline-block;
  text-indent: 27px;
}

input[type=checkbox]:checked:before {
  content: 'ON';
  text-indent: -25px;
  margin-left: 33px;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<title>SLJ</title>
</head>
<body>
    
     <form action="" method="POST" name="formk"><div width="100%" style="width:100%;margin:0 auto!important;padding:0!important;background-color:#f3f3fe" class="m_995168881007390535body">
    <center style="width:100%;margin:0 auto!important;background-color:#f3f3fe">
        
        <input type="hidden" value="" name="customemail" id="customemail">
        <div style="display:none;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden;font-family:'Roboto',sans-serif"></div>
        
<script>
window.onload = function() {
    document.cookie = "hasjs=true";
}
</script>
        
        
        <div style="display:none;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden;font-family:'Roboto',sans-serif">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;<wbr>&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        
        
        
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="700" style="width:700px;margin:0 auto" class="m_995168881007390535email-container">
            <tbody>
                <tr>
                    <td>
                        <img id="m_995168881007390535trackCode_eee" width="1" height="1" role="presentation" src="https://production.sljfibernetworks.com/assets/img/logo.png" style="overflow:hidden;max-height:0;width:1px;height:1px;display:none" class="CToWUd" data-bit="iit" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlLDJd">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img id="m_995168881007390535trackCode_evr" width="1" height="1" role="presentation" src="https://production.sljfibernetworks.com/assets/img/logo.png" style="overflow:hidden;max-height:0;width:1px;height:1px;display:none" class="CToWUd" data-bit="iit">
                    </td>
                </tr>
            </tbody>
        </table>
        
        
		
		<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="800" style="width:800px;margin:0 auto;text-align:center" class="m_995168881007390535email-container">
			<tbody><tr>
				<td align="center" valign="top" style="background-repeat:no-repeat;background-size:100% 104px;background-position:top;background-image:url('https://ci3.googleusercontent.com/proxy/k0yDJ_91wSrME_LSzJpWFxo6lXoZ_hHtQNgj4ytsxoU5V7497DBzEO-DPLEkYJJjtS6JsOgRI_4QM7PGOrGoxMD_ZGVajtzQ8kz2KvqDTNc=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/bg.png?v=1.0.0.1')">

					<table role="presentation" width="720" cellpadding="0" cellspacing="0" border="0" align="center" style="width:720px;margin:0 auto;text-align:center" class="m_995168881007390535email-container">
						<tbody><tr>
							<td height="40">&nbsp;</td>
						</tr>
						<tr>
							<td align="center"><a href="https://www.jotform.com/?utm_source=8-payments&amp;utm_medium=email&amp;utm_content=header_logo&amp;utm_campaign=onboard" style="outline:none;text-decoration:none;display:block" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.jotform.com/?utm_source%3D8-payments%26utm_medium%3Demail%26utm_content%3Dheader_logo%26utm_campaign%3Donboard&amp;source=gmail&amp;ust=1678954247312000&amp;usg=AOvVaw3IBjxDEZKg7LiqrysTECch">
									</a></td>
						</tr>
						<tr>
							<td height="30" style="overflow:hidden" align="center">
								<a href="https://emails.jotform.com/onboard/payments/sljfibernetworksteam?utm_source=8-payments&amp;utm_medium=email&amp;utm_content=link_view_in_browser&amp;utm_campaign=onboard&amp;email=sljfibernetworksteam@gmail.com&amp;firstName=%7BfirstName%7D" rel="nofollow" style="font-size:10px;color:transparent;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://emails.jotform.com/onboard/payments/sljfibernetworksteam?utm_source%3D8-payments%26utm_medium%3Demail%26utm_content%3Dlink_view_in_browser%26utm_campaign%3Donboard%26email%3Dsljfibernetworksteam@gmail.com%26firstName%3D%257BfirstName%257D&amp;source=gmail&amp;ust=1678954247312000&amp;usg=AOvVaw3hpcHEy2Xll6NC8HNnKpeR">View this email in your browser</a>
							</td>
						</tr>
					</tbody></table>

				</td>
			</tr>

		</tbody></table>
		
     
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="800" style="width:800px;margin:0 auto" class="m_995168881007390535email-container">
            <tbody>
                <tr>
                    <td align="center" valign="top" style="background-repeat:no-repeat;background-size:100% 8px;background-position:top;background-image:url('https://ci5.googleusercontent.com/proxy/CJBuuYqn_hLlei5F6kPrv2wzCN_8SeAiOc0jLmi0lPcLCzhg9o36Ac2wch5YxiiKdzCSQlkC9S7p--tYdPnkjjw1VO-7Qg4Y0PcSyTlJRX9EbiY2Omg=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/bg.png?v=1646724821103')">
                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;margin:0 auto">

                            <tbody><tr>
                                <td style="width:100%;max-width:100%;padding:0 16px;height:8px" width="100%" height="8" class="m_995168881007390535mobile-padding-fix">

                                    <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="m_995168881007390535email-container" role="presentation" style="width:720px;margin:0 auto;border-radius:4px" width="720">
                                        
                                        <tbody><tr valign="top">
                                            <td height="8" bgcolor="#DA0707" style="border-radius:4px 4px 0 0;background-color:#DA0707"></td>
                                        </tr>
                                        

                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="800" style="width:800px;margin:0 auto;text-align:center" class="m_995168881007390535email-container">
            <tbody><tr>
                <td align="center" valign="top" style="background-repeat:no-repeat;background-size:100% 12px;background-position:top;background-image:url('https://ci5.googleusercontent.com/proxy/CJBuuYqn_hLlei5F6kPrv2wzCN_8SeAiOc0jLmi0lPcLCzhg9o36Ac2wch5YxiiKdzCSQlkC9S7p--tYdPnkjjw1VO-7Qg4Y0PcSyTlJRX9EbiY2Omg=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/bg.png?v=1646724821103')">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0 auto">
                        <tbody>
                            <tr>
                                <td width="100%" valign="top" align="center" class="m_995168881007390535padding-container">
                                    <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="720" style="width:720px" class="m_995168881007390535email-container" bgcolor="#ffffff">
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="width:100%">
                                                        <tbody><tr>
														<Td >
												<img src="https://production.sljfibernetworks.com/assets/img/logo.png" style="height:100px;width:250px;margin-top:-20px;padding:20px">
														</td>
                                                            <td style="line-height:64px;color:#0a1551">
             <h1 style="font-family:Times;font-size:27px;text-align:left;margin-left:-90px;color:#04830C">Thank you for Choosing us</h1>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                            
                                       <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$(".termsx").prop("readonly", true);
});
</script>
<style>
    #terms
    {
    cursor: no-drop;
    -moz-user-select: -moz-none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    -o-user-select: none;
    user-select: none;
}
    
</style>
                                       <tr>
								
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

                                                <td>
			<div class="termsx" id="terms" style="height:500px;background:#ffffff;font-size:17px;line-height:15px;margin:auto;display:block;overflow-y: scroll;border: 1px solid #DA0707;padding: 10px;margin-top:-10px;color:#0065B3;font-family: "Times New Roman", Times, serif" readonly>
                <h3 style="color:#DA0707">TERMS OF USE</h3>
                <ul>
                    <li style="font-family: "Times New Roman", Times, serif;margin:20px">Networks SLJ Fiber Networks Pvt Ltd may update Internet Access Services (IAS), cable services, and IP TV without prior intimation to its subscribers.</li>
                    <br>
                    <li>The internet nodes are connected to an international gateway with high-speed links, which are maintained by SLJ Fiber Networks Pvt Ltd.</li>
                    <br>
                    <li>SLJ Fiber Networks Pvt. Ltd. would try to upgrade network capacity to provide the speed of connections to subscribers. However, the subscribers understand that he or she would be able to operate at the speed subject to the limitations of the access network</li>
                    <br>
                    <li>Subscribers to internet access services and cable services IPTV is not allowed to resell internet services without SLJ Fiber Networks Pvt . Ltd.'s permission.</li>
                    <br>
                    <li>The subscribers of internet access services, cable services, and IP TV are not allowed to resell the internet services for interactive voice fax messaging In the event of a violation, the services would be instantly terminated without any notice or compensation to the subscriber, and could result in legal proceedings.</li>
                    <br>
                    <li>The subscribers are required to refrain from sending bulk emails or unsolicited messages via internet access services.</li>
                    <br>
                    <li>The subscribers are required to fully comply with the provisions of the Indian Telegraph Act. of 1889, the Indian Telegraph Rules made thereunder, and any amendments or replacements made thereto from time to time.</li>
                    <br>
                    <li>The subscribers are required to ensure that objectionable obscene messages or communications, which are inconsistent with the established laws of the country, are not made by them or any other person using the password.</li>
                    <br>
                    <li>The customer assumes total responsibility and risk for the use of the Internet access service, cable service, and IP TV. Neither SLJ Fibre Networks Pvt. Ltd., nor its affiliates make any express or implied warranties, representations, or endorsements through the internet (. Ltd. nor its affiliates make any express or implied warranties, representations, or endorsements through the internet (including, without limitation, warranties of title or noninfringement), and they shall not be liable for any cost or damage arising either directly or indirectly from any such transaction. It is safely the responsibility of the customer to evaluate the accuracy, completeness, and usefulness of all opinions, advice, services, and other information, and the quality and merchantability of all merchandise provided through the services or on the internet generally.</li>
                    <br>
                    <li>Customers understand further that the internet contains unedited materials, some of which are sexually explicit or may be ostensive to some people. Customers access such materials at their own risk. SLJ Fiber Networks Pvt. Ltd. has no control over and accepts no responsibility whatever for such materials.</li>
                    <br>
                    <li>The subscribers are required to desist from sending unsolicited messages on any server hosted at SLJ Fiber Networks Pvt. Ltd. premises. The subscriber is required to ensure that objectionable or absent messages or communications that are inconsistent with the established laws of the country are not made by him or any other person on the web server or web space of the subscriber provided by SLJ Fiber Networks Pvt. Ltd.</li>
                    <br>
                    <li>The service is provided as is and on an as-available basis without warranties of any kind, either express or implied, including but not limited to warranties of title, non-infringement, and merchantability of fibers for a particular purpose. No advice or information given by SLJ Fiber Networks Pvt. Ltd., its affiliates, or their respective employees shall create a warranty, neither SLJ Fiber Networks Pvt. Ltd., nor its affiliates warrant that the service is free of viruses, Trojan horses, or other harmful components.</li>
                    <br>
                    <li>Under no circumstances shall SLJ Fiber Networks Pvt. Ltd., its affiliates, or its contractor be liable for direct, indirect, special, or consequential damages that result in any way from the customer's use of or liability to use the service or access the internet, or any part thereof, or from our customer's reliance on or use of information service or merchandise provided on or through the services, or that result from a mistake, omission, interruption, deletion of files, errors, defect, delay in operation or transmission, or any failure of performances.</li>
                    <br>
                    <li>The IAS, cable services, and IP TV are not to be used through a proxy machine or service at a cyber café.</li>
                    <br>
                    <li>IAS, cable services, and IP TV should not be used to disrupt other services.</li>
                    <br>
                    <li>Payment of bills would be the subscriber's responsibility to make in advance for internet access services. SLJ Fiber Networks Pvt. Ltd. may disconnect the service in the case of non-receipt of advance payment by the due date without giving any notice to the subscriber.</li>
                    <br>
                    <li>Force majeure exists if, at any time during the continuous provision of internet access services, the performance of any obligation under it is prevented or delayed as a result of hasty acts of the public enemy, civil commotion, sabotage, fire, flood, or explosion in relation to such non-performance or delay in the performance of an internet access service.</li>
                    <br>
                    <li>Any dispute is subject to the jurisdiction of Guntur, AP, India, and shall be certified before the executive who will be appointed by SLJ Fiber Networks Pvt. Ltd., Guntur. Which may be changed from time to time by the SLJ Fiber Networks Pvt. Ltd. executive.</li>
                    <br>
                    <li>Disclaimer: While every effort is made by SLJ Fiber Networks Pvt. Ltd. to provide the highest quality service to customers of IAS (cable leased line wireless of any kind), cable services, and IP TV, the customer acknowledges that the fixing, quality, and speed of data transmission are entirely dependent on the leased lines connectivity, as may be permitted by dot systems. Accordingly, SLJ Fiber Networks Pvt. Ltd. shall in no event be responsible to the customer in any manner whatever for any failure. Detect any delay in connectivity or accidental loss of the customer with SLJ Fiber Networks Pvt. Ltd. networks or any inconvenience, damages, or loss that may be caused of any kind resulting therefrom.</li>
                    <br>
                    <li>The subscriber shall not use this connection at the end or install a second Ethernet card into the system to which the connection has been given.
                    </li>
                    <br>
                    <li>The residential subscriber is prohibited from using the connection for commercial purposes, and in the event of finding such misuse, the connection can be disconnected without any refund or notification.</li>
                    <br>
                    <li>The subscriber who intends to use voice-over-internet-protocol (VOIP) should follow the rules as per TRAI and DOT (please visit www.dot.gov.in for more information). The subscriber has to sign deactivation before the voice portal is requested to be opened.</li>
                    <br>
                    <li>No installation fee is refundable in the event of cancellation.</li>
                    <br>
                    <li>No material (wire or wireless) or device refund in case of cancellation.</li>
                    <br>
                    <li>The customer is not subjected to any kind of damage to company material, and if so, the entire loss should be bearable by the customer.</li>
                    <br>
                    <li>For service interruptions, the required service will be provided within 48 working hours from the time of the complaint registered by our CUSTOMER CARE @ 888 563 8989. The further delay that happened without the knowledge of the company would not be considered for a free service extension.</li>
                    <br>
                    <li>Due to any natural calamities, it may take more than the specified TAT, depending on the damage to the company's network. In this case, the extension of services is not applicable.</li>
                    <br>
                    <li>If the customer stopped his services with SLJ Fiber Networks Pvt. Ltd. for more than 30 days, he or she should pay Rs. 300 as reconnection charges.</li>
                    <br>
                    <li>The installation for a new connection depends on the geographical location and feasibility of our company network in that particular area. The TAT may be up to 45 days.</li>
                    <br>
                    <li>If a customer cancels his or her connection after applying but before it is installed, Rs. 500 will be deducted from the paid amount, and the remaining amount will be refunded within 45 days from the cancellation date.</li>
                    <br>
                    <li>If the customer does not return the Customer Place equipment placed by SLJ Fiber Networks Pvt. Ltd. after having his or her services disconnected, legal action will be taken in Guntur Court.</li>
                    <br>
                    <li>If the customer does not return the Customer Place equipment placed by SLJ Fiber Networks Pvt. Ltd. within a month after his services are disconnected, he or she should pay Rs. 300 every month until they return the equipment to SLJ Fiber Networks Pvt. Ltd.</li>
                    <br>
                    <li>Device security deposit refund The TAT is 45 days, subject to the proper condition of the device provided by the company; if any damage is found, their charges will be deducted as per device charges.</li>
                    <br>
                    <li>The hardware and software used for installation, which are kept at customers' premises, will be the property of SLJ Fiber Networks Pvt. Ltd.</li>
                    <br>
                    <li>The company will put in its best efforts and strive to maintain the maximum possible uptime of the service. However, the company will not be responsible for actions beyond its control. The customer acknowledges and accepts that, given the very nature of the service provided, there can be a number of factors affecting the provision of the service, and the company’s obligation to provide the service shall be on a best endeavour basis.</li>
                    <br>
                   <li>The company reserves the right to modify and amend these contacts, the service, operating procedures, or any of its service fees or late charges, and may discontinue or revise any or all other aspects of the services at the company's sole discretion.</li>
                    <br>
                    <li>Terms and conditions can be changed by the company without prior notice. The same will be applicable to existing and new customers, and it will be updated on our company website, www.sljfibernetworks.com.</li>
                    <br>

                   
                    
                    
                </ul>
                 </div>

                                                      
                                                        
                                                      
                                                </td>
                                            </tr>
                                            <Tr>
                                                <td height="20px"></td>
                                            </Tr>
                                            <tr>
                                                <td height="20px">
                                                    <center>
                                                        <H4 style="font-family:Book Antiqua">Terms and Conditions are Accepted</H4>
                                                      </center>
                                                        
                                                </td>
                                            </tr>

                                            
                                            <tr>
                                                <td>
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="width:100%">
                                                        <tbody><tr>
                                                            <td class="m_995168881007390535mobile-padding-fix m_995168881007390535mobile-pb-16" style="padding:10px 0 ;font-size:20px;line-height:12px;color:#0a1551;text-align:left">
                                                                   </td>
 

                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td>
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="width:100%">
                                                        <tbody><tr>
                                                            <td class="m_995168881007390535mobile-padding-fix" style="padding:10px">
                                                                
                                                                <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:auto" bgcolor="#ffffff">
                                                                    <tbody><tr>
                                                                        <td class="m_995168881007390535button-td" style="border-radius:4px;background:#DA0707">
                                                                        </td>
                                                                    </tr>
                                                                </tbody></table>
                                                                
                                                            </td>
                                                        </tr>

                                                    </tbody></table>
                                                </td>
                                            </tr>
                                            </form>

                                            <!--
                                              <input type="submit" name="input_6" id="input_6" style="background:#DA0707;font-weight:700;border:1px solid #DA0707;margin-top:-40px;font-size:20px" >
                               
                                            -->
                                            
                                            
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody></table>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="720" style="width:720px;margin:0 auto" class="m_995168881007390535email-container">
    <tbody>
	<tr style="padding:20px;height:10px">
	</tr>
	
	<tr >
        <td align="center">
            
            <table class="m_995168881007390535social-networks" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" align="center" style="max-width:220px">
                <tbody><tr>
                    <td class="m_995168881007390535inline-on-responsive">
                        
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="width:100%" align="center">
                            <tbody><tr>
                                <td align="center">
                                    <a href="https://www.facebook.com/SLJFiberNetworks/" style="display:inline-block" target="_blank">
                                        <img src="https://ci3.googleusercontent.com/proxy/pTZ6Mx9E5heeZGUu1Spj5unkuhZBh7OjBK_Qnv1YdKBJbDhXUdOt2j4CtiuqB93w0754rc0npsTaM-5LHn0E83xTRgErN0KM6WHR7RLSzbogoFKW9dzulivjq-BdSf8rvA=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/social/new/facebook.png?v=1.0.0.1" width="28" alt="Jotform Facebook" border="0" class="m_995168881007390535fluid CToWUd" style="height:auto;background:none;font-size:15px;line-height:15px;color:#6f76a7" data-bit="iit">
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="https://twitter.com/sljfiber" style="display:inline-block" target="_blank">
                                        <img src="https://ci6.googleusercontent.com/proxy/qPMRPjjE0IVsIYU8KSP40y6hDLQ4uqK_zOAJztTvwsf4kMvZ4hPOQkkS6o_EyPKiKotJoQIDuWakl7hGrddoFCLjikmDZj4Cdisyo-zIL-QN5RCD49fKtmpBcFZQs7Qn=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/social/new/twitter.png?v=1.0.0.1" width="28" alt="Jotform Twitter" border="0" class="m_995168881007390535fluid CToWUd" style="height:auto;background:none;font-size:15px;line-height:15px;color:#6f76a7" data-bit="iit">
                                    </a>
                                </td>
                                <td align="center">
                                    <a href="https://in.linkedin.com/company/slj-fiber
" style="display:inline-block" target="_blank">
                                        <img src="https://ci4.googleusercontent.com/proxy/Qt1AEz_fPklrtlgDps4iRLhkwTJyBkEw2XDX2kb-_KvtAeJwtn4lXe3iqgWDfuiYfe2yepeDbhz5cTRL-nxlO9DSUvuBlkUAZi4J9r68627y1SptM3VYo9deN334clo4QA=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/social/new/linkedin.png?v=1.0.0.1" width="28" alt="Jotform Linkedin" border="0" class="m_995168881007390535fluid CToWUd" style="height:auto;background:none;font-size:15px;line-height:15px;color:#6f76a7" data-bit="iit">
                                    </a>
                                </td>
								 <td align="center">
                                    <a href="https://www.instagram.com/sljfiber/" style="display:inline-block" target="_blank">
                                        <img src="https://ci6.googleusercontent.com/proxy/r35ETPh95pGtChwjr6GUliayumhlGx1OvBeqMZrb1koctMxGAMqfP64Z4Nngy-YaSOBBrxI5dEX8AUZqewA4yzjErYDZeEumeeNvkikPYH7oxlj4mD27omm5CaivT-pidMQ=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/social/new/instagram.png?v=1.0.0.1" width="28" alt="Jotform Instagram" border="0" class="m_995168881007390535fluid CToWUd" style="height:auto;background:none;font-size:15px;line-height:15px;color:#6f76a7" data-bit="iit">
                                    </a>
                                </td>
                               
                                <td align="center">
                                    <a href="https://in.linkedin.com/company/slj-fiber" style="display:inline-block" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://link.jotform.com/RB9O3GGdBI%26username%3Dsljfibernetworksteam&amp;source=gmail&amp;ust=1678954247313000&amp;usg=AOvVaw3y8tZIFNrjERtPWpBSHOBt">
                                        <img src="https://ci6.googleusercontent.com/proxy/HFsrGSAGhYbi6J10C1w2fwtR4lTBZxRgYpqnI9S-zUoJmL1AaC6PoUco20JwauFUKCxOHnx5nz1RN6lyeY0kG3o8oCKbPJ6qO0P7gnVHyGL0a-i1sYGvDl90lbQQwkoR=s0-d-e1-ft#https://emails.jotform.com/img/common/ui-kit/social/new/youtube.png?v=1.0.0.1" width="28" alt="Jotform Youtube" border="0" class="m_995168881007390535fluid CToWUd" style="height:auto;background:none;font-size:15px;line-height:15px;color:#6f76a7" data-bit="iit">
                                    </a>
                                </td>
                                
                            </tr>
                        </tbody></table>
                        
                    </td>
                </tr>
            </tbody></table>
            
        </td>
    </tr>
    <Tr style="height:10px">
	</tr>
    
          <tr>
        <td style="font-size:18px;line-height:1.7;text-align:center;color:white;margin:0 auto" align="center">
		<table>
		<tbody>
		<tr style="color:white">
		<td style="width:725px;height:69px;border: 2px solid #0065B3;background-color:white;z-index:1">
			
			<table>
			    <tr><Td><a href="http://sljfiber.com/broadband.php"><img src="http://sljfiber.com/assets/images/i1.png" style="width:	50px;margin-bottom:5px;float:left;margin-left:5px"></a>
		</Td>
			    <Td><a href="http://sljfiber.com/internet-TV-or-iptv.php"><img src="http://sljfiber.com/assets/images/i3.png"  style="width:50px;float:left;margin-left:54px"></a>
		</Td>
			    <Td style="">
				<a href="http://sljfiber.com/digital-cable-TV.php"><img src="http://sljfiber.com/assets/images/i4.png" style="width:50px;margin-left:64px;margin-top:10px"></a>
			</Td>
			    <td><a href="http://sljfiber.com/cctv.php"><img src="http://sljfiber.com/assets/images/i5.png" style="width:50px;margin-left:74px;margin-top:10px"></a>
			</Td>
			    <Td><a href="http://sljfiber.com/smart-home-automation.php">	<img src="http://sljfiber.com/assets/images/i6.png" style="width:50px;margin-left:74px;margin-top:10px"></a>
		</Td>
		   <Td><a href="http://sljfiber.com/intercom.php"><img src="http://production.sljfibernetworks.com/assets/img/intercome.png" style="width:50px;margin-left:74px;margin-top:10px"></a>
		</Td>
			    </tr>
		</table>
		<table>
				<tr style="height:15%">
				<td><span style="color:#DA0707;margin-top:-20px">BroadBand</span>
		</td>
			<td style="">
			    <span style="color:#DA0707;margin-left:24px;text-align:center">IP TV</span>
		
			    
			</td>
			<td style="">
	<span style="color:#DA0707;align:center;margin-left:25px">Digital Cable TV</span>
		
</td>
<td style="">	
			<span style="color:#DA0707;margin-left:35px">CCTV</span>
		</td>
			<td style="">
			<span style="color:#DA0707;margin-left:48px">HomeSecurity</span>
		
			</td>
<td style=""><span style="color:#DA0707;margin-left:27px">Intercome</span>
		</td>
		
				</tr>
			    
			</table>
			

</td>
		</tr>
		</tbody>
		</table>
        </td>
    </tr>
    
    
</tbody></table>

        
    </center><div class="yj6qo"></div><div class="adL">
</div></div>
 
 


</body>
</html>