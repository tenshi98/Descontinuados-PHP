(function($){
    $(document).ready(function(){
        var chatWidget, ChatWidget = function(){
            this.el = '.js-chat-widget';
            this.el$ = $(this.el);
            this.delay = $(this.el).data('delay') || 5000;
            this.maxMsgLength = $(this.el).data('maxmsglength') || 150;
            this.init();
        };
        ChatWidget.prototype.init = function(){
            this.el$.animate({right: -(this.el$.width())});
            this.bindEvents();
            this.loadMessages();
            this.startInterval();
        };
        ChatWidget.prototype.bindEvents = function(){
            var that = this;
            this.el$.find('.js-chat-toggle').on('click', {self: this}, this.toggle); 
            this.el$.find('.js-chat-form').submit(function(event){
                that.submitForm();
                event.preventDefault();
                return false;
            });
        };
        ChatWidget.prototype.submitForm = function(event){
            this.sendMessage();
        };
        ChatWidget.prototype.loadMessages = function(){
            $.ajax({
                 url: '/index.php?r=site/chat',
                data: {action: 'get'},
                type: 'POST',
                dataType: 'json',
                cache: false,
                success: this.loadSuccess,
                error: this.loadError
            });
        };
        ChatWidget.prototype.disableInput = function(){
            this.el$.find('.js-chat-submit').attr('disabled', 'disabled');
            this.el$.find('.js-chat-msg').attr('disabled', 'disabled');
        };
        ChatWidget.prototype.enableInput = function(){
            this.el$.find('.js-chat-submit').removeAttr('disabled');
            this.el$.find('.js-chat-msg').removeAttr('disabled');
        };
        ChatWidget.prototype.clearInput = function(){
            this.el$.find('.js-chat-msg').val('');
        };
        ChatWidget.prototype.loadSuccess = function(data){
            chatWidget.renderMessages(data);
            chatWidget.scrollBottom();
        };
        ChatWidget.prototype.loadError = function (){
            chatWidget.proceedError("Server respond with error. Please, try again later.");
        };
        ChatWidget.prototype.renderMessages = function(data){
            var date, username, target$ = this.el$.find('.js-chat-messages');
            target$.html('');
            $(data).each(function(){
                username = this.username || 'Guest';
                date = new Date(this.chat_created * 1000);
                target$.append('<li><span class="chat-time">' + 
                        ("0" + date.getDate()).slice(-2) + '/' + 
                        ("0" + date.getMonth()).slice(-2) + '/' + 
                        date.getFullYear() + ' ' + 
                        ("0" + date.getHours()).slice(-2) + ':' + 
                        ("0" + date.getMinutes()).slice(-2) + '</span> <span class="chat-name">' + username + '</span>: ' + this.chat_message + '</li>');
            });
        };
        ChatWidget.prototype.startInterval = function(){
            var that = this;
            this.interval = setInterval(function(){
                that.loadMessages();
            }, this.delay);
        };
        ChatWidget.prototype.stopInterval = function(){
            clearInterval(this.interval);
        };
        ChatWidget.prototype.getMessage = function(){
            return this.el$.find('.js-chat-msg').val();
        };
        ChatWidget.prototype.proceedError = function(message){
            var errorEl$ = this.el$.find('.js-chat-error'),
                errorMessage = message || "Somwthing was wrong!";
            errorEl$.text(errorMessage).slideDown();
            this.el$.find('.js-chat-msg').eq(0).focus();
            setTimeout(function(){
                errorEl$.slideUp();
            }, 2000);
        };
        ChatWidget.prototype.validateMessage = function(message){
            return message && message !== '' && message.length <= this.maxMsgLength;
        };
        ChatWidget.prototype.sendMessage = function(){
            var message = this.getMessage();
            if (this.validateMessage(message)) {
                this.disableInput();
                this.stopInterval();
                $.ajax({
                    url: '/index.php?r=site/chat',
                    data: {message: message, action: 'post'},
                    dataType: 'json',
                    type: 'POST',
                    success: this.messageSuccess,
                    error: this.messageError
                });
            } else {
                this.proceedError("Type your message, before submit.");
            }
        };
        ChatWidget.prototype.messageError = function(){
            chatWidget.proceedError("Server respond with error. Please, try again later.");
        };
        ChatWidget.prototype.messageSuccess = function(data){
            chatWidget.renderMessages(data);
            chatWidget.scrollBottom();
            chatWidget.enableInput();
            chatWidget.clearInput();
            chatWidget.startInterval();
            chatWidget.el$.find('.js-chat-msg').eq(0).focus();
        };
        ChatWidget.prototype.scrollBottom = function(){
            this.el$.find('.js-chat-messages').scrollTop(this.el$.find('.js-chat-messages').get(0).scrollHeight);
        };
        ChatWidget.prototype.toggle = function(event){
            var context = event.data.self;
            if (context.el$.data('visible')) {
                context.el$.animate({right: -context.el$.width()});
                context.el$.data('visible', false);
                context.el$.find('.js-chat-toogle-icon').html('<');
            }else {
                context.el$.animate({right: 0}, function(){
                    context.el$.data('visible', true);
                    context.el$.find('.js-chat-msg').eq(0).focus();
                    context.el$.find('.js-chat-toogle-icon').html('>');
                });
            }
        };
    
    
        chatWidget = new ChatWidget();
    });
})(jQuery);
